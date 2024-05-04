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
use Eolib\Protocol\Net\Server\CharacterIcon;
use Eolib\Protocol\SerializationError;


class OnlinePlayer
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $title = "";
    /** @var int */
    private int $level;
    /** @var int */
    private int $icon;
    /** @var int */
    private int $classId;
    /** @var string */
    private string $guildTag = "";

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /** @return string */
    public function getTitle(): string
    {
        return $this->title;
    }

    /** @param string $title */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }



    /** @return int */
    public function getLevel(): int
    {
        return $this->level;
    }

    /** @param int $level */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }



    /** @return int */
    public function getIcon(): int
    {
        return $this->icon;
    }

    /** @param int $icon */
    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
    }



    /** @return int */
    public function getClassId(): int
    {
        return $this->classId;
    }

    /** @param int $classId */
    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }



    /** @return string */
    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    /** @param string $guildTag */
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
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getTitle() == null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->getTitle());

        $writer->addByte(0xFF);
        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getIcon() == null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addChar((int) $data->getIcon());

        if ($data->getClassId() == null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->getClassId());

        if ($data->getGuildTag() == null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        $writer->addString($data->getGuildTag());


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
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setTitle($reader->getString());
            $reader->nextChunk();
            $data->setLevel($reader->getChar());
            $data->setIcon($reader->getChar());
            $data->setClassId($reader->getChar());
            $data->setGuildTag($reader->getString());
            $reader->setChunkedReadingMode(false);

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
        return "OnlinePlayer(byteSize=$this->byteSize, name=$this->name, title=$this->title, level=".var_export($this->level, true).", icon=".var_export($this->icon, true).", classId=".var_export($this->classId, true).", guildTag=$this->guildTag)";
    }

}


