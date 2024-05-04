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
use Eolib\Protocol\Net\Server\CharacterBaseStatsWelcome;
use Eolib\Protocol\Net\Server\CharacterSecondaryStats;
use Eolib\Protocol\SerializationError;


class CharacterStatsWelcome
{
    private int $byteSize = 0;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $tp;
    /** @var int */
    private int $maxTp;
    /** @var int */
    private int $maxSp;
    /** @var int */
    private int $statPoints;
    /** @var int */
    private int $skillPoints;
    /** @var int */
    private int $karma;
    /** @var CharacterSecondaryStats */
    private CharacterSecondaryStats $secondary;
    /** @var CharacterBaseStatsWelcome */
    private CharacterBaseStatsWelcome $base;

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
    public function getHp(): int
    {
        return $this->hp;
    }

    /** @param int $hp */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }



    /** @return int */
    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    /** @param int $maxHp */
    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }



    /** @return int */
    public function getTp(): int
    {
        return $this->tp;
    }

    /** @param int $tp */
    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }



    /** @return int */
    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    /** @param int $maxTp */
    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }



    /** @return int */
    public function getMaxSp(): int
    {
        return $this->maxSp;
    }

    /** @param int $maxSp */
    public function setMaxSp(int $maxSp): void
    {
        $this->maxSp = $maxSp;
    }



    /** @return int */
    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    /** @param int $statPoints */
    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }



    /** @return int */
    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    /** @param int $skillPoints */
    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }



    /** @return int */
    public function getKarma(): int
    {
        return $this->karma;
    }

    /** @param int $karma */
    public function setKarma(int $karma): void
    {
        $this->karma = $karma;
    }



    /** @return CharacterSecondaryStats */
    public function getSecondary(): CharacterSecondaryStats
    {
        return $this->secondary;
    }

    /** @param CharacterSecondaryStats $secondary */
    public function setSecondary(CharacterSecondaryStats $secondary): void
    {
        $this->secondary = $secondary;
    }



    /** @return CharacterBaseStatsWelcome */
    public function getBase(): CharacterBaseStatsWelcome
    {
        return $this->base;
    }

    /** @param CharacterBaseStatsWelcome $base */
    public function setBase(CharacterBaseStatsWelcome $base): void
    {
        $this->base = $base;
    }




    /**
     * Serializes an instance of `CharacterStatsWelcome` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterStatsWelcome $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterStatsWelcome $data): void {
        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->getHp());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

        if ($data->getTp() == null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->getTp());

        if ($data->getMaxTp() == null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->getMaxTp());

        if ($data->getMaxSp() == null)
        {
            throw new SerializationError('maxSp must be provided.');
        }
        $writer->addShort($data->getMaxSp());

        if ($data->getStatPoints() == null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->getStatPoints());

        if ($data->getSkillPoints() == null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->getSkillPoints());

        if ($data->getKarma() == null)
        {
            throw new SerializationError('karma must be provided.');
        }
        $writer->addShort($data->getKarma());

        if ($data->getSecondary() == null)
        {
            throw new SerializationError('secondary must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->getSecondary());

        if ($data->getBase() == null)
        {
            throw new SerializationError('base must be provided.');
        }
        CharacterBaseStatsWelcome::serialize($writer, $data->getBase());


    }

    /**
     * Deserializes an instance of `CharacterStatsWelcome` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterStatsWelcome The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterStatsWelcome
    {
        $data = new CharacterStatsWelcome();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setHp($reader->getShort());
            $data->setMaxHp($reader->getShort());
            $data->setTp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setMaxSp($reader->getShort());
            $data->setStatPoints($reader->getShort());
            $data->setSkillPoints($reader->getShort());
            $data->setKarma($reader->getShort());
            $data->setSecondary(CharacterSecondaryStats::deserialize($reader));
            $data->setBase(CharacterBaseStatsWelcome::deserialize($reader));

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
        return "CharacterStatsWelcome(byteSize=$this->byteSize, hp=".var_export($this->hp, true).", maxHp=".var_export($this->maxHp, true).", tp=".var_export($this->tp, true).", maxTp=".var_export($this->maxTp, true).", maxSp=".var_export($this->maxSp, true).", statPoints=".var_export($this->statPoints, true).", skillPoints=".var_export($this->skillPoints, true).", karma=".var_export($this->karma, true).", secondary=".var_export($this->secondary, true).", base=".var_export($this->base, true).")";
    }

}


