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
 * Reply to taking items from the ground
 */


class ItemGetServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $takenItemIndex;
    /** @var ThreeItem */
    private ThreeItem $takenItem;
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

    /** @return int */
    public function getTakenItemIndex(): int
    {
        return $this->takenItemIndex;
    }

    /** @param int $takenItemIndex */
    public function setTakenItemIndex(int $takenItemIndex): void
    {
        $this->takenItemIndex = $takenItemIndex;
    }



    /** @return ThreeItem */
    public function getTakenItem(): ThreeItem
    {
        return $this->takenItem;
    }

    /** @param ThreeItem $takenItem */
    public function setTakenItem(ThreeItem $takenItem): void
    {
        $this->takenItem = $takenItem;
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
        return PacketAction::GET;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemGetServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemGetServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemGetServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemGetServerPacket $data): void {
        if ($data->getTakenItemIndex() == null)
        {
            throw new SerializationError('takenItemIndex must be provided.');
        }
        $writer->addShort($data->getTakenItemIndex());

        if ($data->getTakenItem() == null)
        {
            throw new SerializationError('takenItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getTakenItem());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());


    }

    /**
     * Deserializes an instance of `ItemGetServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemGetServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemGetServerPacket
    {
        $data = new ItemGetServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setTakenItemIndex($reader->getShort());
            $data->setTakenItem(ThreeItem::deserialize($reader));
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
        return "ItemGetServerPacket(byteSize=$this->byteSize, takenItemIndex=".var_export($this->takenItemIndex, true).", takenItem=".var_export($this->takenItem, true).", weight=".var_export($this->weight, true).")";
    }

}



