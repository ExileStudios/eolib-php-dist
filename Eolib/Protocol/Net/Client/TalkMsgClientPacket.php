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
 * Global chat message
 */


class TalkMsgClientPacket
{
    private int $byteSize = 0;
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
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TALK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::MSG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TalkMsgClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TalkMsgClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkMsgClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkMsgClientPacket $data): void {
        if ($data->getMessage() == null)
        {
            throw new SerializationError('message must be provided.');
        }
        $writer->addString($data->getMessage());


    }

    /**
     * Deserializes an instance of `TalkMsgClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkMsgClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkMsgClientPacket
    {
        $data = new TalkMsgClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMessage($reader->getString());

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
        return "TalkMsgClientPacket(byteSize=$this->byteSize, message=$this->message)";
    }

}


