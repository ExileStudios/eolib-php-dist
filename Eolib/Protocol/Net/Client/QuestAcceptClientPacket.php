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
use Eolib\Protocol\Net\Client\DialogReply;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Response to a quest NPC dialog
 */


class QuestAcceptClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $dialogId;
    /** @var int */
    private int $questId;
    /** @var int */
    private int $npcIndex;
    /** @var int */
    private int $replyType;
    private ?ReplyTypeData $replyTypeData = null;

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /** @return int */
    public function getDialogId(): int
    {
        return $this->dialogId;
    }

    /** @param int $dialogId */
    public function setDialogId(int $dialogId): void
    {
        $this->dialogId = $dialogId;
    }



    /** @return int */
    public function getQuestId(): int
    {
        return $this->questId;
    }

    /** @param int $questId */
    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
    }



    /** @return int */
    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    /** @param int $npcIndex */
    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }



    /** @return int */
    public function getReplyType(): int
    {
        return $this->replyType;
    }

    /** @param int $replyType */
    public function setReplyType(int $replyType): void
    {
        $this->replyType = $replyType;
    }



    public function getReplyTypeData(): ?ReplyTypeData
    {
        /**
         * QuestAcceptClientPacket::ReplyTypeData: Gets or sets the data associated with the `replyType` field.
         */
        return $this->replyTypeData;
    }

    public function setReplyTypeData(?ReplyTypeData $replyTypeData): void
    {
        $this->replyTypeData = $replyTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::QUEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        QuestAcceptClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestAcceptClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestAcceptClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestAcceptClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->getDialogId() == null)
        {
            throw new SerializationError('dialogId must be provided.');
        }
        $writer->addShort($data->getDialogId());

        if ($data->getQuestId() == null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->getQuestId());

        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->getNpcIndex());

        if ($data->getReplyType() == null)
        {
            throw new SerializationError('replyType must be provided.');
        }
        $writer->addChar((int) $data->getReplyType());

        if ($data->replyType === DialogReply::LINK)
        {
            if (!($data->replyTypeData instanceof ReplyTypeDataLink))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyTypeData to be of type ReplyTypeDataLink for replyType " . $data->replyType . ".");
            }
            ReplyTypeDataLink::serialize($writer, $data->getReplyTypeData());
        }

    }

    /**
     * Deserializes an instance of `QuestAcceptClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestAcceptClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestAcceptClientPacket
    {
        $data = new QuestAcceptClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSessionId($reader->getShort());
            $data->setDialogId($reader->getShort());
            $data->setQuestId($reader->getShort());
            $data->setNpcIndex($reader->getShort());
            $data->setReplyType($reader->getChar());
            if ($data->replyType === DialogReply::LINK)
            {
                $data->setReplyTypeData(ReplyTypeDataLink::deserialize($reader));
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
        return "QuestAcceptClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", dialogId=".var_export($this->dialogId, true).", questId=".var_export($this->questId, true).", npcIndex=".var_export($this->npcIndex, true).", replyType=".var_export($this->replyType, true).", replyTypeData=".var_export($this->replyTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyType` field.
 */
interface ReplyTypeData {}

/**
 * Data associated with replyType value DialogReply::LINK
 */

class ReplyTypeDataLink implements ReplyTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $action;

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
    public function getAction(): int
    {
        return $this->action;
    }

    /** @param int $action */
    public function setAction(int $action): void
    {
        $this->action = $action;
    }




    /**
     * Serializes an instance of `ReplyTypeDataLink` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyTypeDataLink $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyTypeDataLink $data): void {
        if ($data->getAction() == null)
        {
            throw new SerializationError('action must be provided.');
        }
        $writer->addChar($data->getAction());


    }

    /**
     * Deserializes an instance of `ReplyTypeDataLink` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyTypeDataLink The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyTypeDataLink
    {
        $data = new ReplyTypeDataLink();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setAction($reader->getChar());

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
        return "ReplyTypeDataLink(byteSize=$this->byteSize, action=".var_export($this->action, true).")";
    }

}





