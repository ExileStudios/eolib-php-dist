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


class Weight
{
    private $byteSize = 0;
    private int $current;
    private int $max;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCurrent(): int
    {
        return $this->current;
    }

    public function setCurrent(int $current): void
    {
        $this->current = $current;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function setMax(int $max): void
    {
        $this->max = $max;
    }


    /**
     * Serializes an instance of `Weight` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Weight $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Weight $data): void {
        if ($data->current === null)
        {
            throw new SerializationError('current must be provided.');
        }
        $writer->addChar($data->current);

        if ($data->max === null)
        {
            throw new SerializationError('max must be provided.');
        }
        $writer->addChar($data->max);


    }

    /**
     * Deserializes an instance of `Weight` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Weight The deserialized data.
     */
    public static function deserialize(EoReader $reader): Weight
    {
        $data = new Weight();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->current = $reader->getChar();
            $data->max = $reader->getChar();

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
        return "Weight(byteSize=' . $this->byteSize . '', current=' . $this->current . '', max=' . $this->max . ')";
    }

}


