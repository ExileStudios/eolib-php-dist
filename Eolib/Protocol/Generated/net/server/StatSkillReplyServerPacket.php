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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\server\SkillMasterReply;
use Eolib\Protocol\SerializationError;

/**
 * Response from unsuccessful action at a skill master
 */


class StatSkillReplyServerPacket
{
    private $byteSize = 0;
    private int $replyCode;
    private ?replyCodeData $replyCodeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getReplyCode(): int
    {
        return $this->replyCode;
    }

    public function setReplyCode(int $replyCode): void
    {
        $this->replyCode = $replyCode;
    }

    public function replyCodeData(): ?replyCodeData
    {
        /**
         * StatSkillReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
         */
        return $this->replyCodeData;
    }

    public function setReplyCodeData($replyCodeData): void
    {
        $this->replyCodeData = $replyCodeData;
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
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->replyCode);

        if ($data->replyCode === SkillMasterReply::WRONGCLASS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongClass))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongClass for replyCode " . SkillMasterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataWrongClass::serialize($writer, $data->replyCodeData);
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
            $data->replyCode = SkillMasterReply($reader->getShort());
            if ($data->replyCode === SkillMasterReply::WRONGCLASS)
            {
                $data->replyCodeData = ReplyCodeDataWrongClass::deserialize($reader);
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
        return "StatSkillReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
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
    private $byteSize = 0;
    private int $classId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

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
        if ($data->classId === null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->classId);


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
            $data->classId = $reader->getChar();

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
        return "ReplyCodeDataWrongClass(byteSize=' . $this->byteSize . '', classId=' . $this->classId . ')";
    }

}





