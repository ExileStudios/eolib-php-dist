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
use Eolib\Protocol\Net\Server\DialogEntry;
use Eolib\Protocol\Net\Server\DialogQuestEntry;
use Eolib\Protocol\SerializationError;

/**
 * Quest selection dialog
 */


class QuestDialogServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $questCount;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $questId;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $dialogId;
    /** @var DialogQuestEntry[] */
    public array $questEntries = [];
    /** @var DialogEntry[] */
    public array $dialogEntries = [];

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
    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    /** @param int $behaviorId */
    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
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



    /** @return DialogQuestEntry[] */
    public function getQuestEntries(): array
    {
        return $this->questEntries;
    }

    /** @param DialogQuestEntry[] $questEntries */
    public function setQuestEntries(array $questEntries): void
    {
        $this->questEntries = $questEntries;
        $this->questCount = count($this->questEntries);
    }

    /** @return int */
    public function getQuestCount(): int
    {
        return $this->questCount;
    }

    /** @param int $questCount */
    public function setQuestCount(int $questCount): void
    {
        $this->questCount = $questCount;
    }

    /** @return DialogEntry[] */
    public function getDialogEntries(): array
    {
        return $this->dialogEntries;
    }

    /** @param DialogEntry[] $dialogEntries */
    public function setDialogEntries(array $dialogEntries): void
    {
        $this->dialogEntries = $dialogEntries;
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
        if ($data->getQuestCount() == null)
        {
            throw new SerializationError('questCount must be provided.');
        }
        $writer->addChar($data->getQuestCount());

        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->getBehaviorId());

        if ($data->getQuestId() == null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->getQuestId());

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

        $writer->addByte(0xFF);
        if ($data->getQuestEntries() == null)
        {
            throw new SerializationError('questEntries must be provided.');
        }
        if (count($data->questEntries) > 252)
        {
            throw new SerializationError("Expected length of questEntries to be 252 or less, got " . count($data->questEntries) . ".");
        }
        for ($i = 0; $i < $data->getQuestCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            DialogQuestEntry::serialize($writer, $data->getQuestEntries()[$i]);

        }
        if ($data->getDialogEntries() == null)
        {
            throw new SerializationError('dialogEntries must be provided.');
        }
        for ($i = 0; $i < count($data->dialogEntries); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            DialogEntry::serialize($writer, $data->getDialogEntries()[$i]);

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
            $data->setQuestCount($reader->getChar());
            $data->setBehaviorId($reader->getShort());
            $data->setQuestId($reader->getShort());
            $data->setSessionId($reader->getShort());
            $data->setDialogId($reader->getShort());
            $reader->nextChunk();
            $data->questEntries = [];
            for ($i = 0; $i < $data->getQuestCount(); $i++)
            {
                $data->questEntries[] = DialogQuestEntry::deserialize($reader);
                if ($i + 1 < $data->getQuestCount())
                {
                    $reader->nextChunk();
                }
            }
            $data->dialogEntries = [];
            while ($reader->getRemaining() > 0)
            {
                $data->dialogEntries[] = DialogEntry::deserialize($reader);
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
        return "QuestDialogServerPacket(byteSize=$this->byteSize, behaviorId=".var_export($this->behaviorId, true).", questId=".var_export($this->questId, true).", sessionId=".var_export($this->sessionId, true).", dialogId=".var_export($this->dialogId, true).", questEntries=".var_export($this->questEntries, true).", dialogEntries=".var_export($this->dialogEntries, true).")";
    }

}



