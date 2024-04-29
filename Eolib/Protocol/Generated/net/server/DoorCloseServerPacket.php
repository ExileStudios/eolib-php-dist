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
 * Reply to trying to open a locked door
 */


class DoorCloseServerPacket
{
    private $byteSize = 0;
    private int $key;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int $key): void
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
        return PacketFamily::DOOR;
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
        DoorCloseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `DoorCloseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DoorCloseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DoorCloseServerPacket $data): void {
        if ($data->key === null)
        {
            throw new SerializationError('key must be provided.');
        }
        $writer->addChar($data->key);


    }

    /**
     * Deserializes an instance of `DoorCloseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DoorCloseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): DoorCloseServerPacket
    {
        $data = new DoorCloseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->key = $reader->getChar();

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
        return "DoorCloseServerPacket(byteSize=' . $this->byteSize . '', key=' . $this->key . ')";
    }

}



