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
use typing\cast;

/**
 * 
 * Reply to trying to interact with a locked or &quot;broken&quot; chest.
 * The official client assumes a broken chest if the packet is under 2 bytes in length.
 * 
 */


class ChestCloseServerPacket
{
    private $byteSize = 0;
    private ?int $key;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function setKey(?int $key): void
    {
        $this->key = $key;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::CLOSE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestCloseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestCloseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestCloseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestCloseServerPacket $data): void {
        $old_writer_length = $writer->getLength();
        $reachedMissingOptional = $data->key === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->key);

        }
        if ($writer->getLength() === $old_writer_length)
        {
            $writer->addString('N');

        }

    }

    /**
     * Deserializes an instance of `ChestCloseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestCloseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestCloseServerPacket
    {
        $data = new ChestCloseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            if ($reader->remaining() > 0)
            {
                $data->key = $reader->getShort();
            }
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
        return "ChestCloseServerPacket(byteSize=' . $this->byteSize . '', key=' . $this->key . ')";
    }

}



