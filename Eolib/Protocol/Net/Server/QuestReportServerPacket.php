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
use Eolib\Protocol\SerializationError;

/**
 * NPC chat messages
 */


class QuestReportServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcId;
    /** @var string[] */
    public array $messages = [];

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
    public function getNpcId(): int
    {
        return $this->npcId;
    }

    /** @param int $npcId */
    public function setNpcId(int $npcId): void
    {
        $this->npcId = $npcId;
    }



    /** @return string[] */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /** @param string[] $messages */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
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
        return PacketAction::REPORT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        QuestReportServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestReportServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestReportServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestReportServerPacket $data): void {
        if ($data->getNpcId() == null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->getNpcId());

        $writer->addByte(0xFF);
        if ($data->getMessages() == null)
        {
            throw new SerializationError('messages must be provided.');
        }
        for ($i = 0; $i < count($data->messages); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getMessages()[$i]);

        }

    }

    /**
     * Deserializes an instance of `QuestReportServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestReportServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestReportServerPacket
    {
        $data = new QuestReportServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setNpcId($reader->getShort());
            $reader->nextChunk();
            $data->messages = [];
            while ($reader->getRemaining() > 0)
            {
                $data->messages[] = $reader->getString();
                $reader->nextChunk();
            }
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
        return "QuestReportServerPacket(byteSize=$this->byteSize, npcId=".var_export($this->npcId, true).", messages=".var_export($this->messages, true).")";
    }

}



