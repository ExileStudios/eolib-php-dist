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
use Eolib\Protocol\Generated\Net\client\MarriageRequestType;
use Eolib\Protocol\SerializationError;

/**
 * Requesting marriage approval
 */


class MarriageRequestClientPacket
{
    private $byteSize = 0;
    private int $requestType;
    private int $sessionId;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRequestType(): int
    {
        return $this->requestType;
    }

    public function setRequestType(int $requestType): void
    {
        $this->requestType = $requestType;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MARRIAGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->requestType === null)
        {
            throw new SerializationError('requestType must be provided.');
        }
        $writer->addChar((int) $data->requestType);

        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        $writer->addByte(0xFF);
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


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
            $data->requestType = MarriageRequestType($reader->getChar());
            $data->sessionId = $reader->getInt();
            $reader->nextChunk();
            $data->name = $reader->getString();
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
        return "MarriageRequestClientPacket(byteSize=' . $this->byteSize . '', requestType=' . $this->requestType . '', sessionId=' . $this->sessionId . '', name=' . $this->name . ')";
    }

}



