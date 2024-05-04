<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class ShopSoldItem
{
    private int $byteSize = 0;
    /** @var int */
    private int $amount;
    /** @var int */
    private int $id;

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
    public function getAmount(): int
    {
        return $this->amount;
    }

    /** @param int $amount */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }



    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @param int $id */
    public function setId(int $id): void
    {
        $this->id = $id;
    }




    /**
     * Serializes an instance of `ShopSoldItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopSoldItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopSoldItem $data): void {
        if ($data->getAmount() == null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addInt($data->getAmount());

        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->getId());


    }

    /**
     * Deserializes an instance of `ShopSoldItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopSoldItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopSoldItem
    {
        $data = new ShopSoldItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setAmount($reader->getInt());
            $data->setId($reader->getShort());

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
        return "ShopSoldItem(byteSize=$this->byteSize, amount=".var_export($this->amount, true).", id=".var_export($this->id, true).")";
    }

}


