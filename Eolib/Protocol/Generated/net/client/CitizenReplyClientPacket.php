<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Subscribing to a town
 */


class CitizenReplyClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $behaviorId;
    private array $answers = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): void
    {
        $this->answers = $answers;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CITIZEN;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        CitizenReplyClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CitizenReplyClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CitizenReplyClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CitizenReplyClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        $writer->addByte(0xFF);
        if ($data->behaviorId === null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->behaviorId);

        $writer->addByte(0xFF);
        if ($data->answers === null)
        {
            throw new SerializationError('answers must be provided.');
        }
        if (strlen($data->answers) != 3)
        {
            throw new SerializationError("Expected length of answers to be exactly 3, got {strlen($data->answers)}.");
        }
        for ($i = 0; $i < 3; $i++)
        {
            $writer->addString($data->answers[$i]);

            $writer->addByte(0xFF);
        }

    }

    /**
     * Deserializes an instance of `CitizenReplyClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CitizenReplyClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CitizenReplyClientPacket
    {
        $data = new CitizenReplyClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->sessionId = $reader->getShort();
            $reader->nextChunk();
            $data->behaviorId = $reader->getShort();
            $reader->nextChunk();
            $data->answers = [];
            for ($i = 0; $i < 3; $i++)
            {
                $data->answers[] = $reader->getString();
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
        return "CitizenReplyClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', behaviorId=' . $this->behaviorId . '', answers=' . $this->answers . ')";
    }

}



