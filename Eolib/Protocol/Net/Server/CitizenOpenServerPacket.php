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
use Eolib\Protocol\SerializationError;

/**
 * Response from talking to a citizenship NPC
 */


class CitizenOpenServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $currentHomeId;
    /** @var int */
    private int $sessionId;
    /** @var string[] */
    public array $questions = [];

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
    public function getCurrentHomeId(): int
    {
        return $this->currentHomeId;
    }

    /** @param int $currentHomeId */
    public function setCurrentHomeId(int $currentHomeId): void
    {
        $this->currentHomeId = $currentHomeId;
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



    /** @return string[] */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /** @param string[] $questions */
    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        CitizenOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CitizenOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CitizenOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CitizenOpenServerPacket $data): void {
        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addThree($data->getBehaviorId());

        if ($data->getCurrentHomeId() == null)
        {
            throw new SerializationError('currentHomeId must be provided.');
        }
        $writer->addChar($data->getCurrentHomeId());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        $writer->addByte(0xFF);
        if ($data->getQuestions() == null)
        {
            throw new SerializationError('questions must be provided.');
        }
        if (count($data->questions) != 3)
        {
            throw new SerializationError("Expected length of questions to be exactly 3, got " . count($data->questions) . ".");
        }
        for ($i = 0; $i < 3; $i++)
        {
            $writer->addString($data->getQuestions()[$i]);

            $writer->addByte(0xFF);
        }

    }

    /**
     * Deserializes an instance of `CitizenOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CitizenOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CitizenOpenServerPacket
    {
        $data = new CitizenOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setBehaviorId($reader->getThree());
            $data->setCurrentHomeId($reader->getChar());
            $data->setSessionId($reader->getShort());
            $reader->nextChunk();
            $data->questions = [];
            for ($i = 0; $i < 3; $i++)
            {
                $data->questions[] = $reader->getString();
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
        return "CitizenOpenServerPacket(byteSize=$this->byteSize, behaviorId=".var_export($this->behaviorId, true).", currentHomeId=".var_export($this->currentHomeId, true).", sessionId=".var_export($this->sessionId, true).", questions=".var_export($this->questions, true).")";
    }

}



