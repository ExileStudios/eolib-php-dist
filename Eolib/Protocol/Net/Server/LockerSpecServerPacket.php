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
 * Reply to trying to add an item to a full locker
 */


class LockerSpecServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $lockerMaxItems;

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
    public function getLockerMaxItems(): int
    {
        return $this->lockerMaxItems;
    }

    /** @param int $lockerMaxItems */
    public function setLockerMaxItems(int $lockerMaxItems): void
    {
        $this->lockerMaxItems = $lockerMaxItems;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::LOCKER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::SPEC;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerSpecServerPacket $data): void {
        if ($data->getLockerMaxItems() == null)
        {
            throw new SerializationError('lockerMaxItems must be provided.');
        }
        $writer->addChar($data->getLockerMaxItems());


    }

    /**
     * Deserializes an instance of `LockerSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerSpecServerPacket
    {
        $data = new LockerSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setLockerMaxItems($reader->getChar());

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
        return "LockerSpecServerPacket(byteSize=$this->byteSize, lockerMaxItems=".var_export($this->lockerMaxItems, true).")";
    }

}



