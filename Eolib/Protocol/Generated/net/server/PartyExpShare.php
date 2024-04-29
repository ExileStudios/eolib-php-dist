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


class PartyExpShare
{
    private $byteSize = 0;
    private int $playerId;
    private int $experience;
    private int $levelUp;

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

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function getLevelUp(): int
    {
        return $this->levelUp;
    }

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
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->experience);

        if ($data->levelUp === null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        $writer->addChar($data->levelUp);


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
            $data->playerId = $reader->getShort();
            $data->experience = $reader->getInt();
            $data->levelUp = $reader->getChar();

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
        return "PartyExpShare(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', experience=' . $this->experience . '', levelUp=' . $this->levelUp . ')";
    }

}


