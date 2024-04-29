<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class MapWarp
{
    private $byteSize = 0;
    private int $destinationMap;
    private Coords $destinationCoords;
    private int $levelRequired;
    private int $door;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDestinationMap(): int
    {
        return $this->destinationMap;
    }

    public function setDestinationMap(int $destinationMap): void
    {
        $this->destinationMap = $destinationMap;
    }

    public function getDestinationCoords(): Coords
    {
        return $this->destinationCoords;
    }

    public function setDestinationCoords(Coords $destinationCoords): void
    {
        $this->destinationCoords = $destinationCoords;
    }

    public function getLevelRequired(): int
    {
        return $this->levelRequired;
    }

    public function setLevelRequired(int $levelRequired): void
    {
        $this->levelRequired = $levelRequired;
    }

    public function getDoor(): int
    {
        return $this->door;
    }

    public function setDoor(int $door): void
    {
        $this->door = $door;
    }


    /**
     * Serializes an instance of `MapWarp` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapWarp $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapWarp $data): void {
        if ($data->destinationMap === null)
        {
            throw new SerializationError('destinationMap must be provided.');
        }
        $writer->addShort($data->destinationMap);

        if ($data->destinationCoords === null)
        {
            throw new SerializationError('destinationCoords must be provided.');
        }
        Coords::serialize($writer, $data->destinationCoords);

        if ($data->levelRequired === null)
        {
            throw new SerializationError('levelRequired must be provided.');
        }
        $writer->addChar($data->levelRequired);

        if ($data->door === null)
        {
            throw new SerializationError('door must be provided.');
        }
        $writer->addShort($data->door);


    }

    /**
     * Deserializes an instance of `MapWarp` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapWarp The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapWarp
    {
        $data = new MapWarp();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->destinationMap = $reader->getShort();
            $data->destinationCoords = Coords::deserialize($reader);
            $data->levelRequired = $reader->getChar();
            $data->door = $reader->getShort();

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
        return "MapWarp(byteSize=' . $this->byteSize . '', destinationMap=' . $this->destinationMap . '', destinationCoords=' . $this->destinationCoords . '', levelRequired=' . $this->levelRequired . '', door=' . $this->door . ')";
    }

}


