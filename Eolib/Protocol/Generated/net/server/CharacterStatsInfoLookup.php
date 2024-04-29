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
use Eolib\Protocol\Generated\Net\server\CharacterElementalStats;
use Eolib\Protocol\Generated\Net\server\CharacterSecondaryStats;
use Eolib\Protocol\SerializationError;


class CharacterStatsInfoLookup
{
    private $byteSize = 0;
    private int $hp;
    private int $maxHp;
    private int $tp;
    private int $maxTp;
    private CharacterBaseStats $baseStats;
    private CharacterSecondaryStats $secondaryStats;
    private CharacterElementalStats $elementalStats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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

    public function getBaseStats(): CharacterBaseStats
    {
        return $this->baseStats;
    }

    public function setBaseStats(CharacterBaseStats $baseStats): void
    {
        $this->baseStats = $baseStats;
    }

    public function getSecondaryStats(): CharacterSecondaryStats
    {
        return $this->secondaryStats;
    }

    public function setSecondaryStats(CharacterSecondaryStats $secondaryStats): void
    {
        $this->secondaryStats = $secondaryStats;
    }

    public function getElementalStats(): CharacterElementalStats
    {
        return $this->elementalStats;
    }

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

        if ($data->baseStats === null)
        {
            throw new SerializationError('baseStats must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->baseStats);

        if ($data->secondaryStats === null)
        {
            throw new SerializationError('secondaryStats must be provided.');
        }
        CharacterSecondaryStats::serialize($writer, $data->secondaryStats);

        if ($data->elementalStats === null)
        {
            throw new SerializationError('elementalStats must be provided.');
        }
        CharacterElementalStats::serialize($writer, $data->elementalStats);


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
            $data->hp = $reader->getShort();
            $data->maxHp = $reader->getShort();
            $data->tp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->baseStats = CharacterBaseStats::deserialize($reader);
            $data->secondaryStats = CharacterSecondaryStats::deserialize($reader);
            $data->elementalStats = CharacterElementalStats::deserialize($reader);

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
        return "CharacterStatsInfoLookup(byteSize=' . $this->byteSize . '', hp=' . $this->hp . '', maxHp=' . $this->maxHp . '', tp=' . $this->tp . '', maxTp=' . $this->maxTp . '', baseStats=' . $this->baseStats . '', secondaryStats=' . $this->secondaryStats . '', elementalStats=' . $this->elementalStats . ')";
    }

}


