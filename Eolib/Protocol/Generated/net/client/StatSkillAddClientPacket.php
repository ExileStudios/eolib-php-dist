<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\client\StatId;
use Eolib\Protocol\Generated\Net\client\TrainType;
use Eolib\Protocol\SerializationError;

/**
 * Spending a stat point on a stat or skill
 */


class StatSkillAddClientPacket
{
    private $byteSize = 0;
    private int $actionType;
    private ?actionTypeData $actionTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getActionType(): int
    {
        return $this->actionType;
    }

    public function setActionType(int $actionType): void
    {
        $this->actionType = $actionType;
    }

    public function actionTypeData(): ?actionTypeData
    {
        /**
         * StatSkillAddClientPacket::ActionTypeData: Gets or sets the data associated with the `actionType` field.
         */
        return $this->actionTypeData;
    }

    public function setActionTypeData($actionTypeData): void
    {
        $this->actionTypeData = $actionTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::STATSKILL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->actionType === null)
        {
            throw new SerializationError('actionType must be provided.');
        }
        $writer->addChar((int) $data->actionType);

        if ($data->actionType === TrainType::STAT)
        {
            if (!($data->actionTypeData instanceof ActionTypeDataStat))
            {
                throw new \Eolib\Protocol\SerializationError("Expected actionTypeData to be of type ActionTypeDataStat for actionType " . TrainType($data->actionType)->name . ".");
            }
            ActionTypeDataStat::serialize($writer, $data->actionTypeData);
        }
        elseif ($data->actionType === TrainType::SKILL)
        {
            if (!($data->actionTypeData instanceof ActionTypeDataSkill))
            {
                throw new \Eolib\Protocol\SerializationError("Expected actionTypeData to be of type ActionTypeDataSkill for actionType " . TrainType($data->actionType)->name . ".");
            }
            ActionTypeDataSkill::serialize($writer, $data->actionTypeData);
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
            $data->actionType = TrainType($reader->getChar());
            if ($data->actionType === TrainType::STAT)
            {
                $data->actionTypeData = ActionTypeDataStat::deserialize($reader);
            }
            elseif ($data->actionType === TrainType::SKILL)
            {
                $data->actionTypeData = ActionTypeDataSkill::deserialize($reader);
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
        return "StatSkillAddClientPacket(byteSize=' . $this->byteSize . '', actionType=' . $this->actionType . '', actionTypeData=' . $this->actionTypeData . ')";
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
    private $byteSize = 0;
    private int $statId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getStatId(): int
    {
        return $this->statId;
    }

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
        if ($data->statId === null)
        {
            throw new SerializationError('statId must be provided.');
        }
        $writer->addShort((int) $data->statId);


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
            $data->statId = StatId($reader->getShort());

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
        return "ActionTypeDataStat(byteSize=' . $this->byteSize . '', statId=' . $this->statId . ')";
    }

}



/**
 * Data associated with actionType value TrainType::SKILL
 */

class ActionTypeDataSkill implements ActionTypeData
{
    private $byteSize = 0;
    private int $spellId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSpellId(): int
    {
        return $this->spellId;
    }

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
        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);


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
            $data->spellId = $reader->getShort();

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
        return "ActionTypeDataSkill(byteSize=' . $this->byteSize . '', spellId=' . $this->spellId . ')";
    }

}





