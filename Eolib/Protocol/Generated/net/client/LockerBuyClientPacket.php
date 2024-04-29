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

/**
 * Buying a locker space upgrade from a banker NPC
 */


class LockerBuyClientPacket
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
        return PacketFamily::LOCKER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::BUY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerBuyClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerBuyClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerBuyClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerBuyClientPacket $data): void {
        $old_writer_length = $writer->getLength();
        if ($writer->getLength() === $old_writer_length)
        {
            $writer->addChar(1);

        }

    }

    /**
     * Deserializes an instance of `LockerBuyClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerBuyClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerBuyClientPacket
    {
        $data = new LockerBuyClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            if ($reader->getPosition() === $reader_start_position)
            {
                $reader->getChar();
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
        return "LockerBuyClientPacket(byteSize=' . $this->byteSize . ')";
    }

}



