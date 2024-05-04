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


class EquipmentWelcome
{
    private int $byteSize = 0;
    /** @var int */
    private int $boots;
    /** @var int */
    private int $gloves;
    /** @var int */
    private int $accessory;
    /** @var int */
    private int $armor;
    /** @var int */
    private int $belt;
    /** @var int */
    private int $necklace;
    /** @var int */
    private int $hat;
    /** @var int */
    private int $shield;
    /** @var int */
    private int $weapon;
    /** @var int[] */
    public array $ring = [];
    /** @var int[] */
    public array $armlet = [];
    /** @var int[] */
    public array $bracer = [];

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
    public function getGloves(): int
    {
        return $this->gloves;
    }

    /** @param int $gloves */
    public function setGloves(int $gloves): void
    {
        $this->gloves = $gloves;
    }



    /** @return int */
    public function getAccessory(): int
    {
        return $this->accessory;
    }

    /** @param int $accessory */
    public function setAccessory(int $accessory): void
    {
        $this->accessory = $accessory;
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
    public function getBelt(): int
    {
        return $this->belt;
    }

    /** @param int $belt */
    public function setBelt(int $belt): void
    {
        $this->belt = $belt;
    }



    /** @return int */
    public function getNecklace(): int
    {
        return $this->necklace;
    }

    /** @param int $necklace */
    public function setNecklace(int $necklace): void
    {
        $this->necklace = $necklace;
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



    /** @return int[] */
    public function getRing(): array
    {
        return $this->ring;
    }

    /** @param int[] $ring */
    public function setRing(array $ring): void
    {
        $this->ring = $ring;
    }



    /** @return int[] */
    public function getArmlet(): array
    {
        return $this->armlet;
    }

    /** @param int[] $armlet */
    public function setArmlet(array $armlet): void
    {
        $this->armlet = $armlet;
    }



    /** @return int[] */
    public function getBracer(): array
    {
        return $this->bracer;
    }

    /** @param int[] $bracer */
    public function setBracer(array $bracer): void
    {
        $this->bracer = $bracer;
    }




    /**
     * Serializes an instance of `EquipmentWelcome` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EquipmentWelcome $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EquipmentWelcome $data): void {
        if ($data->getBoots() == null)
        {
            throw new SerializationError('boots must be provided.');
        }
        $writer->addShort($data->getBoots());

        if ($data->getGloves() == null)
        {
            throw new SerializationError('gloves must be provided.');
        }
        $writer->addShort($data->getGloves());

        if ($data->getAccessory() == null)
        {
            throw new SerializationError('accessory must be provided.');
        }
        $writer->addShort($data->getAccessory());

        if ($data->getArmor() == null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->getArmor());

        if ($data->getBelt() == null)
        {
            throw new SerializationError('belt must be provided.');
        }
        $writer->addShort($data->getBelt());

        if ($data->getNecklace() == null)
        {
            throw new SerializationError('necklace must be provided.');
        }
        $writer->addShort($data->getNecklace());

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

        if ($data->getRing() == null)
        {
            throw new SerializationError('ring must be provided.');
        }
        if (count($data->ring) != 2)
        {
            throw new SerializationError("Expected length of ring to be exactly 2, got " . count($data->ring) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getRing()[$i]);

        }
        if ($data->getArmlet() == null)
        {
            throw new SerializationError('armlet must be provided.');
        }
        if (count($data->armlet) != 2)
        {
            throw new SerializationError("Expected length of armlet to be exactly 2, got " . count($data->armlet) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getArmlet()[$i]);

        }
        if ($data->getBracer() == null)
        {
            throw new SerializationError('bracer must be provided.');
        }
        if (count($data->bracer) != 2)
        {
            throw new SerializationError("Expected length of bracer to be exactly 2, got " . count($data->bracer) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getBracer()[$i]);

        }

    }

    /**
     * Deserializes an instance of `EquipmentWelcome` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EquipmentWelcome The deserialized data.
     */
    public static function deserialize(EoReader $reader): EquipmentWelcome
    {
        $data = new EquipmentWelcome();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setBoots($reader->getShort());
            $data->setGloves($reader->getShort());
            $data->setAccessory($reader->getShort());
            $data->setArmor($reader->getShort());
            $data->setBelt($reader->getShort());
            $data->setNecklace($reader->getShort());
            $data->setHat($reader->getShort());
            $data->setShield($reader->getShort());
            $data->setWeapon($reader->getShort());
            $data->ring = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->ring[] = $reader->getShort();
            }
            $data->armlet = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->armlet[] = $reader->getShort();
            }
            $data->bracer = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->bracer[] = $reader->getShort();
            }

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
        return "EquipmentWelcome(byteSize=$this->byteSize, boots=".var_export($this->boots, true).", gloves=".var_export($this->gloves, true).", accessory=".var_export($this->accessory, true).", armor=".var_export($this->armor, true).", belt=".var_export($this->belt, true).", necklace=".var_export($this->necklace, true).", hat=".var_export($this->hat, true).", shield=".var_export($this->shield, true).", weapon=".var_export($this->weapon, true).", ring=".var_export($this->ring, true).", armlet=".var_export($this->armlet, true).", bracer=".var_export($this->bracer, true).")";
    }

}


