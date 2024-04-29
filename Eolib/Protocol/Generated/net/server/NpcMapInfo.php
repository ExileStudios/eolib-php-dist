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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\SerializationError;


class NpcMapInfo
{
    private $byteSize = 0;
    private int $index;
    private int $id;
    private Coords $coords;
    private int $direction;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

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
        if ($data->index === null)
        {
            throw new SerializationError('index must be provided.');
        }
        $writer->addChar($data->index);

        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);


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
            $data->index = $reader->getChar();
            $data->id = $reader->getShort();
            $data->coords = Coords::deserialize($reader);
            $data->direction = Direction($reader->getChar());

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
        return "NpcMapInfo(byteSize=' . $this->byteSize . '', index=' . $this->index . '', id=' . $this->id . '', coords=' . $this->coords . '', direction=' . $this->direction . ')";
    }

}


