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


class DropRecord
{
    private $byteSize = 0;
    private int $itemId;
    private int $minAmount;
    private int $maxAmount;
    private int $rate;

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

    public function getMinAmount(): int
    {
        return $this->minAmount;
    }

    public function setMinAmount(int $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    public function getMaxAmount(): int
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

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
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->minAmount === null)
        {
            throw new SerializationError('minAmount must be provided.');
        }
        $writer->addThree($data->minAmount);

        if ($data->maxAmount === null)
        {
            throw new SerializationError('maxAmount must be provided.');
        }
        $writer->addThree($data->maxAmount);

        if ($data->rate === null)
        {
            throw new SerializationError('rate must be provided.');
        }
        $writer->addShort($data->rate);


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
            $data->itemId = $reader->getShort();
            $data->minAmount = $reader->getThree();
            $data->maxAmount = $reader->getThree();
            $data->rate = $reader->getShort();

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
        return "DropRecord(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', minAmount=' . $this->minAmount . '', maxAmount=' . $this->maxAmount . '', rate=' . $this->rate . ')";
    }

}


