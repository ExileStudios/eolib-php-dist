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
use Eolib\Protocol\SerializationError;


class PartyMember
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var bool */
    private bool $leader;
    /** @var int */
    private int $level;
    /** @var int */
    private int $hpPercentage;
    /** @var string */
    private string $name = "";

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return bool */
    public function getLeader(): bool
    {
        return $this->leader;
    }

    /** @param bool $leader */
    public function setLeader(bool $leader): void
    {
        $this->leader = $leader;
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
    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    /** @param int $hpPercentage */
    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
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




    /**
     * Serializes an instance of `PartyMember` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyMember $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyMember $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getLeader() == null)
        {
            throw new SerializationError('leader must be provided.');
        }
        $writer->addChar((int) $data->getLeader());

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());


    }

    /**
     * Deserializes an instance of `PartyMember` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyMember The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyMember
    {
        $data = new PartyMember();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setLeader($reader->getChar() !== 0);
            $data->setLevel($reader->getChar());
            $data->setHpPercentage($reader->getChar());
            $data->setName($reader->getString());

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
        return "PartyMember(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", leader=".var_export($this->leader, true).", level=".var_export($this->level, true).", hpPercentage=".var_export($this->hpPercentage, true).", name=$this->name)";
    }

}


