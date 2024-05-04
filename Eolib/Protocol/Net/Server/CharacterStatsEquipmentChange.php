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


class CharacterStatsEquipmentChange
{
    private int $byteSize = 0;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $maxTp;
    /** @var CharacterBaseStats */
    private CharacterBaseStats $baseStats;
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
     * Serializes an instance of `CharacterStatsEquipmentChange` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterStatsEquipmentChange $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterStatsEquipmentChange $data): void {
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

        if ($data->getBaseStats() == null)
        {
            throw new SerializationError('baseStats must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->getBaseStats());

        if ($data->getSecondaryStats() == null)
        {
            throw new SerializationError('secondaryStats must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->getSecondaryStats());


    }

    /**
     * Deserializes an instance of `CharacterStatsEquipmentChange` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterStatsEquipmentChange The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterStatsEquipmentChange
    {
        $data = new CharacterStatsEquipmentChange();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMaxHp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setBaseStats(CharacterBaseStats::deserialize($reader));
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
        return "CharacterStatsEquipmentChange(byteSize=$this->byteSize, maxHp=".var_export($this->maxHp, true).", maxTp=".var_export($this->maxTp, true).", baseStats=".var_export($this->baseStats, true).", secondaryStats=".var_export($this->secondaryStats, true).")";
    }

}


