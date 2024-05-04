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
use Eolib\Protocol\Net\Server\AvatarChangeType;
use Eolib\Protocol\Net\Server\EquipmentChange;
use Eolib\Protocol\SerializationError;


class AvatarChange
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $changeType;
    /** @var bool */
    private bool $sound;
    private ?ChangeTypeData $changeTypeData = null;

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return int */
    public function getChangeType(): int
    {
        return $this->changeType;
    }

    /** @param int $changeType */
    public function setChangeType(int $changeType): void
    {
        $this->changeType = $changeType;
    }



    /** @return bool */
    public function getSound(): bool
    {
        return $this->sound;
    }

    /** @param bool $sound */
    public function setSound(bool $sound): void
    {
        $this->sound = $sound;
    }



    public function getChangeTypeData(): ?ChangeTypeData
    {
        /**
         * AvatarChange::ChangeTypeData: Gets or sets the data associated with the `changeType` field.
         */
        return $this->changeTypeData;
    }

    public function setChangeTypeData(?ChangeTypeData $changeTypeData): void
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
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getChangeType() == null)
        {
            throw new SerializationError('changeType must be provided.');
        }
        $writer->addChar((int) $data->getChangeType());

        if ($data->getSound() == null)
        {
            throw new SerializationError('sound must be provided.');
        }
        $writer->addChar((int) $data->getSound());

        if ($data->changeType === AvatarChangeType::EQUIPMENT)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataEquipment))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataEquipment for changeType " . $data->changeType . ".");
            }
            ChangeTypeDataEquipment::serialize($writer, $data->getChangeTypeData());
        }
        elseif ($data->changeType === AvatarChangeType::HAIR)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataHair))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataHair for changeType " . $data->changeType . ".");
            }
            ChangeTypeDataHair::serialize($writer, $data->getChangeTypeData());
        }
        elseif ($data->changeType === AvatarChangeType::HAIRCOLOR)
        {
            if (!($data->changeTypeData instanceof ChangeTypeDataHairColor))
            {
                throw new \Eolib\Protocol\SerializationError("Expected changeTypeData to be of type ChangeTypeDataHairColor for changeType " . $data->changeType . ".");
            }
            ChangeTypeDataHairColor::serialize($writer, $data->getChangeTypeData());
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
            $data->setPlayerId($reader->getShort());
            $data->setChangeType($reader->getChar());
            $data->setSound($reader->getChar() !== 0);
            if ($data->changeType === AvatarChangeType::EQUIPMENT)
            {
                $data->setChangeTypeData(ChangeTypeDataEquipment::deserialize($reader));
            }
            elseif ($data->changeType === AvatarChangeType::HAIR)
            {
                $data->setChangeTypeData(ChangeTypeDataHair::deserialize($reader));
            }
            elseif ($data->changeType === AvatarChangeType::HAIRCOLOR)
            {
                $data->setChangeTypeData(ChangeTypeDataHairColor::deserialize($reader));
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
        return "AvatarChange(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", changeType=".var_export($this->changeType, true).", sound=".var_export($this->sound, true).", changeTypeData=".var_export($this->changeTypeData, true).")";
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
    private int $byteSize = 0;
    /** @var EquipmentChange */
    private EquipmentChange $equipment;

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

    /** @return EquipmentChange */
    public function getEquipment(): EquipmentChange
    {
        return $this->equipment;
    }

    /** @param EquipmentChange $equipment */
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
        if ($data->getEquipment() == null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentChange::serialize($writer, $data->getEquipment());


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
            $data->setEquipment(EquipmentChange::deserialize($reader));

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
        return "ChangeTypeDataEquipment(byteSize=$this->byteSize, equipment=".var_export($this->equipment, true).")";
    }

}



/**
 * Data associated with changeType value AvatarChangeType::HAIR
 */

class ChangeTypeDataHair implements ChangeTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $hairStyle;
    /** @var int */
    private int $hairColor;

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




    /**
     * Serializes an instance of `ChangeTypeDataHair` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChangeTypeDataHair $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChangeTypeDataHair $data): void {
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
            $data->setHairStyle($reader->getChar());
            $data->setHairColor($reader->getChar());

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
        return "ChangeTypeDataHair(byteSize=$this->byteSize, hairStyle=".var_export($this->hairStyle, true).", hairColor=".var_export($this->hairColor, true).")";
    }

}



/**
 * Data associated with changeType value AvatarChangeType::HAIRCOLOR
 */

class ChangeTypeDataHairColor implements ChangeTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $hairColor;

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
    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    /** @param int $hairColor */
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
        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->getHairColor());


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
            $data->setHairColor($reader->getChar());

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
        return "ChangeTypeDataHairColor(byteSize=$this->byteSize, hairColor=".var_export($this->hairColor, true).")";
    }

}




