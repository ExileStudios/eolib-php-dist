<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class Weight
{
    private int $byteSize = 0;
    /** @var int */
    private int $current;
    /** @var int */
    private int $max;

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
    public function getCurrent(): int
    {
        return $this->current;
    }

    /** @param int $current */
    public function setCurrent(int $current): void
    {
        $this->current = $current;
    }



    /** @return int */
    public function getMax(): int
    {
        return $this->max;
    }

    /** @param int $max */
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
        if ($data->getCurrent() == null)
        {
            throw new SerializationError('current must be provided.');
        }
        $writer->addChar($data->getCurrent());

        if ($data->getMax() == null)
        {
            throw new SerializationError('max must be provided.');
        }
        $writer->addChar($data->getMax());


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
            $data->setCurrent($reader->getChar());
            $data->setMax($reader->getChar());

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
        return "Weight(byteSize=$this->byteSize, current=".var_export($this->current, true).", max=".var_export($this->max, true).")";
    }

}


