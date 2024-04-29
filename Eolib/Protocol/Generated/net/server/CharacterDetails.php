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
use Eolib\Protocol\Generated\AdminLevel;
use Eolib\Protocol\Generated\Gender;
use Eolib\Protocol\SerializationError;


class CharacterDetails
{
    private $byteSize = 0;
    private string $name = "";
    private string $home = "";
    private string $partner = "";
    private string $title = "";
    private string $guild = "";
    private string $guildRank = "";
    private int $playerId;
    private int $classId;
    private int $gender;
    private int $admin;

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

    public function getHome(): string
    {
        return $this->home;
    }

    public function setHome(string $home): void
    {
        $this->home = $home;
    }

    public function getPartner(): string
    {
        return $this->partner;
    }

    public function setPartner(string $partner): void
    {
        $this->partner = $partner;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getGuild(): string
    {
        return $this->guild;
    }

    public function setGuild(string $guild): void
    {
        $this->guild = $guild;
    }

    public function getGuildRank(): string
    {
        return $this->guildRank;
    }

    public function setGuildRank(string $guildRank): void
    {
        $this->guildRank = $guildRank;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getAdmin(): int
    {
        return $this->admin;
    }

    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
    }


    /**
     * Serializes an instance of `CharacterDetails` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterDetails $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterDetails $data): void {
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->home === null)
        {
            throw new SerializationError('home must be provided.');
        }
        $writer->addString($data->home);

        $writer->addByte(0xFF);
        if ($data->partner === null)
        {
            throw new SerializationError('partner must be provided.');
        }
        $writer->addString($data->partner);

        $writer->addByte(0xFF);
        if ($data->title === null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->title);

        $writer->addByte(0xFF);
        if ($data->guild === null)
        {
            throw new SerializationError('guild must be provided.');
        }
        $writer->addString($data->guild);

        $writer->addByte(0xFF);
        if ($data->guildRank === null)
        {
            throw new SerializationError('guildRank must be provided.');
        }
        $writer->addString($data->guildRank);

        $writer->addByte(0xFF);
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->classId === null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->classId);

        if ($data->gender === null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->gender);

        if ($data->admin === null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->admin);


    }

    /**
     * Deserializes an instance of `CharacterDetails` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterDetails The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterDetails
    {
        $data = new CharacterDetails();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->home = $reader->getString();
            $reader->nextChunk();
            $data->partner = $reader->getString();
            $reader->nextChunk();
            $data->title = $reader->getString();
            $reader->nextChunk();
            $data->guild = $reader->getString();
            $reader->nextChunk();
            $data->guildRank = $reader->getString();
            $reader->nextChunk();
            $data->playerId = $reader->getShort();
            $data->classId = $reader->getChar();
            $data->gender = Gender($reader->getChar());
            $data->admin = AdminLevel($reader->getChar());
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
        return "CharacterDetails(byteSize=' . $this->byteSize . '', name=' . $this->name . '', home=' . $this->home . '', partner=' . $this->partner . '', title=' . $this->title . '', guild=' . $this->guild . '', guildRank=' . $this->guildRank . '', playerId=' . $this->playerId . '', classId=' . $this->classId . '', gender=' . $this->gender . '', admin=' . $this->admin . ')";
    }

}


