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
use Eolib\Protocol\Generated\Net\server\AvatarChangeType;
use Eolib\Protocol\Generated\Net\server\EquipmentChange;
use Eolib\Protocol\SerializationError;


class AvatarChange
{
    private $byteSize = 0;
    private int $playerId;
    private int $changeType;
    private bool $sound;
    private ?changeTypeData $changeTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getChangeType(): int
    {
        return $this->changeType;
    }

    public function setChangeType(int $changeType): void
    {
        $this->changeType = $changeType;
    }

    public function getSound(): bool
    {
        return $this->sound;
    }

    public function setSound(bool $sound): void
    {
        $this->sound = $sound;
    }

    public function changeTypeData(): ?changeTypeData
    {
        /**
         * AvatarChange::ChangeTypeData: Gets or sets the data associated with the `changeType` field.
         */
        return $this->changeTypeData;
    }

    public function setChangeTypeData($changeTypeData): void
    {
        $this->changeTypeData = $changeTypeData;
    }


    /**
     * Serializes an instance of `AvatarChange` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AvatarChange $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AvatarChange $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->changeType === null)
        {
            throw new SerializationError('changeType must be provided.');
        }
        $writer->addChar((int) $data->changeType);

        if ($data->sound === null)
        {
            throw new SerializationError('sound must be provided.');
        }
        $writer->addChar($data->sound ? 1 : 0);

        if ($data->changeType === AvatarChangeType::EQUIPMENT)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataEquipment))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataEquipment for changeType " . AvatarChangeType($data->changeType)->name . ".");
            }
            ChangeTypeDataEquipment::serialize($writer, $data->changeTypeData);
        }
        elseif ($data->changeType === AvatarChangeType::HAIR)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataHair))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataHair for changeType " . AvatarChangeType($data->changeType)->name . ".");
            }
            ChangeTypeDataHair::serialize($writer, $data->changeTypeData);
        }
        elseif ($data->changeType === AvatarChangeType::HAIRCOLOR)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataHairColor))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataHairColor for changeType " . AvatarChangeType($data->changeType)->name . ".");
            }
            ChangeTypeDataHairColor::serialize($writer, $data->changeTypeData);
        }

    }

    /**
     * Deserializes an instance of `AvatarChange` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AvatarChange The deserialized data.
     */
    public static function deserialize(EoReader $reader): AvatarChange
    {
        $data = new AvatarChange();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->changeType = AvatarChangeType($reader->getChar());
            $data->sound = $reader->getChar() !== 0;
            if ($data->changeType === AvatarChangeType::EQUIPMENT)
            {
                $data->changeTypeData = ChangeTypeDataEquipment::deserialize($reader);
            }
            elseif ($data->changeType === AvatarChangeType::HAIR)
            {
                $data->changeTypeData = ChangeTypeDataHair::deserialize($reader);
            }
            elseif ($data->changeType === AvatarChangeType::HAIRCOLOR)
            {
                $data->changeTypeData = ChangeTypeDataHairColor::deserialize($reader);
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
        return "AvatarChange(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', changeType=' . $this->changeType . '', sound=' . $this->sound . '', changeTypeData=' . $this->changeTypeData . ')";
    }

}

/**
 * Data associated with different values of the `changeType` field.
 */
interface ChangeTypeData {}

/**
 * Data associated with changeType value AvatarChangeType::EQUIPMENT
 */

class ChangeTypeDataEquipment implements ChangeTypeData
{
    private $byteSize = 0;
    private EquipmentChange $equipment;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getEquipment(): EquipmentChange
    {
        return $this->equipment;
    }

    public function setEquipment(EquipmentChange $equipment): void
    {
        $this->equipment = $equipment;
    }


    /**
     * Serializes an instance of `ChangeTypeDataEquipment` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChangeTypeDataEquipment $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChangeTypeDataEquipment $data): void {
        if ($data->equipment === null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentChange::serialize($writer, $data->equipment);


    }

    /**
     * Deserializes an instance of `ChangeTypeDataEquipment` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChangeTypeDataEquipment The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChangeTypeDataEquipment
    {
        $data = new ChangeTypeDataEquipment();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->equipment = EquipmentChange::deserialize($reader);

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
        return "ChangeTypeDataEquipment(byteSize=' . $this->byteSize . '', equipment=' . $this->equipment . ')";
    }

}



/**
 * Data associated with changeType value AvatarChangeType::HAIR
 */

class ChangeTypeDataHair implements ChangeTypeData
{
    private $byteSize = 0;
    private int $hairStyle;
    private int $hairColor;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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


    /**
     * Serializes an instance of `ChangeTypeDataHair` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChangeTypeDataHair $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChangeTypeDataHair $data): void {
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


    }

    /**
     * Deserializes an instance of `ChangeTypeDataHair` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChangeTypeDataHair The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChangeTypeDataHair
    {
        $data = new ChangeTypeDataHair();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->hairStyle = $reader->getChar();
            $data->hairColor = $reader->getChar();

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
        return "ChangeTypeDataHair(byteSize=' . $this->byteSize . '', hairStyle=' . $this->hairStyle . '', hairColor=' . $this->hairColor . ')";
    }

}



/**
 * Data associated with changeType value AvatarChangeType::HAIRCOLOR
 */

class ChangeTypeDataHairColor implements ChangeTypeData
{
    private $byteSize = 0;
    private int $hairColor;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }


    /**
     * Serializes an instance of `ChangeTypeDataHairColor` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChangeTypeDataHairColor $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChangeTypeDataHairColor $data): void {
        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->hairColor);


    }

    /**
     * Deserializes an instance of `ChangeTypeDataHairColor` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChangeTypeDataHairColor The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChangeTypeDataHairColor
    {
        $data = new ChangeTypeDataHairColor();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->hairColor = $reader->getChar();

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
        return "ChangeTypeDataHairColor(byteSize=' . $this->byteSize . '', hairColor=' . $this->hairColor . ')";
    }

}




