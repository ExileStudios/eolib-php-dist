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
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Response to adding an item to a bank locker
 */


class LockerReplyServerPacket
{
    private int $byteSize = 0;
    /** @var Item */
    private Item $depositedItem;
    /** @var Weight */
    private Weight $weight;
    /** @var ThreeItem[] */
    public array $lockerItems = [];

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

    /** @return Item */
    public function getDepositedItem(): Item
    {
        return $this->depositedItem;
    }

    /** @param Item $depositedItem */
    public function setDepositedItem(Item $depositedItem): void
    {
        $this->depositedItem = $depositedItem;
    }



    /** @return Weight */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /** @param Weight $weight */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }



    /** @return ThreeItem[] */
    public function getLockerItems(): array
    {
        return $this->lockerItems;
    }

    /** @param ThreeItem[] $lockerItems */
    public function setLockerItems(array $lockerItems): void
    {
        $this->lockerItems = $lockerItems;
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
        if ($data->getDepositedItem() == null)
        {
            throw new SerializationError('depositedItem must be provided.');
        }
        Item::serialize($writer, $data->getDepositedItem());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());

        if ($data->getLockerItems() == null)
        {
            throw new SerializationError('lockerItems must be provided.');
        }
        for ($i = 0; $i < count($data->lockerItems); $i++)
        {
            ThreeItem::serialize($writer, $data->getLockerItems()[$i]);

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
            $data->setDepositedItem(Item::deserialize($reader));
            $data->setWeight(Weight::deserialize($reader));
            $lockerItems_length = (int) $reader->getRemaining() / 5;
            $data->lockerItems = [];
            for ($i = 0; $i < $lockerItems_length; $i++)
            {
                $data->lockerItems[] = ThreeItem::deserialize($reader);
            }

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
        return "LockerReplyServerPacket(byteSize=$this->byteSize, depositedItem=".var_export($this->depositedItem, true).", weight=".var_export($this->weight, true).", lockerItems=".var_export($this->lockerItems, true).")";
    }

}



