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


class CharacterStatsUpdate
{
    private $byteSize = 0;
    private CharacterBaseStats $baseStats;
    private int $maxHp;
    private int $maxTp;
    private int $maxSp;
    private int $maxWeight;
    private CharacterSecondaryStats $secondaryStats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBaseStats(): CharacterBaseStats
    {
        return $this->baseStats;
    }

    public function setBaseStats(CharacterBaseStats $baseStats): void
    {
        $this->baseStats = $baseStats;
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

    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(int $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }

    public function getSecondaryStats(): CharacterSecondaryStats
    {
        return $this->secondaryStats;
    }

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
        if ($data->baseStats === null)
        {
            throw new SerializationError('baseStats must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->baseStats);

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

        if ($data->maxWeight === null)
        {
            throw new SerializationError('maxWeight must be provided.');
        }
        $writer->addShort($data->maxWeight);

        if ($data->secondaryStats === null)
        {
            throw new SerializationError('secondaryStats must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->secondaryStats);


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
            $data->baseStats = CharacterBaseStats::deserialize($reader);
            $data->maxHp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->maxSp = $reader->getShort();
            $data->maxWeight = $reader->getShort();
            $data->secondaryStats = CharacterSecondaryStats::deserialize($reader);

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
        return "CharacterStatsUpdate(byteSize=' . $this->byteSize . '', baseStats=' . $this->baseStats . '', maxHp=' . $this->maxHp . '', maxTp=' . $this->maxTp . '', maxSp=' . $this->maxSp . '', maxWeight=' . $this->maxWeight . '', secondaryStats=' . $this->secondaryStats . ')";
    }

}


