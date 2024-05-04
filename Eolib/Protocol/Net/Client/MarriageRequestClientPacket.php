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
use Eolib\Protocol\Net\Client\MarriageRequestType;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Requesting marriage approval
 */


class MarriageRequestClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $requestType;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $name = "";

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
    public function getRequestType(): int
    {
        return $this->requestType;
    }

    /** @param int $requestType */
    public function setRequestType(int $requestType): void
    {
        $this->requestType = $requestType;
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



    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MARRIAGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        MarriageRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `MarriageRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MarriageRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MarriageRequestClientPacket $data): void {
        if ($data->getRequestType() == null)
        {
            throw new SerializationError('requestType must be provided.');
        }
        $writer->addChar((int) $data->getRequestType());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());

        $writer->addByte(0xFF);
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());


    }

    /**
     * Deserializes an instance of `MarriageRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MarriageRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): MarriageRequestClientPacket
    {
        $data = new MarriageRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setRequestType($reader->getChar());
            $data->setSessionId($reader->getInt());
            $reader->nextChunk();
            $data->setName($reader->getString());
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
        return "MarriageRequestClientPacket(byteSize=$this->byteSize, requestType=".var_export($this->requestType, true).", sessionId=".var_export($this->sessionId, true).", name=$this->name)";
    }

}



