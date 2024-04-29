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
use Eolib\Protocol\Generated\Net\server\CharacterIcon;
use Eolib\Protocol\SerializationError;


class OnlinePlayer
{
    private $byteSize = 0;
    private string $name = "";
    private string $title = "";
    private int $level;
    private int $icon;
    private int $classId;
    private string $guildTag = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getIcon(): int
    {
        return $this->icon;
    }

    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
    }


    /**
     * Serializes an instance of `OnlinePlayer` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param OnlinePlayer $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, OnlinePlayer $data): void {
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->title === null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->title);

        $writer->addByte(0xFF);
        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->icon === null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addChar((int) $data->icon);

        if ($data->classId === null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->classId);

        if ($data->guildTag === null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        $writer->addString($data->guildTag);


    }

    /**
     * Deserializes an instance of `OnlinePlayer` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return OnlinePlayer The deserialized data.
     */
    public static function deserialize(EoReader $reader): OnlinePlayer
    {
        $data = new OnlinePlayer();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->title = $reader->getString();
            $reader->nextChunk();
            $data->level = $reader->getChar();
            $data->icon = CharacterIcon($reader->getChar());
            $data->classId = $reader->getChar();
            $data->guildTag = $reader->getString();
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
        return "OnlinePlayer(byteSize=' . $this->byteSize . '', name=' . $this->name . '', title=' . $this->title . '', level=' . $this->level . '', icon=' . $this->icon . '', classId=' . $this->classId . '', guildTag=' . $this->guildTag . ')";
    }

}


