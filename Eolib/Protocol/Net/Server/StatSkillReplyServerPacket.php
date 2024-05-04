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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Server\SkillMasterReply;
use Eolib\Protocol\SerializationError;

/**
 * Response from unsuccessful action at a skill master
 */


class StatSkillReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $replyCode;
    private ?ReplyCodeData $replyCodeData = null;

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
    public function getReplyCode(): int
    {
        return $this->replyCode;
    }

    /** @param int $replyCode */
    public function setReplyCode(int $replyCode): void
    {
        $this->replyCode = $replyCode;
    }



    public function getReplyCodeData(): ?ReplyCodeData
    {
        /**
         * StatSkillReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
         */
        return $this->replyCodeData;
    }

    public function setReplyCodeData(?ReplyCodeData $replyCodeData): void
    {
        $this->replyCodeData = $replyCodeData;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillReplyServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->getReplyCode());

        if ($data->replyCode === SkillMasterReply::WRONGCLASS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongClass))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongClass for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataWrongClass::serialize($writer, $data->getReplyCodeData());
        }

    }

    /**
     * Deserializes an instance of `StatSkillReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillReplyServerPacket
    {
        $data = new StatSkillReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === SkillMasterReply::WRONGCLASS)
            {
                $data->setReplyCodeData(ReplyCodeDataWrongClass::deserialize($reader));
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
        return "StatSkillReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value SkillMasterReply::WRONGCLASS
 */

class ReplyCodeDataWrongClass implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $classId;

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
    public function getClassId(): int
    {
        return $this->classId;
    }

    /** @param int $classId */
    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }




    /**
     * Serializes an instance of `ReplyCodeDataWrongClass` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataWrongClass $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataWrongClass $data): void {
        if ($data->getClassId() == null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->getClassId());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataWrongClass` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataWrongClass The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataWrongClass
    {
        $data = new ReplyCodeDataWrongClass();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setClassId($reader->getChar());

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
        return "ReplyCodeDataWrongClass(byteSize=$this->byteSize, classId=".var_export($this->classId, true).")";
    }

}





