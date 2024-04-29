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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Opening a bank locker
 */


class LockerOpenClientPacket
{
    private $byteSize = 0;
    private Coords $lockerCoords;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getLockerCoords(): Coords
    {
        return $this->lockerCoords;
    }

    public function setLockerCoords(Coords $lockerCoords): void
    {
        $this->lockerCoords = $lockerCoords;
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerOpenClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerOpenClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerOpenClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerOpenClientPacket $data): void {
        if ($data->lockerCoords === null)
        {
            throw new SerializationError('lockerCoords must be provided.');
        }
        Coords::serialize($writer, $data->lockerCoords);


    }

    /**
     * Deserializes an instance of `LockerOpenClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerOpenClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerOpenClientPacket
    {
        $data = new LockerOpenClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->lockerCoords = Coords::deserialize($reader);

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
        return "LockerOpenClientPacket(byteSize=' . $this->byteSize . '', lockerCoords=' . $this->lockerCoords . ')";
    }

}



