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
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Response to adding an item to a bank locker
 */


class LockerReplyServerPacket
{
    private $byteSize = 0;
    private Item $depositedItem;
    private Weight $weight;
    private array $lockerItems;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDepositedItem(): Item
    {
        return $this->depositedItem;
    }

    public function setDepositedItem(Item $depositedItem): void
    {
        $this->depositedItem = $depositedItem;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerReplyServerPacket $data): void {
        if ($data->depositedItem === null)
        {
            throw new SerializationError('depositedItem must be provided.');
        }
        Item::serialize($writer, $data->depositedItem);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);

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
     * Deserializes an instance of `LockerReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerReplyServerPacket
    {
        $data = new LockerReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->depositedItem = Item::deserialize($reader);
            $data->weight = Weight::deserialize($reader);
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
        return "LockerReplyServerPacket(byteSize=' . $this->byteSize . '', depositedItem=' . $this->depositedItem . '', weight=' . $this->weight . '', lockerItems=' . $this->lockerItems . ')";
    }

}



