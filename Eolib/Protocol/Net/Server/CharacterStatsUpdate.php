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
use Eolib\Protocol\Net\Server\CharacterSecondaryStats;
use Eolib\Protocol\SerializationError;


class CharacterStatsUpdate
{
    private int $byteSize = 0;
    /** @var CharacterBaseStats */
    private CharacterBaseStats $baseStats;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $maxTp;
    /** @var int */
    private int $maxSp;
    /** @var int */
    private int $maxWeight;
    /** @var CharacterSecondaryStats */
    private CharacterSecondaryStats $secondaryStats;

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
    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    /** @param int $maxWeight */
    public function setMaxWeight(int $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }



    /** @return CharacterSecondaryStats */
    public function getSecondaryStats(): CharacterSecondaryStats
    {
        return $this->secondaryStats;
    }

    /** @param CharacterSecondaryStats $secondaryStats */
    public function setSecondaryStats(CharacterSecondaryStats $secondaryStats): void
    {
        $this->secondaryStats = $secondaryStats;
    }




    /**
     * Serializes an instance of `CharacterStatsUpdate` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterStatsUpdate $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterStatsUpdate $data): void {
        if ($data->getBaseStats() == null)
        {
            throw new SerializationError('baseStats must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->getBaseStats());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

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

        if ($data->getMaxWeight() == null)
        {
            throw new SerializationError('maxWeight must be provided.');
        }
        $writer->addShort($data->getMaxWeight());

        if ($data->getSecondaryStats() == null)
        {
            throw new SerializationError('secondaryStats must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->getSecondaryStats());


    }

    /**
     * Deserializes an instance of `CharacterStatsUpdate` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterStatsUpdate The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterStatsUpdate
    {
        $data = new CharacterStatsUpdate();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setBaseStats(CharacterBaseStats::deserialize($reader));
            $data->setMaxHp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setMaxSp($reader->getShort());
            $data->setMaxWeight($reader->getShort());
            $data->setSecondaryStats(CharacterSecondaryStats::deserialize($reader));

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
        return "CharacterStatsUpdate(byteSize=$this->byteSize, baseStats=".var_export($this->baseStats, true).", maxHp=".var_export($this->maxHp, true).", maxTp=".var_export($this->maxTp, true).", maxSp=".var_export($this->maxSp, true).", maxWeight=".var_export($this->maxWeight, true).", secondaryStats=".var_export($this->secondaryStats, true).")";
    }

}


