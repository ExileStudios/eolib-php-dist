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
use Eolib\Protocol\SerializationError;

/**
 * NPC chat messages
 */


class QuestReportServerPacket
{
    private $byteSize = 0;
    private int $npcId;
    private array $messages = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcId(): int
    {
        return $this->npcId;
    }

    public function setNpcId(int $npcId): void
    {
        $this->npcId = $npcId;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
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
        if ($data->npcId === null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->npcId);

        $writer->addByte(0xFF);
        if ($data->messages === null)
        {
            throw new SerializationError('messages must be provided.');
        }
        for ($i = 0; $i < count($data->messages); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->messages[$i]);

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
            $data->npcId = $reader->getShort();
            $reader->nextChunk();
            $data->messages = [];
            while ($reader->remaining() > 0)
            {
                $data->messages[] = $reader->getString();
                $reader->nextChunk();
            }
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
        return "QuestReportServerPacket(byteSize=' . $this->byteSize . '', npcId=' . $this->npcId . '', messages=' . $this->messages . ')";
    }

}



