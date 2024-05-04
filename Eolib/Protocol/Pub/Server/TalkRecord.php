<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\Server\TalkMessageRecord;
use Eolib\Protocol\SerializationError;


class TalkRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcId;
    /** @var int */
    private int $rate;
    /** @var int */
    private int $messagesCount;
    /** @var TalkMessageRecord[] */
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



    /** @return int */
    public function getRate(): int
    {
        return $this->rate;
    }

    /** @param int $rate */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }



    /** @return TalkMessageRecord[] */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /** @param TalkMessageRecord[] $messages */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
        $this->messagesCount = count($this->messages);
    }

    /** @return int */
    public function getMessagesCount(): int
    {
        return $this->messagesCount;
    }

    /** @param int $messagesCount */
    public function setMessagesCount(int $messagesCount): void
    {
        $this->messagesCount = $messagesCount;
    }


    /**
     * Serializes an instance of `TalkRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkRecord $data): void {
        if ($data->getNpcId() == null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->getNpcId());

        if ($data->getRate() == null)
        {
            throw new SerializationError('rate must be provided.');
        }
        $writer->addChar($data->getRate());

        if ($data->getMessagesCount() == null)
        {
            throw new SerializationError('messagesCount must be provided.');
        }
        $writer->addChar($data->getMessagesCount());

        if ($data->getMessages() == null)
        {
            throw new SerializationError('messages must be provided.');
        }
        if (count($data->messages) > 252)
        {
            throw new SerializationError("Expected length of messages to be 252 or less, got " . count($data->messages) . ".");
        }
        for ($i = 0; $i < $data->getMessagesCount(); $i++)
        {
            TalkMessageRecord::serialize($writer, $data->getMessages()[$i]);

        }

    }

    /**
     * Deserializes an instance of `TalkRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkRecord
    {
        $data = new TalkRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcId($reader->getShort());
            $data->setRate($reader->getChar());
            $data->setMessagesCount($reader->getChar());
            $data->messages = [];
            for ($i = 0; $i < $data->getMessagesCount(); $i++)
            {
                $data->messages[] = TalkMessageRecord::deserialize($reader);
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
        return "TalkRecord(byteSize=$this->byteSize, npcId=".var_export($this->npcId, true).", rate=".var_export($this->rate, true).", messages=".var_export($this->messages, true).")";
    }

}


