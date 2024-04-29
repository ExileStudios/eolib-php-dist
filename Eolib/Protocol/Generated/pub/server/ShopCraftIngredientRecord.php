<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class ShopCraftIngredientRecord
{
    private $byteSize = 0;
    private int $itemId;
    private int $amount;

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

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }


    /**
     * Serializes an instance of `ShopCraftIngredientRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopCraftIngredientRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopCraftIngredientRecord $data): void {
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addChar($data->amount);


    }

    /**
     * Deserializes an instance of `ShopCraftIngredientRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopCraftIngredientRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopCraftIngredientRecord
    {
        $data = new ShopCraftIngredientRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemId = $reader->getShort();
            $data->amount = $reader->getChar();

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
        return "ShopCraftIngredientRecord(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', amount=' . $this->amount . ')";
    }

}


