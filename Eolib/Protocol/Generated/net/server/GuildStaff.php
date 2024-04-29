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


class GuildStaff
{
    private $byteSize = 0;
    private int $rank;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * Serializes an instance of `GuildStaff` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildStaff $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildStaff $data): void {
        if ($data->rank === null)
        {
            throw new SerializationError('rank must be provided.');
        }
        $writer->addChar($data->rank);

        $writer->addByte(0xFF);
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


    }

    /**
     * Deserializes an instance of `GuildStaff` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildStaff The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildStaff
    {
        $data = new GuildStaff();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->rank = $reader->getChar();
            $reader->nextChunk();
            $data->name = $reader->getString();
            $reader->setChunkedReadingMode(false);

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
        return "GuildStaff(byteSize=' . $this->byteSize . '', rank=' . $this->rank . '', name=' . $this->name . ')";
    }

}


