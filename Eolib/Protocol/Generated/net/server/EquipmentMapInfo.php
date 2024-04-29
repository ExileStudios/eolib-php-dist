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


class EquipmentMapInfo
{
    private $byteSize = 0;
    private int $boots;
    private int $armor;
    private int $hat;
    private int $shield;
    private int $weapon;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBoots(): int
    {
        return $this->boots;
    }

    public function setBoots(int $boots): void
    {
        $this->boots = $boots;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }

    public function getHat(): int
    {
        return $this->hat;
    }

    public function setHat(int $hat): void
    {
        $this->hat = $hat;
    }

    public function getShield(): int
    {
        return $this->shield;
    }

    public function setShield(int $shield): void
    {
        $this->shield = $shield;
    }

    public function getWeapon(): int
    {
        return $this->weapon;
    }

    public function setWeapon(int $weapon): void
    {
        $this->weapon = $weapon;
    }


    /**
     * Serializes an instance of `EquipmentMapInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EquipmentMapInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EquipmentMapInfo $data): void {
        if ($data->boots === null)
        {
            throw new SerializationError('boots must be provided.');
        }
        $writer->addShort($data->boots);

        $writer->addShort(0);

        $writer->addShort(0);

        $writer->addShort(0);

        if ($data->armor === null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->armor);

        $writer->addShort(0);

        if ($data->hat === null)
        {
            throw new SerializationError('hat must be provided.');
        }
        $writer->addShort($data->hat);

        if ($data->shield === null)
        {
            throw new SerializationError('shield must be provided.');
        }
        $writer->addShort($data->shield);

        if ($data->weapon === null)
        {
            throw new SerializationError('weapon must be provided.');
        }
        $writer->addShort($data->weapon);


    }

    /**
     * Deserializes an instance of `EquipmentMapInfo` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EquipmentMapInfo The deserialized data.
     */
    public static function deserialize(EoReader $reader): EquipmentMapInfo
    {
        $data = new EquipmentMapInfo();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->boots = $reader->getShort();
            $reader->getShort();
            $reader->getShort();
            $reader->getShort();
            $data->armor = $reader->getShort();
            $reader->getShort();
            $data->hat = $reader->getShort();
            $data->shield = $reader->getShort();
            $data->weapon = $reader->getShort();

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
        return "EquipmentMapInfo(byteSize=' . $this->byteSize . '', boots=' . $this->boots . '', armor=' . $this->armor . '', hat=' . $this->hat . '', shield=' . $this->shield . '', weapon=' . $this->weapon . ')";
    }

}


