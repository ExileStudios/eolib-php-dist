<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class Coords
{
    private int $byteSize = 0;
    /** @var int */
    private int $x;
    /** @var int */
    private int $y;

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
    public function getX(): int
    {
        return $this->x;
    }

    /** @param int $x */
    public function setX(int $x): void
    {
        $this->x = $x;
    }



    /** @return int */
    public function getY(): int
    {
        return $this->y;
    }

    /** @param int $y */
    public function setY(int $y): void
    {
        $this->y = $y;
    }




    /**
     * Serializes an instance of `Coords` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Coords $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Coords $data): void {
        if ($data->getX() == null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addChar($data->getX());

        if ($data->getY() == null)
        {
            throw new SerializationError('y must be provided.');
        }
        $writer->addChar($data->getY());


    }

    /**
     * Deserializes an instance of `Coords` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Coords The deserialized data.
     */
    public static function deserialize(EoReader $reader): Coords
    {
        $data = new Coords();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setX($reader->getChar());
            $data->setY($reader->getChar());

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
        return "Coords(byteSize=$this->byteSize, x=".var_export($this->x, true).", y=".var_export($this->y, true).")";
    }

}


