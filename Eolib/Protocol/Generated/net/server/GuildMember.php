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


class GuildMember
{
    private $byteSize = 0;
    private int $rank;
    private string $name = "";
    private string $rankName = "";

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

    public function getRankName(): string
    {
        return $this->rankName;
    }

    public function setRankName(string $rankName): void
    {
        $this->rankName = $rankName;
    }


    /**
     * Serializes an instance of `GuildMember` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildMember $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildMember $data): void {
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

        $writer->addByte(0xFF);
        if ($data->rankName === null)
        {
            throw new SerializationError('rankName must be provided.');
        }
        $writer->addString($data->rankName);


    }

    /**
     * Deserializes an instance of `GuildMember` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildMember The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildMember
    {
        $data = new GuildMember();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->rank = $reader->getChar();
            $reader->nextChunk();
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->rankName = $reader->getString();
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
        return "GuildMember(byteSize=' . $this->byteSize . '', rank=' . $this->rank . '', name=' . $this->name . '', rankName=' . $this->rankName . ')";
    }

}


