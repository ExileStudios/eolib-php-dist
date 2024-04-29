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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\server\AdminMessageType;
use Eolib\Protocol\SerializationError;

/**
 * Incoming admin message
 */


class AdminInteractReplyServerPacket
{
    private $byteSize = 0;
    private int $messageType;
    private ?messageTypeData $messageTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMessageType(): int
    {
        return $this->messageType;
    }

    public function setMessageType(int $messageType): void
    {
        $this->messageType = $messageType;
    }

    public function messageTypeData(): ?messageTypeData
    {
        /**
         * AdminInteractReplyServerPacket::MessageTypeData: Gets or sets the data associated with the `messageType` field.
         */
        return $this->messageTypeData;
    }

    public function setMessageTypeData($messageTypeData): void
    {
        $this->messageTypeData = $messageTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
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
        AdminInteractReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AdminInteractReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AdminInteractReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AdminInteractReplyServerPacket $data): void {
        if ($data->messageType === null)
        {
            throw new SerializationError('messageType must be provided.');
        }
        $writer->addChar((int) $data->messageType);

        $writer->addByte(0xFF);
        if ($data->messageType === AdminMessageType::MESSAGE)
        {
            if (!($data->messageTypeData instanceof MessageTypeDataMessage))
            {
                throw new \Eolib\Protocol\SerializationError("Expected messageTypeData to be of type MessageTypeDataMessage for messageType " . AdminMessageType($data->messageType)->name . ".");
            }
            MessageTypeDataMessage::serialize($writer, $data->messageTypeData);
        }
        elseif ($data->messageType === AdminMessageType::REPORT)
        {
            if (!($data->messageTypeData instanceof MessageTypeDataReport))
            {
                throw new \Eolib\Protocol\SerializationError("Expected messageTypeData to be of type MessageTypeDataReport for messageType " . AdminMessageType($data->messageType)->name . ".");
            }
            MessageTypeDataReport::serialize($writer, $data->messageTypeData);
        }

    }

    /**
     * Deserializes an instance of `AdminInteractReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AdminInteractReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AdminInteractReplyServerPacket
    {
        $data = new AdminInteractReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->messageType = AdminMessageType($reader->getChar());
            $reader->nextChunk();
            if ($data->messageType === AdminMessageType::MESSAGE)
            {
                $data->messageTypeData = MessageTypeDataMessage::deserialize($reader);
            }
            elseif ($data->messageType === AdminMessageType::REPORT)
            {
                $data->messageTypeData = MessageTypeDataReport::deserialize($reader);
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
        return "AdminInteractReplyServerPacket(byteSize=' . $this->byteSize . '', messageType=' . $this->messageType . '', messageTypeData=' . $this->messageTypeData . ')";
    }

}

/**
 * Data associated with different values of the `messageType` field.
 */
interface MessageTypeData {}

/**
 * Data associated with messageType value AdminMessageType::MESSAGE
 */

class MessageTypeDataMessage implements MessageTypeData
{
    private $byteSize = 0;
    private string $playerName = "";
    private string $message = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }


    /**
     * Serializes an instance of `MessageTypeDataMessage` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MessageTypeDataMessage $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MessageTypeDataMessage $data): void {
        if ($data->playerName === null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->playerName);

        $writer->addByte(0xFF);
        if ($data->message === null)
        {
            throw new SerializationError('message must be provided.');
        }
        $writer->addString($data->message);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `MessageTypeDataMessage` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MessageTypeDataMessage The deserialized data.
     */
    public static function deserialize(EoReader $reader): MessageTypeDataMessage
    {
        $data = new MessageTypeDataMessage();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerName = $reader->getString();
            $reader->nextChunk();
            $data->message = $reader->getString();
            $reader->nextChunk();

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
        return "MessageTypeDataMessage(byteSize=' . $this->byteSize . '', playerName=' . $this->playerName . '', message=' . $this->message . ')";
    }

}



/**
 * Data associated with messageType value AdminMessageType::REPORT
 */

class MessageTypeDataReport implements MessageTypeData
{
    private $byteSize = 0;
    private string $playerName = "";
    private string $message = "";
    private string $reporteeName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getReporteeName(): string
    {
        return $this->reporteeName;
    }

    public function setReporteeName(string $reporteeName): void
    {
        $this->reporteeName = $reporteeName;
    }


    /**
     * Serializes an instance of `MessageTypeDataReport` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MessageTypeDataReport $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MessageTypeDataReport $data): void {
        if ($data->playerName === null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->playerName);

        $writer->addByte(0xFF);
        if ($data->message === null)
        {
            throw new SerializationError('message must be provided.');
        }
        $writer->addString($data->message);

        $writer->addByte(0xFF);
        if ($data->reporteeName === null)
        {
            throw new SerializationError('reporteeName must be provided.');
        }
        $writer->addString($data->reporteeName);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `MessageTypeDataReport` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MessageTypeDataReport The deserialized data.
     */
    public static function deserialize(EoReader $reader): MessageTypeDataReport
    {
        $data = new MessageTypeDataReport();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerName = $reader->getString();
            $reader->nextChunk();
            $data->message = $reader->getString();
            $reader->nextChunk();
            $data->reporteeName = $reader->getString();
            $reader->nextChunk();

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
        return "MessageTypeDataReport(byteSize=' . $this->byteSize . '', playerName=' . $this->playerName . '', message=' . $this->message . '', reporteeName=' . $this->reporteeName . ')";
    }

}





