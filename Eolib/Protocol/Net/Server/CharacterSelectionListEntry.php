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
use Eolib\Protocol\AdminLevel;
use Eolib\Protocol\Gender;
use Eolib\Protocol\Net\Server\EquipmentCharacterSelect;
use Eolib\Protocol\SerializationError;


class CharacterSelectionListEntry
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $id;
    /** @var int */
    private int $level;
    /** @var int */
    private int $gender;
    /** @var int */
    private int $hairStyle;
    /** @var int */
    private int $hairColor;
    /** @var int */
    private int $skin;
    /** @var int */
    private int $admin;
    /** @var EquipmentCharacterSelect */
    private EquipmentCharacterSelect $equipment;

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @param int $id */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    /** @return int */
    public function getLevel(): int
    {
        return $this->level;
    }

    /** @param int $level */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }



    /** @return int */
    public function getGender(): int
    {
        return $this->gender;
    }

    /** @param int $gender */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }



    /** @return int */
    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    /** @param int $hairStyle */
    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }



    /** @return int */
    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    /** @param int $hairColor */
    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }



    /** @return int */
    public function getSkin(): int
    {
        return $this->skin;
    }

    /** @param int $skin */
    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }



    /** @return int */
    public function getAdmin(): int
    {
        return $this->admin;
    }

    /** @param int $admin */
    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
    }



    /** @return EquipmentCharacterSelect */
    public function getEquipment(): EquipmentCharacterSelect
    {
        return $this->equipment;
    }

    /** @param EquipmentCharacterSelect $equipment */
    public function setEquipment(EquipmentCharacterSelect $equipment): void
    {
        $this->equipment = $equipment;
    }




    /**
     * Serializes an instance of `CharacterSelectionListEntry` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterSelectionListEntry $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterSelectionListEntry $data): void {
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addInt($data->getId());

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getGender() == null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->getGender());

        if ($data->getHairStyle() == null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->getHairStyle());

        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->getHairColor());

        if ($data->getSkin() == null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addChar($data->getSkin());

        if ($data->getAdmin() == null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->getAdmin());

        if ($data->getEquipment() == null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentCharacterSelect::serialize($writer, $data->getEquipment());


    }

    /**
     * Deserializes an instance of `CharacterSelectionListEntry` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterSelectionListEntry The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterSelectionListEntry
    {
        $data = new CharacterSelectionListEntry();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setId($reader->getInt());
            $data->setLevel($reader->getChar());
            $data->setGender($reader->getChar());
            $data->setHairStyle($reader->getChar());
            $data->setHairColor($reader->getChar());
            $data->setSkin($reader->getChar());
            $data->setAdmin($reader->getChar());
            $data->setEquipment(EquipmentCharacterSelect::deserialize($reader));
            $reader->setChunkedReadingMode(false);

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
        return "CharacterSelectionListEntry(byteSize=$this->byteSize, name=$this->name, id=".var_export($this->id, true).", level=".var_export($this->level, true).", gender=".var_export($this->gender, true).", hairStyle=".var_export($this->hairStyle, true).", hairColor=".var_export($this->hairColor, true).", skin=".var_export($this->skin, true).", admin=".var_export($this->admin, true).", equipment=".var_export($this->equipment, true).")";
    }

}


