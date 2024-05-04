<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\Client\StatId;
use Eolib\Protocol\Net\Client\TrainType;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Spending a stat point on a stat or skill
 */


class StatSkillAddClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $actionType;
    private ?ActionTypeData $actionTypeData = null;

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
    public function getActionType(): int
    {
        return $this->actionType;
    }

    /** @param int $actionType */
    public function setActionType(int $actionType): void
    {
        $this->actionType = $actionType;
    }



    public function getActionTypeData(): ?ActionTypeData
    {
        /**
         * StatSkillAddClientPacket::ActionTypeData: Gets or sets the data associated with the `actionType` field.
         */
        return $this->actionTypeData;
    }

    public function setActionTypeData(?ActionTypeData $actionTypeData): void
    {
        $this->actionTypeData = $actionTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::STATSKILL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillAddClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillAddClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillAddClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillAddClientPacket $data): void {
        if ($data->getActionType() == null)
        {
            throw new SerializationError('actionType must be provided.');
        }
        $writer->addChar((int) $data->getActionType());

        if ($data->actionType === TrainType::STAT)
        {
            if (!($data->actionTypeData instanceof ActionTypeDataStat))
            {
                throw new \Eolib\Protocol\SerializationError("Expected actionTypeData to be of type ActionTypeDataStat for actionType " . $data->actionType . ".");
            }
            ActionTypeDataStat::serialize($writer, $data->getActionTypeData());
        }
        elseif ($data->actionType === TrainType::SKILL)
        {
            if (!($data->actionTypeData instanceof ActionTypeDataSkill))
            {
                throw new \Eolib\Protocol\SerializationError("Expected actionTypeData to be of type ActionTypeDataSkill for actionType " . $data->actionType . ".");
            }
            ActionTypeDataSkill::serialize($writer, $data->getActionTypeData());
        }

    }

    /**
     * Deserializes an instance of `StatSkillAddClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillAddClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillAddClientPacket
    {
        $data = new StatSkillAddClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setActionType($reader->getChar());
            if ($data->actionType === TrainType::STAT)
            {
                $data->setActionTypeData(ActionTypeDataStat::deserialize($reader));
            }
            elseif ($data->actionType === TrainType::SKILL)
            {
                $data->setActionTypeData(ActionTypeDataSkill::deserialize($reader));
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
        return "StatSkillAddClientPacket(byteSize=$this->byteSize, actionType=".var_export($this->actionType, true).", actionTypeData=".var_export($this->actionTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `actionType` field.
 */
interface ActionTypeData {}

/**
 * Data associated with actionType value TrainType::STAT
 */

class ActionTypeDataStat implements ActionTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $statId;

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
    public function getStatId(): int
    {
        return $this->statId;
    }

    /** @param int $statId */
    public function setStatId(int $statId): void
    {
        $this->statId = $statId;
    }




    /**
     * Serializes an instance of `ActionTypeDataStat` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ActionTypeDataStat $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ActionTypeDataStat $data): void {
        if ($data->getStatId() == null)
        {
            throw new SerializationError('statId must be provided.');
        }
        $writer->addShort((int) $data->getStatId());


    }

    /**
     * Deserializes an instance of `ActionTypeDataStat` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ActionTypeDataStat The deserialized data.
     */
    public static function deserialize(EoReader $reader): ActionTypeDataStat
    {
        $data = new ActionTypeDataStat();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setStatId($reader->getShort());

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
        return "ActionTypeDataStat(byteSize=$this->byteSize, statId=".var_export($this->statId, true).")";
    }

}



/**
 * Data associated with actionType value TrainType::SKILL
 */

class ActionTypeDataSkill implements ActionTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $spellId;

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
    public function getSpellId(): int
    {
        return $this->spellId;
    }

    /** @param int $spellId */
    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }




    /**
     * Serializes an instance of `ActionTypeDataSkill` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ActionTypeDataSkill $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ActionTypeDataSkill $data): void {
        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());


    }

    /**
     * Deserializes an instance of `ActionTypeDataSkill` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ActionTypeDataSkill The deserialized data.
     */
    public static function deserialize(EoReader $reader): ActionTypeDataSkill
    {
        $data = new ActionTypeDataSkill();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSpellId($reader->getShort());

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
        return "ActionTypeDataSkill(byteSize=$this->byteSize, spellId=".var_export($this->spellId, true).")";
    }

}





