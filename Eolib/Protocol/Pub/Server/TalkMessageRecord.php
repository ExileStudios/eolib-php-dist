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
use Eolib\Protocol\SerializationError;


class TalkMessageRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $messageLength;
    /** @var string */
    private string $message = "";

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

    /** @return string */
    public function getMessage(): string
    {
        return $this->message;
    }

    /** @param string $message */
    public function setMessage(string $message): void
    {
        $this->message = $message;
        $this->messageLength = mb_strlen($this->message);
    }

    /** @return int */
    public function getMessageLength(): int
    {
        return $this->messageLength;
    }

    /** @param int $messageLength */
    public function setMessageLength(int $messageLength): void
    {
        $this->messageLength = $messageLength;
    }


    /**
     * Serializes an instance of `TalkMessageRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkMessageRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkMessageRecord $data): void {
        if ($data->getMessageLength() == null)
        {
            throw new SerializationError('messageLength must be provided.');
        }
        $writer->addChar($data->getMessageLength());

        if ($data->getMessage() == null)
        {
            throw new SerializationError('message must be provided.');
        }
        if (strlen($data->message) > 252)
        {
            throw new SerializationError("Expected length of message to be 252 or less, got " . strlen($data->message) . ".");
        }
        $writer->addFixedString($data->getMessage(), $data->getMessageLength(), false);


    }

    /**
     * Deserializes an instance of `TalkMessageRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkMessageRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkMessageRecord
    {
        $data = new TalkMessageRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMessageLength($reader->getChar());
            $data->setMessage($reader->getFixedString($data->getMessageLength(), false));

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
        return "TalkMessageRecord(byteSize=$this->byteSize, message=".var_export($this->message, true).")";
    }

}


