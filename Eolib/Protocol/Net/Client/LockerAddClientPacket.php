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
use Eolib\Protocol\Coords;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Adding an item to a bank locker
 */


class LockerAddClientPacket
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $lockerCoords;
    /** @var ThreeItem */
    private ThreeItem $depositItem;

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

    /** @return Coords */
    public function getLockerCoords(): Coords
    {
        return $this->lockerCoords;
    }

    /** @param Coords $lockerCoords */
    public function setLockerCoords(Coords $lockerCoords): void
    {
        $this->lockerCoords = $lockerCoords;
    }



    /** @return ThreeItem */
    public function getDepositItem(): ThreeItem
    {
        return $this->depositItem;
    }

    /** @param ThreeItem $depositItem */
    public function setDepositItem(ThreeItem $depositItem): void
    {
        $this->depositItem = $depositItem;
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
        if ($data->getLockerCoords() == null)
        {
            throw new SerializationError('lockerCoords must be provided.');
        }
        Coords::serialize($writer, $data->getLockerCoords());

        if ($data->getDepositItem() == null)
        {
            throw new SerializationError('depositItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getDepositItem());


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
            $data->setLockerCoords(Coords::deserialize($reader));
            $data->setDepositItem(ThreeItem::deserialize($reader));

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
        return "LockerAddClientPacket(byteSize=$this->byteSize, lockerCoords=".var_export($this->lockerCoords, true).", depositItem=".var_export($this->depositItem, true).")";
    }

}



