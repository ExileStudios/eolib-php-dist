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
use Eolib\Protocol\SerializationError;

/**
 * Taking an item from a bank locker
 */


class LockerTakeClientPacket
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $lockerCoords;
    /** @var int */
    private int $takeItemId;

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



    /** @return int */
    public function getTakeItemId(): int
    {
        return $this->takeItemId;
    }

    /** @param int $takeItemId */
    public function setTakeItemId(int $takeItemId): void
    {
        $this->takeItemId = $takeItemId;
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
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerTakeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerTakeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerTakeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerTakeClientPacket $data): void {
        if ($data->getLockerCoords() == null)
        {
            throw new SerializationError('lockerCoords must be provided.');
        }
        Coords::serialize($writer, $data->getLockerCoords());

        if ($data->getTakeItemId() == null)
        {
            throw new SerializationError('takeItemId must be provided.');
        }
        $writer->addShort($data->getTakeItemId());


    }

    /**
     * Deserializes an instance of `LockerTakeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerTakeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerTakeClientPacket
    {
        $data = new LockerTakeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setLockerCoords(Coords::deserialize($reader));
            $data->setTakeItemId($reader->getShort());

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
        return "LockerTakeClientPacket(byteSize=$this->byteSize, lockerCoords=".var_export($this->lockerCoords, true).", takeItemId=".var_export($this->takeItemId, true).")";
    }

}



