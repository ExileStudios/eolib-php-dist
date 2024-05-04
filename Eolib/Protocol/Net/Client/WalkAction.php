<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\Direction;
use Eolib\Protocol\SerializationError;


class WalkAction
{
    private int $byteSize = 0;
    /** @var int */
    private int $direction;
    /** @var int */
    private int $timestamp;
    /** @var Coords */
    private Coords $coords;

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
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }



    /** @return int */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /** @param int $timestamp */
    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }



    /** @return Coords */
    public function getCoords(): Coords
    {
        return $this->coords;
    }

    /** @param Coords $coords */
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
        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

        if ($data->getTimestamp() == null)
        {
            throw new SerializationError('timestamp must be provided.');
        }
        $writer->addThree($data->getTimestamp());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());


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
            $data->setDirection($reader->getChar());
            $data->setTimestamp($reader->getThree());
            $data->setCoords(Coords::deserialize($reader));

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
        return "WalkAction(byteSize=$this->byteSize, direction=".var_export($this->direction, true).", timestamp=".var_export($this->timestamp, true).", coords=".var_export($this->coords, true).")";
    }

}


