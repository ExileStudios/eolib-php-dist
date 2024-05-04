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
use Eolib\Protocol\SerializationError;

/**
 * Reply to trying to open a locked door
 */


class DoorCloseServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $key;

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
    public function getKey(): int
    {
        return $this->key;
    }

    /** @param int $key */
    public function setKey(int $key): void
    {
        $this->key = $key;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::DOOR;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getKey() == null)
        {
            throw new SerializationError('key must be provided.');
        }
        $writer->addChar($data->getKey());


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
            $data->setKey($reader->getChar());

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
        return "DoorCloseServerPacket(byteSize=$this->byteSize, key=".var_export($this->key, true).")";
    }

}



