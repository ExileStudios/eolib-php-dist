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


class CharacterSecondaryStatsInfoLookup
{
    private $byteSize = 0;
    private int $maxDamage;
    private int $minDamage;
    private int $accuracy;
    private int $evade;
    private int $armor;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMaxDamage(): int
    {
        return $this->maxDamage;
    }

    public function setMaxDamage(int $maxDamage): void
    {
        $this->maxDamage = $maxDamage;
    }

    public function getMinDamage(): int
    {
        return $this->minDamage;
    }

    public function setMinDamage(int $minDamage): void
    {
        $this->minDamage = $minDamage;
    }

    public function getAccuracy(): int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): void
    {
        $this->accuracy = $accuracy;
    }

    public function getEvade(): int
    {
        return $this->evade;
    }

    public function setEvade(int $evade): void
    {
        $this->evade = $evade;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

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
        if ($data->maxDamage === null)
        {
            throw new SerializationError('maxDamage must be provided.');
        }
        $writer->addShort($data->maxDamage);

        if ($data->minDamage === null)
        {
            throw new SerializationError('minDamage must be provided.');
        }
        $writer->addShort($data->minDamage);

        if ($data->accuracy === null)
        {
            throw new SerializationError('accuracy must be provided.');
        }
        $writer->addShort($data->accuracy);

        if ($data->evade === null)
        {
            throw new SerializationError('evade must be provided.');
        }
        $writer->addShort($data->evade);

        if ($data->armor === null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->armor);


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
            $data->maxDamage = $reader->getShort();
            $data->minDamage = $reader->getShort();
            $data->accuracy = $reader->getShort();
            $data->evade = $reader->getShort();
            $data->armor = $reader->getShort();

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
        return "CharacterSecondaryStatsInfoLookup(byteSize=' . $this->byteSize . '', maxDamage=' . $this->maxDamage . '', minDamage=' . $this->minDamage . '', accuracy=' . $this->accuracy . '', evade=' . $this->evade . '', armor=' . $this->armor . ')";
    }

}


