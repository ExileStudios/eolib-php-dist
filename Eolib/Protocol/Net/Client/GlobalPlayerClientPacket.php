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

/**
 * Disable whispers
 */


class GlobalPlayerClientPacket
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
        return PacketFamily::GLOBAL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GlobalPlayerClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GlobalPlayerClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GlobalPlayerClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GlobalPlayerClientPacket $data): void {
        $old_writer_length = $writer->getLength();
        if ($writer->getLength() === $old_writer_length)
        {
            $writer->addString('y');

        }

    }

    /**
     * Deserializes an instance of `GlobalPlayerClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GlobalPlayerClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GlobalPlayerClientPacket
    {
        $data = new GlobalPlayerClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            if ($reader->getPosition() === $reader_start_position)
            {
                $reader->getString();
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
        return "GlobalPlayerClientPacket(byteSize=$this->byteSize)";
    }

}



