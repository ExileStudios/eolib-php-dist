<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\SerializationError;


class WalkAction
{
    private $byteSize = 0;
    private int $direction;
    private int $timestamp;
    private Coords $coords;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }


    /**
     * Serializes an instance of `WalkAction` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WalkAction $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WalkAction $data): void {
        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);

        if ($data->timestamp === null)
        {
            throw new SerializationError('timestamp must be provided.');
        }
        $writer->addThree($data->timestamp);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);


    }

    /**
     * Deserializes an instance of `WalkAction` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WalkAction The deserialized data.
     */
    public static function deserialize(EoReader $reader): WalkAction
    {
        $data = new WalkAction();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->direction = Direction($reader->getChar());
            $data->timestamp = $reader->getThree();
            $data->coords = Coords::deserialize($reader);

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
        return "WalkAction(byteSize=' . $this->byteSize . '', direction=' . $this->direction . '', timestamp=' . $this->timestamp . '', coords=' . $this->coords . ')";
    }

}


