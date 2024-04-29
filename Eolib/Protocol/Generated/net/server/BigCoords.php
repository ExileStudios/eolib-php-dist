<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class BigCoords
{
    private $byteSize = 0;
    private int $x;
    private int $y;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }


    /**
     * Serializes an instance of `BigCoords` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BigCoords $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BigCoords $data): void {
        if ($data->x === null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addShort($data->x);

        if ($data->y === null)
        {
            throw new SerializationError('y must be provided.');
        }
        $writer->addShort($data->y);


    }

    /**
     * Deserializes an instance of `BigCoords` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BigCoords The deserialized data.
     */
    public static function deserialize(EoReader $reader): BigCoords
    {
        $data = new BigCoords();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->x = $reader->getShort();
            $data->y = $reader->getShort();

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
        return "BigCoords(byteSize=' . $this->byteSize . '', x=' . $this->x . '', y=' . $this->y . ')";
    }

}


