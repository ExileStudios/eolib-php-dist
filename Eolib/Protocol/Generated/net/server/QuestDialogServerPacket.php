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
use Eolib\Protocol\Generated\Net\server\DialogEntry;
use Eolib\Protocol\Generated\Net\server\DialogQuestEntry;
use Eolib\Protocol\SerializationError;

/**
 * Quest selection dialog
 */


class QuestDialogServerPacket
{
    private $byteSize = 0;
    private int $questCount;
    private int $behaviorId;
    private int $questId;
    private int $sessionId;
    private int $dialogId;
    private array $questEntries;
    private array $dialogEntries;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }

    public function getQuestId(): int
    {
        return $this->questId;
    }

    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
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

    public function getQuestEntries(): array
    {
        return $this->questEntries;
    }

    public function setQuestEntries(array $questEntries): void
    {
        $this->questEntries = $questEntries;
        $this->questCount = strlen($this->questEntries);
    }

    public function getDialogEntries(): array
    {
        return $this->dialogEntries;
    }

    public function setDialogEntries(array $dialogEntries): void
    {
        $this->dialogEntries = $dialogEntries;
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
        return PacketAction::DIALOG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        QuestDialogServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestDialogServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestDialogServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestDialogServerPacket $data): void {
        if ($data->questCount === null)
        {
            throw new SerializationError('questCount must be provided.');
        }
        $writer->addChar($data->questCount);

        if ($data->behaviorId === null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->behaviorId);

        if ($data->questId === null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->questId);

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

        $writer->addByte(0xFF);
        if ($data->questEntries === null)
        {
            throw new SerializationError('questEntries must be provided.');
        }
        if (strlen($data->questEntries) > 252)
        {
            throw new SerializationError("Expected length of questEntries to be 252 or less, got {strlen($data->questEntries)}.");
        }
        for ($i = 0; $i < $data->questCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            DialogQuestEntry::serialize($writer, $data->questEntries[$i]);

        }
        if ($data->dialogEntries === null)
        {
            throw new SerializationError('dialogEntries must be provided.');
        }
        for ($i = 0; $i < count($data->dialogEntries); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            DialogEntry::serialize($writer, $data->dialogEntries[$i]);

        }

    }

    /**
     * Deserializes an instance of `QuestDialogServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestDialogServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestDialogServerPacket
    {
        $data = new QuestDialogServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->questCount = $reader->getChar();
            $data->behaviorId = $reader->getShort();
            $data->questId = $reader->getShort();
            $data->sessionId = $reader->getShort();
            $data->dialogId = $reader->getShort();
            $reader->nextChunk();
            $data->questEntries = [];
            for ($i = 0; $i < $data->questCount; $i++)
            {
                $data->questEntries[] = DialogQuestEntry::deserialize($reader);
                if ($i + 1 < $data->questCount)
                {
                    $reader->nextChunk();
                }
            }
            $data->dialogEntries = [];
            while ($reader->remaining() > 0)
            {
                $data->dialogEntries[] = DialogEntry::deserialize($reader);
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
        return "QuestDialogServerPacket(byteSize=' . $this->byteSize . '', behaviorId=' . $this->behaviorId . '', questId=' . $this->questId . '', sessionId=' . $this->sessionId . '', dialogId=' . $this->dialogId . '', questEntries=' . $this->questEntries . '', dialogEntries=' . $this->dialogEntries . ')";
    }

}



