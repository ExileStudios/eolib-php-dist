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
use Eolib\Protocol\Net\Server\AdminMessageType;
use Eolib\Protocol\SerializationError;

/**
 * Incoming admin message
 */


class AdminInteractReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $messageType;
    private ?MessageTypeData $messageTypeData = null;

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
    public function getMessageType(): int
    {
        return $this->messageType;
    }

    /** @param int $messageType */
    public function setMessageType(int $messageType): void
    {
        $this->messageType = $messageType;
    }



    public function getMessageTypeData(): ?MessageTypeData
    {
        /**
         * AdminInteractReplyServerPacket::MessageTypeData: Gets or sets the data associated with the `messageType` field.
         */
        return $this->messageTypeData;
    }

    public function setMessageTypeData(?MessageTypeData $messageTypeData): void
    {
        $this->messageTypeData = $messageTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
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
        AdminInteractReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AdminInteractReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AdminInteractReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AdminInteractReplyServerPacket $data): void {
        if ($data->getMessageType() == null)
        {
            throw new SerializationError('messageType must be provided.');
        }
        $writer->addChar((int) $data->getMessageType());

        $writer->addByte(0xFF);
        if ($data->messageType === AdminMessageType::MESSAGE)
        {
            if (!($data->messageTypeData instanceof MessageTypeDataMessage))
            {
                throw new \Eolib\Protocol\SerializationError("Expected messageTypeData to be of type MessageTypeDataMessage for messageType " . $data->messageType . ".");
            }
            MessageTypeDataMessage::serialize($writer, $data->getMessageTypeData());
        }
        elseif ($data->messageType === AdminMessageType::REPORT)
        {
            if (!($data->messageTypeData instanceof MessageTypeDataReport))
            {
                throw new \Eolib\Protocol\SerializationError("Expected messageTypeData to be of type MessageTypeDataReport for messageType " . $data->messageType . ".");
            }
            MessageTypeDataReport::serialize($writer, $data->getMessageTypeData());
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
            $data->setMessageType($reader->getChar());
            $reader->nextChunk();
            if ($data->messageType === AdminMessageType::MESSAGE)
            {
                $data->setMessageTypeData(MessageTypeDataMessage::deserialize($reader));
            }
            elseif ($data->messageType === AdminMessageType::REPORT)
            {
                $data->setMessageTypeData(MessageTypeDataReport::deserialize($reader));
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
        return "AdminInteractReplyServerPacket(byteSize=$this->byteSize, messageType=".var_export($this->messageType, true).", messageTypeData=".var_export($this->messageTypeData, true).")";
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
     * Serializes an instance of `MessageTypeDataMessage` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MessageTypeDataMessage $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MessageTypeDataMessage $data): void {
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
            $data->setPlayerName($reader->getString());
            $reader->nextChunk();
            $data->setMessage($reader->getString());
            $reader->nextChunk();

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
        return "MessageTypeDataMessage(byteSize=$this->byteSize, playerName=$this->playerName, message=$this->message)";
    }

}



/**
 * Data associated with messageType value AdminMessageType::REPORT
 */

class MessageTypeDataReport implements MessageTypeData
{
    private int $byteSize = 0;
    /** @var string */
    private string $playerName = "";
    /** @var string */
    private string $message = "";
    /** @var string */
    private string $reporteeName = "";

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



    /** @return string */
    public function getReporteeName(): string
    {
        return $this->reporteeName;
    }

    /** @param string $reporteeName */
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

        $writer->addByte(0xFF);
        if ($data->getReporteeName() == null)
        {
            throw new SerializationError('reporteeName must be provided.');
        }
        $writer->addString($data->getReporteeName());

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
            $data->setPlayerName($reader->getString());
            $reader->nextChunk();
            $data->setMessage($reader->getString());
            $reader->nextChunk();
            $data->setReporteeName($reader->getString());
            $reader->nextChunk();

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
        return "MessageTypeDataReport(byteSize=$this->byteSize, playerName=$this->playerName, message=$this->message, reporteeName=$this->reporteeName)";
    }

}





