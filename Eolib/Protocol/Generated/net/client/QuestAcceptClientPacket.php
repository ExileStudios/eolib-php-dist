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
use Eolib\Protocol\Generated\Net\client\DialogReply;
use Eolib\Protocol\SerializationError;

/**
 * Response to a quest NPC dialog
 */


class QuestAcceptClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $dialogId;
    private int $questId;
    private int $npcIndex;
    private int $replyType;
    private ?replyTypeData $replyTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getDialogId(): int
    {
        return $this->dialogId;
    }

    public function setDialogId(int $dialogId): void
    {
        $this->dialogId = $dialogId;
    }

    public function getQuestId(): int
    {
        return $this->questId;
    }

    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
    }

    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }

    public function getReplyType(): int
    {
        return $this->replyType;
    }

    public function setReplyType(int $replyType): void
    {
        $this->replyType = $replyType;
    }

    public function replyTypeData(): ?replyTypeData
    {
        /**
         * QuestAcceptClientPacket::ReplyTypeData: Gets or sets the data associated with the `replyType` field.
         */
        return $this->replyTypeData;
    }

    public function setReplyTypeData($replyTypeData): void
    {
        $this->replyTypeData = $replyTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::QUEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        if ($data->dialogId === null)
        {
            throw new SerializationError('dialogId must be provided.');
        }
        $writer->addShort($data->dialogId);

        if ($data->questId === null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->questId);

        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->npcIndex);

        if ($data->replyType === null)
        {
            throw new SerializationError('replyType must be provided.');
        }
        $writer->addChar((int) $data->replyType);

        if ($data->replyType === DialogReply::LINK)
        {
            if (!($data->replyTypeData instanceof ReplyTypeDataLink))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyTypeData to be of type ReplyTypeDataLink for replyType " . DialogReply($data->replyType)->name . ".");
            }
            ReplyTypeDataLink::serialize($writer, $data->replyTypeData);
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
            $data->sessionId = $reader->getShort();
            $data->dialogId = $reader->getShort();
            $data->questId = $reader->getShort();
            $data->npcIndex = $reader->getShort();
            $data->replyType = DialogReply($reader->getChar());
            if ($data->replyType === DialogReply::LINK)
            {
                $data->replyTypeData = ReplyTypeDataLink::deserialize($reader);
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
        return "QuestAcceptClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', dialogId=' . $this->dialogId . '', questId=' . $this->questId . '', npcIndex=' . $this->npcIndex . '', replyType=' . $this->replyType . '', replyTypeData=' . $this->replyTypeData . ')";
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
    private $byteSize = 0;
    private int $action;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getAction(): int
    {
        return $this->action;
    }

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
        if ($data->action === null)
        {
            throw new SerializationError('action must be provided.');
        }
        $writer->addChar($data->action);


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
            $data->action = $reader->getChar();

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
        return "ReplyTypeDataLink(byteSize=' . $this->byteSize . '', action=' . $this->action . ')";
    }

}





