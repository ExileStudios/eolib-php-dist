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
use Eolib\Protocol\SerializationError;


class NpcUpdateChat
{
    private $byteSize = 0;
    private int $npcIndex;
    private int $messageLength;
    private string $message = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
        $this->messageLength = strlen($this->message);
    }


    /**
     * Serializes an instance of `NpcUpdateChat` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcUpdateChat $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcUpdateChat $data): void {
        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addChar($data->npcIndex);

        if ($data->messageLength === null)
        {
            throw new SerializationError('messageLength must be provided.');
        }
        $writer->addChar($data->messageLength);

        if ($data->message === null)
        {
            throw new SerializationError('message must be provided.');
        }
        if (strlen($data->message) > 252)
        {
            throw new SerializationError("Expected length of message to be 252 or less, got {strlen($data->message)}.");
        }
        $writer->addFixedString($data->message, $data->messageLength, false);


    }

    /**
     * Deserializes an instance of `NpcUpdateChat` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcUpdateChat The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcUpdateChat
    {
        $data = new NpcUpdateChat();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->npcIndex = $reader->getChar();
            $data->messageLength = $reader->getChar();
            $data->message = $reader->getFixedString($data->messageLength, false);

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
        return "NpcUpdateChat(byteSize=' . $this->byteSize . '', npcIndex=' . $this->npcIndex . '', message=' . $this->message . ')";
    }

}


