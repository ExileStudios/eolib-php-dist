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
use Eolib\Protocol\Net\Server\CharacterBaseStats;
use Eolib\Protocol\Net\Server\CharacterElementalStats;
use Eolib\Protocol\Net\Server\CharacterSecondaryStatsInfoLookup;
use Eolib\Protocol\SerializationError;


class CharacterStatsInfoLookup
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
    /** @var CharacterBaseStats */
    private CharacterBaseStats $baseStats;
    /** @var CharacterSecondaryStatsInfoLookup */
    private CharacterSecondaryStatsInfoLookup $secondaryStats;
    /** @var CharacterElementalStats */
    private CharacterElementalStats $elementalStats;

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



    /** @return CharacterBaseStats */
    public function getBaseStats(): CharacterBaseStats
    {
        return $this->baseStats;
    }

    /** @param CharacterBaseStats $baseStats */
    public function setBaseStats(CharacterBaseStats $baseStats): void
    {
        $this->baseStats = $baseStats;
    }



    /** @return CharacterSecondaryStatsInfoLookup */
    public function getSecondaryStats(): CharacterSecondaryStatsInfoLookup
    {
        return $this->secondaryStats;
    }

    /** @param CharacterSecondaryStatsInfoLookup $secondaryStats */
    public function setSecondaryStats(CharacterSecondaryStatsInfoLookup $secondaryStats): void
    {
        $this->secondaryStats = $secondaryStats;
    }



    /** @return CharacterElementalStats */
    public function getElementalStats(): CharacterElementalStats
    {
        return $this->elementalStats;
    }

    /** @param CharacterElementalStats $elementalStats */
    public function setElementalStats(CharacterElementalStats $elementalStats): void
    {
        $this->elementalStats = $elementalStats;
    }




    /**
     * Serializes an instance of `CharacterStatsInfoLookup` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterStatsInfoLookup $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterStatsInfoLookup $data): void {
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

        if ($data->getBaseStats() == null)
        {
            throw new SerializationError('baseStats must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->getBaseStats());

        if ($data->getSecondaryStats() == null)
        {
            throw new SerializationError('secondaryStats must be provided.');
        }
        CharacterSecondaryStatsInfoLookup::serialize($writer, $data->getSecondaryStats());

        if ($data->getElementalStats() == null)
        {
            throw new SerializationError('elementalStats must be provided.');
        }
        CharacterElementalStats::serialize($writer, $data->getElementalStats());


    }

    /**
     * Deserializes an instance of `CharacterStatsInfoLookup` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterStatsInfoLookup The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterStatsInfoLookup
    {
        $data = new CharacterStatsInfoLookup();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setHp($reader->getShort());
            $data->setMaxHp($reader->getShort());
            $data->setTp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setBaseStats(CharacterBaseStats::deserialize($reader));
            $data->setSecondaryStats(CharacterSecondaryStatsInfoLookup::deserialize($reader));
            $data->setElementalStats(CharacterElementalStats::deserialize($reader));

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
        return "CharacterStatsInfoLookup(byteSize=$this->byteSize, hp=".var_export($this->hp, true).", maxHp=".var_export($this->maxHp, true).", tp=".var_export($this->tp, true).", maxTp=".var_export($this->maxTp, true).", baseStats=".var_export($this->baseStats, true).", secondaryStats=".var_export($this->secondaryStats, true).", elementalStats=".var_export($this->elementalStats, true).")";
    }

}


