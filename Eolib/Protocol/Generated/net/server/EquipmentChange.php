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


class EquipmentChange
{
    private $byteSize = 0;
    private int $boots;
    private int $armor;
    private int $hat;
    private int $weapon;
    private int $shield;

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

    public function getWeapon(): int
    {
        return $this->weapon;
    }

    public function setWeapon(int $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getShield(): int
    {
        return $this->shield;
    }

    public function setShield(int $shield): void
    {
        $this->shield = $shield;
    }


    /**
     * Serializes an instance of `EquipmentChange` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EquipmentChange $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EquipmentChange $data): void {
        if ($data->boots === null)
        {
            throw new SerializationError('boots must be provided.');
        }
        $writer->addShort($data->boots);

        if ($data->armor === null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->armor);

        if ($data->hat === null)
        {
            throw new SerializationError('hat must be provided.');
        }
        $writer->addShort($data->hat);

        if ($data->weapon === null)
        {
            throw new SerializationError('weapon must be provided.');
        }
        $writer->addShort($data->weapon);

        if ($data->shield === null)
        {
            throw new SerializationError('shield must be provided.');
        }
        $writer->addShort($data->shield);


    }

    /**
     * Deserializes an instance of `EquipmentChange` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EquipmentChange The deserialized data.
     */
    public static function deserialize(EoReader $reader): EquipmentChange
    {
        $data = new EquipmentChange();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->boots = $reader->getShort();
            $data->armor = $reader->getShort();
            $data->hat = $reader->getShort();
            $data->weapon = $reader->getShort();
            $data->shield = $reader->getShort();

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
        return "EquipmentChange(byteSize=' . $this->byteSize . '', boots=' . $this->boots . '', armor=' . $this->armor . '', hat=' . $this->hat . '', weapon=' . $this->weapon . '', shield=' . $this->shield . ')";
    }

}


