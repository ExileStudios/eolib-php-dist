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


class PartyMember
{
    private $byteSize = 0;
    private int $playerId;
    private bool $leader;
    private int $level;
    private int $hpPercentage;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getLeader(): bool
    {
        return $this->leader;
    }

    public function setLeader(bool $leader): void
    {
        $this->leader = $leader;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
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
     * Serializes an instance of `PartyMember` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyMember $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyMember $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->leader === null)
        {
            throw new SerializationError('leader must be provided.');
        }
        $writer->addChar($data->leader ? 1 : 0);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


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
            $data->playerId = $reader->getShort();
            $data->leader = $reader->getChar() !== 0;
            $data->level = $reader->getChar();
            $data->hpPercentage = $reader->getChar();
            $data->name = $reader->getString();

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
        return "PartyMember(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', leader=' . $this->leader . '', level=' . $this->level . '', hpPercentage=' . $this->hpPercentage . '', name=' . $this->name . ')";
    }

}


