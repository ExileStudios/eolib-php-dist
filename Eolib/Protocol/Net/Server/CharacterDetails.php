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
use Eolib\Protocol\AdminLevel;
use Eolib\Protocol\Gender;
use Eolib\Protocol\SerializationError;


class CharacterDetails
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $home = "";
    /** @var string */
    private string $partner = "";
    /** @var string */
    private string $title = "";
    /** @var string */
    private string $guild = "";
    /** @var string */
    private string $guildRank = "";
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $classId;
    /** @var int */
    private int $gender;
    /** @var int */
    private int $admin;

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
    public function getHome(): string
    {
        return $this->home;
    }

    /** @param string $home */
    public function setHome(string $home): void
    {
        $this->home = $home;
    }



    /** @return string */
    public function getPartner(): string
    {
        return $this->partner;
    }

    /** @param string $partner */
    public function setPartner(string $partner): void
    {
        $this->partner = $partner;
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



    /** @return string */
    public function getGuild(): string
    {
        return $this->guild;
    }

    /** @param string $guild */
    public function setGuild(string $guild): void
    {
        $this->guild = $guild;
    }



    /** @return string */
    public function getGuildRank(): string
    {
        return $this->guildRank;
    }

    /** @param string $guildRank */
    public function setGuildRank(string $guildRank): void
    {
        $this->guildRank = $guildRank;
    }



    /** @return int */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
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



    /** @return int */
    public function getGender(): int
    {
        return $this->gender;
    }

    /** @param int $gender */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }



    /** @return int */
    public function getAdmin(): int
    {
        return $this->admin;
    }

    /** @param int $admin */
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
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getHome() == null)
        {
            throw new SerializationError('home must be provided.');
        }
        $writer->addString($data->getHome());

        $writer->addByte(0xFF);
        if ($data->getPartner() == null)
        {
            throw new SerializationError('partner must be provided.');
        }
        $writer->addString($data->getPartner());

        $writer->addByte(0xFF);
        if ($data->getTitle() == null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->getTitle());

        $writer->addByte(0xFF);
        if ($data->getGuild() == null)
        {
            throw new SerializationError('guild must be provided.');
        }
        $writer->addString($data->getGuild());

        $writer->addByte(0xFF);
        if ($data->getGuildRank() == null)
        {
            throw new SerializationError('guildRank must be provided.');
        }
        $writer->addString($data->getGuildRank());

        $writer->addByte(0xFF);
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getClassId() == null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->getClassId());

        if ($data->getGender() == null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->getGender());

        if ($data->getAdmin() == null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->getAdmin());


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
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setHome($reader->getString());
            $reader->nextChunk();
            $data->setPartner($reader->getString());
            $reader->nextChunk();
            $data->setTitle($reader->getString());
            $reader->nextChunk();
            $data->setGuild($reader->getString());
            $reader->nextChunk();
            $data->setGuildRank($reader->getString());
            $reader->nextChunk();
            $data->setPlayerId($reader->getShort());
            $data->setClassId($reader->getChar());
            $data->setGender($reader->getChar());
            $data->setAdmin($reader->getChar());
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
        return "CharacterDetails(byteSize=$this->byteSize, name=$this->name, home=$this->home, partner=$this->partner, title=$this->title, guild=$this->guild, guildRank=$this->guildRank, playerId=".var_export($this->playerId, true).", classId=".var_export($this->classId, true).", gender=".var_export($this->gender, true).", admin=".var_export($this->admin, true).")";
    }

}


