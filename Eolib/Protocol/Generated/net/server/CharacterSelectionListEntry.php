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
use Eolib\Protocol\Generated\AdminLevel;
use Eolib\Protocol\Generated\Gender;
use Eolib\Protocol\Generated\Net\server\EquipmentCharacterSelect;
use Eolib\Protocol\SerializationError;


class CharacterSelectionListEntry
{
    private $byteSize = 0;
    private string $name = "";
    private int $id;
    private int $level;
    private int $gender;
    private int $hairStyle;
    private int $hairColor;
    private int $skin;
    private int $admin;
    private EquipmentCharacterSelect $equipment;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }

    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }

    public function getSkin(): int
    {
        return $this->skin;
    }

    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }

    public function getAdmin(): int
    {
        return $this->admin;
    }

    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
    }

    public function getEquipment(): EquipmentCharacterSelect
    {
        return $this->equipment;
    }

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
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addInt($data->id);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->gender === null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->gender);

        if ($data->hairStyle === null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->hairStyle);

        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->hairColor);

        if ($data->skin === null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addChar($data->skin);

        if ($data->admin === null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->admin);

        if ($data->equipment === null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentCharacterSelect::serialize($writer, $data->equipment);


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
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->id = $reader->getInt();
            $data->level = $reader->getChar();
            $data->gender = Gender($reader->getChar());
            $data->hairStyle = $reader->getChar();
            $data->hairColor = $reader->getChar();
            $data->skin = $reader->getChar();
            $data->admin = AdminLevel($reader->getChar());
            $data->equipment = EquipmentCharacterSelect::deserialize($reader);
            $reader->setChunkedReadingMode(false);

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
        return "CharacterSelectionListEntry(byteSize=' . $this->byteSize . '', name=' . $this->name . '', id=' . $this->id . '', level=' . $this->level . '', gender=' . $this->gender . '', hairStyle=' . $this->hairStyle . '', hairColor=' . $this->hairColor . '', skin=' . $this->skin . '', admin=' . $this->admin . '', equipment=' . $this->equipment . ')";
    }

}


