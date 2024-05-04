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


class PartyExpShare
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $experience;
    /** @var int */
    private int $levelUp;

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



    /** @return int */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /** @param int $experience */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }



    /** @return int */
    public function getLevelUp(): int
    {
        return $this->levelUp;
    }

    /** @param int $levelUp */
    public function setLevelUp(int $levelUp): void
    {
        $this->levelUp = $levelUp;
    }




    /**
     * Serializes an instance of `PartyExpShare` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyExpShare $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyExpShare $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->getExperience());

        if ($data->getLevelUp() == null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        $writer->addChar($data->getLevelUp());


    }

    /**
     * Deserializes an instance of `PartyExpShare` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyExpShare The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyExpShare
    {
        $data = new PartyExpShare();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setExperience($reader->getInt());
            $data->setLevelUp($reader->getChar());

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
        return "PartyExpShare(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", experience=".var_export($this->experience, true).", levelUp=".var_export($this->levelUp, true).")";
    }

}


