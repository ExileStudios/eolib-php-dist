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
 * Subscribing to a town
 */


class CitizenReplyClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $behaviorId;
    /** @var string[] */
    public array $answers = [];

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
    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    /** @param int $behaviorId */
    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }



    /** @return string[] */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /** @param string[] $answers */
    public function setAnswers(array $answers): void
    {
        $this->answers = $answers;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CITIZEN;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        $writer->addByte(0xFF);
        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->getBehaviorId());

        $writer->addByte(0xFF);
        if ($data->getAnswers() == null)
        {
            throw new SerializationError('answers must be provided.');
        }
        if (count($data->answers) != 3)
        {
            throw new SerializationError("Expected length of answers to be exactly 3, got " . count($data->answers) . ".");
        }
        for ($i = 0; $i < 3; $i++)
        {
            $writer->addString($data->getAnswers()[$i]);

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
            $data->setSessionId($reader->getShort());
            $reader->nextChunk();
            $data->setBehaviorId($reader->getShort());
            $reader->nextChunk();
            $data->answers = [];
            for ($i = 0; $i < 3; $i++)
            {
                $data->answers[] = $reader->getString();
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
        return "CitizenReplyClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", behaviorId=".var_export($this->behaviorId, true).", answers=".var_export($this->answers, true).")";
    }

}



