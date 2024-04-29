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
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Adding an item to a bank locker
 */


class LockerAddClientPacket
{
    private $byteSize = 0;
    private Coords $lockerCoords;
    private ThreeItem $depositItem;

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

    public function getDepositItem(): ThreeItem
    {
        return $this->depositItem;
    }

    public function setDepositItem(ThreeItem $depositItem): void
    {
        $this->depositItem = $depositItem;
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
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerAddClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerAddClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerAddClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerAddClientPacket $data): void {
        if ($data->lockerCoords === null)
        {
            throw new SerializationError('lockerCoords must be provided.');
        }
        Coords::serialize($writer, $data->lockerCoords);

        if ($data->depositItem === null)
        {
            throw new SerializationError('depositItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->depositItem);


    }

    /**
     * Deserializes an instance of `LockerAddClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerAddClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerAddClientPacket
    {
        $data = new LockerAddClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->lockerCoords = Coords::deserialize($reader);
            $data->depositItem = ThreeItem::deserialize($reader);

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
        return "LockerAddClientPacket(byteSize=' . $this->byteSize . '', lockerCoords=' . $this->lockerCoords . '', depositItem=' . $this->depositItem . ')";
    }

}



