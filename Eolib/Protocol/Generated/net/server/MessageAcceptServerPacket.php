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
use Eolib\Protocol\SerializationError;

/**
 * Large message box
 */


class MessageAcceptServerPacket
{
    private $byteSize = 0;
    private array $messages = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MESSAGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        MessageAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `MessageAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MessageAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MessageAcceptServerPacket $data): void {
        if ($data->messages === null)
        {
            throw new SerializationError('messages must be provided.');
        }
        if (strlen($data->messages) != 4)
        {
            throw new SerializationError("Expected length of messages to be exactly 4, got {strlen($data->messages)}.");
        }
        for ($i = 0; $i < 4; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->messages[$i]);

        }

    }

    /**
     * Deserializes an instance of `MessageAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MessageAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): MessageAcceptServerPacket
    {
        $data = new MessageAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->messages = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->messages[] = $reader->getString();
                if ($i + 1 < 4)
                {
                    $reader->nextChunk();
                }
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
        return "MessageAcceptServerPacket(byteSize=' . $this->byteSize . '', messages=' . $this->messages . ')";
    }

}



