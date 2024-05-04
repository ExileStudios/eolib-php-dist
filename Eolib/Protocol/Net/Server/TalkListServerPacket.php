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
use Eolib\Protocol\Net\Server\GlobalBackfillMessage;
use Eolib\Protocol\SerializationError;

/**
 * 
 * Global chat backfill.
 * Sent by the official game server when a player opens the global chat tab.
 * 
 */


class TalkListServerPacket
{
    private int $byteSize = 0;
    /** @var GlobalBackfillMessage[] */
    public array $messages = [];

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

    /** @return GlobalBackfillMessage[] */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /** @param GlobalBackfillMessage[] $messages */
    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
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
        return PacketAction::LIST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TalkListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TalkListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkListServerPacket $data): void {
        if ($data->getMessages() == null)
        {
            throw new SerializationError('messages must be provided.');
        }
        for ($i = 0; $i < count($data->messages); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            GlobalBackfillMessage::serialize($writer, $data->getMessages()[$i]);

        }

    }

    /**
     * Deserializes an instance of `TalkListServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkListServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkListServerPacket
    {
        $data = new TalkListServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->messages = [];
            while ($reader->getRemaining() > 0)
            {
                $data->messages[] = GlobalBackfillMessage::deserialize($reader);
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
        return "TalkListServerPacket(byteSize=$this->byteSize, messages=".var_export($this->messages, true).")";
    }

}



