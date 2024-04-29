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


class Spell
{
    private $byteSize = 0;
    private int $id;
    private int $level;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }


    /**
     * Serializes an instance of `Spell` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Spell $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Spell $data): void {
        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addShort($data->level);


    }

    /**
     * Deserializes an instance of `Spell` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Spell The deserialized data.
     */
    public static function deserialize(EoReader $reader): Spell
    {
        $data = new Spell();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->id = $reader->getShort();
            $data->level = $reader->getShort();

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
        return "Spell(byteSize=' . $this->byteSize . '', id=' . $this->id . '', level=' . $this->level . ')";
    }

}


