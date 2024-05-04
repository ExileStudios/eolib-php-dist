<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class MapWarp
{
    private int $byteSize = 0;
    /** @var int */
    private int $destinationMap;
    /** @var Coords */
    private Coords $destinationCoords;
    /** @var int */
    private int $levelRequired;
    /** @var int */
    private int $door;

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
    public function getDestinationMap(): int
    {
        return $this->destinationMap;
    }

    /** @param int $destinationMap */
    public function setDestinationMap(int $destinationMap): void
    {
        $this->destinationMap = $destinationMap;
    }



    /** @return Coords */
    public function getDestinationCoords(): Coords
    {
        return $this->destinationCoords;
    }

    /** @param Coords $destinationCoords */
    public function setDestinationCoords(Coords $destinationCoords): void
    {
        $this->destinationCoords = $destinationCoords;
    }



    /** @return int */
    public function getLevelRequired(): int
    {
        return $this->levelRequired;
    }

    /** @param int $levelRequired */
    public function setLevelRequired(int $levelRequired): void
    {
        $this->levelRequired = $levelRequired;
    }



    /** @return int */
    public function getDoor(): int
    {
        return $this->door;
    }

    /** @param int $door */
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
        if ($data->getDestinationMap() == null)
        {
            throw new SerializationError('destinationMap must be provided.');
        }
        $writer->addShort($data->getDestinationMap());

        if ($data->getDestinationCoords() == null)
        {
            throw new SerializationError('destinationCoords must be provided.');
        }
        Coords::serialize($writer, $data->getDestinationCoords());

        if ($data->getLevelRequired() == null)
        {
            throw new SerializationError('levelRequired must be provided.');
        }
        $writer->addChar($data->getLevelRequired());

        if ($data->getDoor() == null)
        {
            throw new SerializationError('door must be provided.');
        }
        $writer->addShort($data->getDoor());


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
            $data->setDestinationMap($reader->getShort());
            $data->setDestinationCoords(Coords::deserialize($reader));
            $data->setLevelRequired($reader->getChar());
            $data->setDoor($reader->getShort());

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
        return "MapWarp(byteSize=$this->byteSize, destinationMap=".var_export($this->destinationMap, true).", destinationCoords=".var_export($this->destinationCoords, true).", levelRequired=".var_export($this->levelRequired, true).", door=".var_export($this->door, true).")";
    }

}


