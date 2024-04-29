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


class EquipmentPaperdoll
{
    private $byteSize = 0;
    private int $boots;
    private int $accessory;
    private int $gloves;
    private int $belt;
    private int $armor;
    private int $necklace;
    private int $hat;
    private int $shield;
    private int $weapon;
    private array $ring;
    private array $armlet;
    private array $bracer;

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

    public function getAccessory(): int
    {
        return $this->accessory;
    }

    public function setAccessory(int $accessory): void
    {
        $this->accessory = $accessory;
    }

    public function getGloves(): int
    {
        return $this->gloves;
    }

    public function setGloves(int $gloves): void
    {
        $this->gloves = $gloves;
    }

    public function getBelt(): int
    {
        return $this->belt;
    }

    public function setBelt(int $belt): void
    {
        $this->belt = $belt;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }

    public function getNecklace(): int
    {
        return $this->necklace;
    }

    public function setNecklace(int $necklace): void
    {
        $this->necklace = $necklace;
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

    public function getRing(): array
    {
        return $this->ring;
    }

    public function setRing(array $ring): void
    {
        $this->ring = $ring;
    }

    public function getArmlet(): array
    {
        return $this->armlet;
    }

    public function setArmlet(array $armlet): void
    {
        $this->armlet = $armlet;
    }

    public function getBracer(): array
    {
        return $this->bracer;
    }

    public function setBracer(array $bracer): void
    {
        $this->bracer = $bracer;
    }


    /**
     * Serializes an instance of `EquipmentPaperdoll` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EquipmentPaperdoll $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EquipmentPaperdoll $data): void {
        if ($data->boots === null)
        {
            throw new SerializationError('boots must be provided.');
        }
        $writer->addShort($data->boots);

        if ($data->accessory === null)
        {
            throw new SerializationError('accessory must be provided.');
        }
        $writer->addShort($data->accessory);

        if ($data->gloves === null)
        {
            throw new SerializationError('gloves must be provided.');
        }
        $writer->addShort($data->gloves);

        if ($data->belt === null)
        {
            throw new SerializationError('belt must be provided.');
        }
        $writer->addShort($data->belt);

        if ($data->armor === null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->armor);

        if ($data->necklace === null)
        {
            throw new SerializationError('necklace must be provided.');
        }
        $writer->addShort($data->necklace);

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

        if ($data->ring === null)
        {
            throw new SerializationError('ring must be provided.');
        }
        if (strlen($data->ring) != 2)
        {
            throw new SerializationError("Expected length of ring to be exactly 2, got {strlen($data->ring)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->ring[$i]);

        }
        if ($data->armlet === null)
        {
            throw new SerializationError('armlet must be provided.');
        }
        if (strlen($data->armlet) != 2)
        {
            throw new SerializationError("Expected length of armlet to be exactly 2, got {strlen($data->armlet)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->armlet[$i]);

        }
        if ($data->bracer === null)
        {
            throw new SerializationError('bracer must be provided.');
        }
        if (strlen($data->bracer) != 2)
        {
            throw new SerializationError("Expected length of bracer to be exactly 2, got {strlen($data->bracer)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->bracer[$i]);

        }

    }

    /**
     * Deserializes an instance of `EquipmentPaperdoll` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EquipmentPaperdoll The deserialized data.
     */
    public static function deserialize(EoReader $reader): EquipmentPaperdoll
    {
        $data = new EquipmentPaperdoll();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->boots = $reader->getShort();
            $data->accessory = $reader->getShort();
            $data->gloves = $reader->getShort();
            $data->belt = $reader->getShort();
            $data->armor = $reader->getShort();
            $data->necklace = $reader->getShort();
            $data->hat = $reader->getShort();
            $data->shield = $reader->getShort();
            $data->weapon = $reader->getShort();
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
        return "EquipmentPaperdoll(byteSize=' . $this->byteSize . '', boots=' . $this->boots . '', accessory=' . $this->accessory . '', gloves=' . $this->gloves . '', belt=' . $this->belt . '', armor=' . $this->armor . '', necklace=' . $this->necklace . '', hat=' . $this->hat . '', shield=' . $this->shield . '', weapon=' . $this->weapon . '', ring=' . $this->ring . '', armlet=' . $this->armlet . '', bracer=' . $this->bracer . ')";
    }

}


