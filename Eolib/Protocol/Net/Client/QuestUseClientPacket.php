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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Talking to a quest NPC
 */


class QuestUseClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcIndex;
    /** @var int */
    private int $questId;

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
    public function getQuestId(): int
    {
        return $this->questId;
    }

    /** @param int $questId */
    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
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
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        QuestUseClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestUseClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestUseClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestUseClientPacket $data): void {
        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->getNpcIndex());

        if ($data->getQuestId() == null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->getQuestId());


    }

    /**
     * Deserializes an instance of `QuestUseClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestUseClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestUseClientPacket
    {
        $data = new QuestUseClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcIndex($reader->getShort());
            $data->setQuestId($reader->getShort());

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
        return "QuestUseClientPacket(byteSize=$this->byteSize, npcIndex=".var_export($this->npcIndex, true).", questId=".var_export($this->questId, true).")";
    }

}



