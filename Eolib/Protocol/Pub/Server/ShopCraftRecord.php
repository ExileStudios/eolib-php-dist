<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\Server\ShopCraftIngredientRecord;
use Eolib\Protocol\SerializationError;


class ShopCraftRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemId;
    /** @var ShopCraftIngredientRecord[] */
    public array $ingredients = [];

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    /**
     * Sets the size of the data that this was deserialized from.
     *
     * @param int $byteSize The size of the data that this was deserialized from.
     */
    public function setByteSize(int $byteSize): void {
        $this->byteSize = $byteSize;
    }

    /** @return int */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /** @param int $itemId */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }



    /** @return ShopCraftIngredientRecord[] */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /** @param ShopCraftIngredientRecord[] $ingredients */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }




    /**
     * Serializes an instance of `ShopCraftRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopCraftRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopCraftRecord $data): void {
        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getIngredients() == null)
        {
            throw new SerializationError('ingredients must be provided.');
        }
        if (count($data->ingredients) != 4)
        {
            throw new SerializationError("Expected length of ingredients to be exactly 4, got " . count($data->ingredients) . ".");
        }
        for ($i = 0; $i < 4; $i++)
        {
            ShopCraftIngredientRecord::serialize($writer, $data->getIngredients()[$i]);

        }

    }

    /**
     * Deserializes an instance of `ShopCraftRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopCraftRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopCraftRecord
    {
        $data = new ShopCraftRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItemId($reader->getShort());
            $data->ingredients = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->ingredients[] = ShopCraftIngredientRecord::deserialize($reader);
            }

            $data->setByteSize($reader->getPosition() - $reader_start_position);

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
        return "ShopCraftRecord(byteSize=$this->byteSize, itemId=".var_export($this->itemId, true).", ingredients=".var_export($this->ingredients, true).")";
    }

}


