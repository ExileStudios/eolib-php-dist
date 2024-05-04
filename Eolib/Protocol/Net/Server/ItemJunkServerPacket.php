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
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to junking items
 */


class ItemJunkServerPacket
{
    private int $byteSize = 0;
    /** @var ThreeItem */
    private ThreeItem $junkedItem;
    /** @var int */
    private int $remainingAmount;
    /** @var Weight */
    private Weight $weight;

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

    /** @return ThreeItem */
    public function getJunkedItem(): ThreeItem
    {
        return $this->junkedItem;
    }

    /** @param ThreeItem $junkedItem */
    public function setJunkedItem(ThreeItem $junkedItem): void
    {
        $this->junkedItem = $junkedItem;
    }



    /** @return int */
    public function getRemainingAmount(): int
    {
        return $this->remainingAmount;
    }

    /** @param int $remainingAmount */
    public function setRemainingAmount(int $remainingAmount): void
    {
        $this->remainingAmount = $remainingAmount;
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



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::JUNK;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemJunkServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemJunkServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemJunkServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemJunkServerPacket $data): void {
        if ($data->getJunkedItem() == null)
        {
            throw new SerializationError('junkedItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getJunkedItem());

        if ($data->getRemainingAmount() == null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addInt($data->getRemainingAmount());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());


    }

    /**
     * Deserializes an instance of `ItemJunkServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemJunkServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemJunkServerPacket
    {
        $data = new ItemJunkServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setJunkedItem(ThreeItem::deserialize($reader));
            $data->setRemainingAmount($reader->getInt());
            $data->setWeight(Weight::deserialize($reader));

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
        return "ItemJunkServerPacket(byteSize=$this->byteSize, junkedItem=".var_export($this->junkedItem, true).", remainingAmount=".var_export($this->remainingAmount, true).", weight=".var_export($this->weight, true).")";
    }

}



