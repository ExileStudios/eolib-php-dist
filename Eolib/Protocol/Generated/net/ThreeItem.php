<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class ThreeItem
{
    private $byteSize = 0;
    private int $id;
    private int $amount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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
     * Serializes an instance of `ThreeItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ThreeItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ThreeItem $data): void {
        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addThree($data->amount);


    }

    /**
     * Deserializes an instance of `ThreeItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ThreeItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): ThreeItem
    {
        $data = new ThreeItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->id = $reader->getShort();
            $data->amount = $reader->getThree();

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
        return "ThreeItem(byteSize=' . $this->byteSize . '', id=' . $this->id . '', amount=' . $this->amount . ')";
    }

}


