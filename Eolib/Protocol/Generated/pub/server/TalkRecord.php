<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\server\TalkMessageRecord;
use Eolib\Protocol\SerializationError;


class TalkRecord
{
    private $byteSize = 0;
    private int $npcId;
    private int $rate;
    private int $messagesCount;
    private array $messages;

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

    public function getRate(): int
    {
        return $this->rate;
    }

    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
        $this->messagesCount = strlen($this->messages);
    }


    /**
     * Serializes an instance of `TalkRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkRecord $data): void {
        if ($data->npcId === null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->npcId);

        if ($data->rate === null)
        {
            throw new SerializationError('rate must be provided.');
        }
        $writer->addChar($data->rate);

        if ($data->messagesCount === null)
        {
            throw new SerializationError('messagesCount must be provided.');
        }
        $writer->addChar($data->messagesCount);

        if ($data->messages === null)
        {
            throw new SerializationError('messages must be provided.');
        }
        if (strlen($data->messages) > 252)
        {
            throw new SerializationError("Expected length of messages to be 252 or less, got {strlen($data->messages)}.");
        }
        for ($i = 0; $i < $data->messagesCount; $i++)
        {
            TalkMessageRecord::serialize($writer, $data->messages[$i]);

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
            $data->npcId = $reader->getShort();
            $data->rate = $reader->getChar();
            $data->messagesCount = $reader->getChar();
            $data->messages = [];
            for ($i = 0; $i < $data->messagesCount; $i++)
            {
                $data->messages[] = TalkMessageRecord::deserialize($reader);
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
        return "TalkRecord(byteSize=' . $this->byteSize . '', npcId=' . $this->npcId . '', rate=' . $this->rate . '', messages=' . $this->messages . ')";
    }

}


