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
use Eolib\Protocol\Coords;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to dropping items on the ground
 */


class ItemDropServerPacket
{
    private int $byteSize = 0;
    /** @var ThreeItem */
    private ThreeItem $droppedItem;
    /** @var int */
    private int $remainingAmount;
    /** @var int */
    private int $itemIndex;
    /** @var Coords */
    private Coords $coords;
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
    public function getDroppedItem(): ThreeItem
    {
        return $this->droppedItem;
    }

    /** @param ThreeItem $droppedItem */
    public function setDroppedItem(ThreeItem $droppedItem): void
    {
        $this->droppedItem = $droppedItem;
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



    /** @return int */
    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    /** @param int $itemIndex */
    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
    }



    /** @return Coords */
    public function getCoords(): Coords
    {
        return $this->coords;
    }

    /** @param Coords $coords */
    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
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
        return PacketAction::DROP;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemDropServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemDropServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemDropServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemDropServerPacket $data): void {
        if ($data->getDroppedItem() == null)
        {
            throw new SerializationError('droppedItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getDroppedItem());

        if ($data->getRemainingAmount() == null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addInt($data->getRemainingAmount());

        if ($data->getItemIndex() == null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->getItemIndex());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());


    }

    /**
     * Deserializes an instance of `ItemDropServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemDropServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemDropServerPacket
    {
        $data = new ItemDropServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setDroppedItem(ThreeItem::deserialize($reader));
            $data->setRemainingAmount($reader->getInt());
            $data->setItemIndex($reader->getShort());
            $data->setCoords(Coords::deserialize($reader));
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
        return "ItemDropServerPacket(byteSize=$this->byteSize, droppedItem=".var_export($this->droppedItem, true).", remainingAmount=".var_export($this->remainingAmount, true).", itemIndex=".var_export($this->itemIndex, true).", coords=".var_export($this->coords, true).", weight=".var_export($this->weight, true).")";
    }

}



