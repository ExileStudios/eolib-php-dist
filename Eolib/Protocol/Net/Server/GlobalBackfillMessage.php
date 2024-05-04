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
use Eolib\Protocol\SerializationError;


class GlobalBackfillMessage
{
    private int $byteSize = 0;
    /** @var string */
    private string $playerName = "";
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
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /** @param string $playerName */
    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
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
    }




    /**
     * Serializes an instance of `GlobalBackfillMessage` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GlobalBackfillMessage $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GlobalBackfillMessage $data): void {
        if ($data->getPlayerName() == null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->getPlayerName());

        $writer->addByte(0xFF);
        if ($data->getMessage() == null)
        {
            throw new SerializationError('message must be provided.');
        }
        $writer->addString($data->getMessage());


    }

    /**
     * Deserializes an instance of `GlobalBackfillMessage` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GlobalBackfillMessage The deserialized data.
     */
    public static function deserialize(EoReader $reader): GlobalBackfillMessage
    {
        $data = new GlobalBackfillMessage();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPlayerName($reader->getString());
            $reader->nextChunk();
            $data->setMessage($reader->getString());
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
        return "GlobalBackfillMessage(byteSize=$this->byteSize, playerName=$this->playerName, message=$this->message)";
    }

}

