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


class EquipmentMapInfo
{
    private int $byteSize = 0;
    /** @var int */
    private int $boots;
    /** @var int */
    private int $armor;
    /** @var int */
    private int $hat;
    /** @var int */
    private int $shield;
    /** @var int */
    private int $weapon;

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
    public function getBoots(): int
    {
        return $this->boots;
    }

    /** @param int $boots */
    public function setBoots(int $boots): void
    {
        $this->boots = $boots;
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



    /** @return int */
    public function getHat(): int
    {
        return $this->hat;
    }

    /** @param int $hat */
    public function setHat(int $hat): void
    {
        $this->hat = $hat;
    }



    /** @return int */
    public function getShield(): int
    {
        return $this->shield;
    }

    /** @param int $shield */
    public function setShield(int $shield): void
    {
        $this->shield = $shield;
    }



    /** @return int */
    public function getWeapon(): int
    {
        return $this->weapon;
    }

    /** @param int $weapon */
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
        if ($data->getBoots() == null)
        {
            throw new SerializationError('boots must be provided.');
        }
        $writer->addShort($data->getBoots());

        $writer->addShort(0);

        $writer->addShort(0);

        $writer->addShort(0);

        if ($data->getArmor() == null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->getArmor());

        $writer->addShort(0);

        if ($data->getHat() == null)
        {
            throw new SerializationError('hat must be provided.');
        }
        $writer->addShort($data->getHat());

        if ($data->getShield() == null)
        {
            throw new SerializationError('shield must be provided.');
        }
        $writer->addShort($data->getShield());

        if ($data->getWeapon() == null)
        {
            throw new SerializationError('weapon must be provided.');
        }
        $writer->addShort($data->getWeapon());


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
            $data->setBoots($reader->getShort());
            $reader->getShort();
            $reader->getShort();
            $reader->getShort();
            $data->setArmor($reader->getShort());
            $reader->getShort();
            $data->setHat($reader->getShort());
            $data->setShield($reader->getShort());
            $data->setWeapon($reader->getShort());

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
        return "EquipmentMapInfo(byteSize=$this->byteSize, boots=".var_export($this->boots, true).", armor=".var_export($this->armor, true).", hat=".var_export($this->hat, true).", shield=".var_export($this->shield, true).", weapon=".var_export($this->weapon, true).")";
    }

}


