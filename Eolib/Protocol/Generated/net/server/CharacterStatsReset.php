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
use Eolib\Protocol\Generated\Net\server\CharacterBaseStats;
use Eolib\Protocol\Generated\Net\server\CharacterSecondaryStats;
use Eolib\Protocol\SerializationError;


class CharacterStatsReset
{
    private $byteSize = 0;
    private int $statPoints;
    private int $skillPoints;
    private int $hp;
    private int $maxHp;
    private int $tp;
    private int $maxTp;
    private int $maxSp;
    private CharacterBaseStats $base;
    private CharacterSecondaryStats $secondary;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }

    public function getTp(): int
    {
        return $this->tp;
    }

    public function setTp(int $tp): void
    {
        $this->tp = $tp;
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

    public function getBase(): CharacterBaseStats
    {
        return $this->base;
    }

    public function setBase(CharacterBaseStats $base): void
    {
        $this->base = $base;
    }

    public function getSecondary(): CharacterSecondaryStats
    {
        return $this->secondary;
    }

    public function setSecondary(CharacterSecondaryStats $secondary): void
    {
        $this->secondary = $secondary;
    }


    /**
     * Serializes an instance of `CharacterStatsReset` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterStatsReset $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterStatsReset $data): void {
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

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->hp);

        if ($data->maxHp === null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->maxHp);

        if ($data->tp === null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->tp);

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

        if ($data->base === null)
        {
            throw new SerializationError('base must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->base);

        if ($data->secondary === null)
        {
            throw new SerializationError('secondary must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->secondary);


    }

    /**
     * Deserializes an instance of `CharacterStatsReset` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterStatsReset The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterStatsReset
    {
        $data = new CharacterStatsReset();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->statPoints = $reader->getShort();
            $data->skillPoints = $reader->getShort();
            $data->hp = $reader->getShort();
            $data->maxHp = $reader->getShort();
            $data->tp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->maxSp = $reader->getShort();
            $data->base = CharacterBaseStats::deserialize($reader);
            $data->secondary = CharacterSecondaryStats::deserialize($reader);

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
        return "CharacterStatsReset(byteSize=' . $this->byteSize . '', statPoints=' . $this->statPoints . '', skillPoints=' . $this->skillPoints . '', hp=' . $this->hp . '', maxHp=' . $this->maxHp . '', tp=' . $this->tp . '', maxTp=' . $this->maxTp . '', maxSp=' . $this->maxSp . '', base=' . $this->base . '', secondary=' . $this->secondary . ')";
    }

}


