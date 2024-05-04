<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\Direction;
use Eolib\Protocol\SerializationError;


class NpcMapInfo
{
    private int $byteSize = 0;
    /** @var int */
    private int $index;
    /** @var int */
    private int $id;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $direction;

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
    public function getIndex(): int
    {
        return $this->index;
    }

    /** @param int $index */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }



    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @param int $id */
    public function setId(int $id): void
    {
        $this->id = $id;
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




    /**
     * Serializes an instance of `NpcMapInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcMapInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcMapInfo $data): void {
        if ($data->getIndex() == null)
        {
            throw new SerializationError('index must be provided.');
        }
        $writer->addChar($data->getIndex());

        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->getId());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());


    }

    /**
     * Deserializes an instance of `NpcMapInfo` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcMapInfo The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcMapInfo
    {
        $data = new NpcMapInfo();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setIndex($reader->getChar());
            $data->setId($reader->getShort());
            $data->setCoords(Coords::deserialize($reader));
            $data->setDirection($reader->getChar());

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
        return "NpcMapInfo(byteSize=$this->byteSize, index=".var_export($this->index, true).", id=".var_export($this->id, true).", coords=".var_export($this->coords, true).", direction=".var_export($this->direction, true).")";
    }

}


