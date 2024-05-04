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
use Eolib\Protocol\SerializationError;


class ShopCraftIngredientRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $amount;

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



    /** @return int */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /** @param int $amount */
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
        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getAmount() == null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addChar($data->getAmount());


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
            $data->setItemId($reader->getShort());
            $data->setAmount($reader->getChar());

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
        return "ShopCraftIngredientRecord(byteSize=$this->byteSize, itemId=".var_export($this->itemId, true).", amount=".var_export($this->amount, true).")";
    }

}


