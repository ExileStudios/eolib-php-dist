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

/**
 * Show flood protection message (vestigial)
 */


class SpellErrorServerPacket
{
    private int $byteSize = 0;

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

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SPELL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ERROR;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellErrorServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellErrorServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellErrorServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellErrorServerPacket $data): void {
        $old_writer_length = $writer->getLength();
        if ($writer->getLength() === $old_writer_length)
        {
            $writer->addByte(255);

        }

    }

    /**
     * Deserializes an instance of `SpellErrorServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellErrorServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellErrorServerPacket
    {
        $data = new SpellErrorServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            if ($reader->getPosition() === $reader_start_position)
            {
                $reader->getByte();
            }

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
        return "SpellErrorServerPacket(byteSize=$this->byteSize)";
    }

}


