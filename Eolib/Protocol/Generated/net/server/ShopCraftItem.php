<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\CharItem;
use Eolib\Protocol\SerializationError;


class ShopCraftItem
{
    private $byteSize = 0;
    private int $itemId;
    private array $ingredients;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }


    /**
     * Serializes an instance of `ShopCraftItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopCraftItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopCraftItem $data): void {
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->ingredients === null)
        {
            throw new SerializationError('ingredients must be provided.');
        }
        if (strlen($data->ingredients) != 4)
        {
            throw new SerializationError("Expected length of ingredients to be exactly 4, got {strlen($data->ingredients)}.");
        }
        for ($i = 0; $i < 4; $i++)
        {
            CharItem::serialize($writer, $data->ingredients[$i]);

        }

    }

    /**
     * Deserializes an instance of `ShopCraftItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopCraftItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopCraftItem
    {
        $data = new ShopCraftItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemId = $reader->getShort();
            $data->ingredients = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->ingredients[] = CharItem::deserialize($reader);
            }

            $data->byteSize = $reader->getPosition() - $reader_start_position;

            return $data;
        } finally {
            $reader->setChunkedReadingMode($old_chunked_reading_mode);
        }
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function __toString(): string {
        return "ShopCraftItem(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', ingredients=' . $this->ingredients . ')";
    }

}


