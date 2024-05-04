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


class CharacterSecondaryStatsInfoLookup
{
    private int $byteSize = 0;
    /** @var int */
    private int $maxDamage;
    /** @var int */
    private int $minDamage;
    /** @var int */
    private int $accuracy;
    /** @var int */
    private int $evade;
    /** @var int */
    private int $armor;

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
    public function getMaxDamage(): int
    {
        return $this->maxDamage;
    }

    /** @param int $maxDamage */
    public function setMaxDamage(int $maxDamage): void
    {
        $this->maxDamage = $maxDamage;
    }



    /** @return int */
    public function getMinDamage(): int
    {
        return $this->minDamage;
    }

    /** @param int $minDamage */
    public function setMinDamage(int $minDamage): void
    {
        $this->minDamage = $minDamage;
    }



    /** @return int */
    public function getAccuracy(): int
    {
        return $this->accuracy;
    }

    /** @param int $accuracy */
    public function setAccuracy(int $accuracy): void
    {
        $this->accuracy = $accuracy;
    }



    /** @return int */
    public function getEvade(): int
    {
        return $this->evade;
    }

    /** @param int $evade */
    public function setEvade(int $evade): void
    {
        $this->evade = $evade;
    }



    /** @return int */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /** @param int $armor */
    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }




    /**
     * Serializes an instance of `CharacterSecondaryStatsInfoLookup` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterSecondaryStatsInfoLookup $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterSecondaryStatsInfoLookup $data): void {
        if ($data->getMaxDamage() == null)
        {
            throw new SerializationError('maxDamage must be provided.');
        }
        $writer->addShort($data->getMaxDamage());

        if ($data->getMinDamage() == null)
        {
            throw new SerializationError('minDamage must be provided.');
        }
        $writer->addShort($data->getMinDamage());

        if ($data->getAccuracy() == null)
        {
            throw new SerializationError('accuracy must be provided.');
        }
        $writer->addShort($data->getAccuracy());

        if ($data->getEvade() == null)
        {
            throw new SerializationError('evade must be provided.');
        }
        $writer->addShort($data->getEvade());

        if ($data->getArmor() == null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->getArmor());


    }

    /**
     * Deserializes an instance of `CharacterSecondaryStatsInfoLookup` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterSecondaryStatsInfoLookup The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterSecondaryStatsInfoLookup
    {
        $data = new CharacterSecondaryStatsInfoLookup();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMaxDamage($reader->getShort());
            $data->setMinDamage($reader->getShort());
            $data->setAccuracy($reader->getShort());
            $data->setEvade($reader->getShort());
            $data->setArmor($reader->getShort());

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
        return "CharacterSecondaryStatsInfoLookup(byteSize=$this->byteSize, maxDamage=".var_export($this->maxDamage, true).", minDamage=".var_export($this->minDamage, true).", accuracy=".var_export($this->accuracy, true).", evade=".var_export($this->evade, true).", armor=".var_export($this->armor, true).")";
    }

}


