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


class LevelUpStats
{
    private $byteSize = 0;
    private int $level;
    private int $statPoints;
    private int $skillPoints;
    private int $maxHp;
    private int $maxTp;
    private int $maxSp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }

    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }

    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }

    public function getMaxSp(): int
    {
        return $this->maxSp;
    }

    public function setMaxSp(int $maxSp): void
    {
        $this->maxSp = $maxSp;
    }


    /**
     * Serializes an instance of `LevelUpStats` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LevelUpStats $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LevelUpStats $data): void {
        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->statPoints === null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->statPoints);

        if ($data->skillPoints === null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->skillPoints);

        if ($data->maxHp === null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->maxHp);

        if ($data->maxTp === null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->maxTp);

        if ($data->maxSp === null)
        {
            throw new SerializationError('maxSp must be provided.');
        }
        $writer->addShort($data->maxSp);


    }

    /**
     * Deserializes an instance of `LevelUpStats` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LevelUpStats The deserialized data.
     */
    public static function deserialize(EoReader $reader): LevelUpStats
    {
        $data = new LevelUpStats();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->level = $reader->getChar();
            $data->statPoints = $reader->getShort();
            $data->skillPoints = $reader->getShort();
            $data->maxHp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->maxSp = $reader->getShort();

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
        return "LevelUpStats(byteSize=' . $this->byteSize . '', level=' . $this->level . '', statPoints=' . $this->statPoints . '', skillPoints=' . $this->skillPoints . '', maxHp=' . $this->maxHp . '', maxTp=' . $this->maxTp . '', maxSp=' . $this->maxSp . ')";
    }

}


