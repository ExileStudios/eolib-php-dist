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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Opening a bank locker
 */


class LockerOpenServerPacket
{
    private $byteSize = 0;
    private Coords $lockerCoords;
    private array $lockerItems;

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

    public function getLockerItems(): array
    {
        return $this->lockerItems;
    }

    public function setLockerItems(array $lockerItems): void
    {
        $this->lockerItems = $lockerItems;
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
        LockerOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerOpenServerPacket $data): void {
        if ($data->lockerCoords === null)
        {
            throw new SerializationError('lockerCoords must be provided.');
        }
        Coords::serialize($writer, $data->lockerCoords);

        if ($data->lockerItems === null)
        {
            throw new SerializationError('lockerItems must be provided.');
        }
        for ($i = 0; $i < count($data->lockerItems); $i++)
        {
            ThreeItem::serialize($writer, $data->lockerItems[$i]);

        }

    }

    /**
     * Deserializes an instance of `LockerOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerOpenServerPacket
    {
        $data = new LockerOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->lockerCoords = Coords::deserialize($reader);
            $lockerItems_length = (int) $reader->remaining() / 5;
            $data->lockerItems = [];
            for ($i = 0; $i < $lockerItems_length; $i++)
            {
                $data->lockerItems[] = ThreeItem::deserialize($reader);
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
        return "LockerOpenServerPacket(byteSize=' . $this->byteSize . '', lockerCoords=' . $this->lockerCoords . '', lockerItems=' . $this->lockerItems . ')";
    }

}



