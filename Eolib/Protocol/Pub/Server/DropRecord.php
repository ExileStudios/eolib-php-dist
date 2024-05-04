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


class DropRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $minAmount;
    /** @var int */
    private int $maxAmount;
    /** @var int */
    private int $rate;

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
    public function getMinAmount(): int
    {
        return $this->minAmount;
    }

    /** @param int $minAmount */
    public function setMinAmount(int $minAmount): void
    {
        $this->minAmount = $minAmount;
    }



    /** @return int */
    public function getMaxAmount(): int
    {
        return $this->maxAmount;
    }

    /** @param int $maxAmount */
    public function setMaxAmount(int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }



    /** @return int */
    public function getRate(): int
    {
        return $this->rate;
    }

    /** @param int $rate */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }




    /**
     * Serializes an instance of `DropRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DropRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DropRecord $data): void {
        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getMinAmount() == null)
        {
            throw new SerializationError('minAmount must be provided.');
        }
        $writer->addThree($data->getMinAmount());

        if ($data->getMaxAmount() == null)
        {
            throw new SerializationError('maxAmount must be provided.');
        }
        $writer->addThree($data->getMaxAmount());

        if ($data->getRate() == null)
        {
            throw new SerializationError('rate must be provided.');
        }
        $writer->addShort($data->getRate());


    }

    /**
     * Deserializes an instance of `DropRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DropRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): DropRecord
    {
        $data = new DropRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItemId($reader->getShort());
            $data->setMinAmount($reader->getThree());
            $data->setMaxAmount($reader->getThree());
            $data->setRate($reader->getShort());

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
        return "DropRecord(byteSize=$this->byteSize, itemId=".var_export($this->itemId, true).", minAmount=".var_export($this->minAmount, true).", maxAmount=".var_export($this->maxAmount, true).", rate=".var_export($this->rate, true).")";
    }

}


