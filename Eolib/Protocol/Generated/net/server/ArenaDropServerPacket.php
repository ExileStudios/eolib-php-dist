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

/**
 * &quot;Arena is blocked&quot; message
 */


class ArenaDropServerPacket
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ARENA;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::DROP;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ArenaDropServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ArenaDropServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ArenaDropServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ArenaDropServerPacket $data): void {
        $old_writer_length = $writer->getLength();
        if ($writer->getLength() === $old_writer_length)
        {
            $writer->addString('N');

        }

    }

    /**
     * Deserializes an instance of `ArenaDropServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ArenaDropServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ArenaDropServerPacket
    {
        $data = new ArenaDropServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            if ($reader->getPosition() === $reader_start_position)
            {
                $reader->getString();
            }

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
        return "ArenaDropServerPacket(byteSize=' . $this->byteSize . ')";
    }

}



