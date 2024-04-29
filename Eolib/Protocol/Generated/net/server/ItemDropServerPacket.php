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
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to dropping items on the ground
 */


class ItemDropServerPacket
{
    private $byteSize = 0;
    private ThreeItem $droppedItem;
    private int $remainingAmount;
    private int $itemIndex;
    private Coords $coords;
    private Weight $weight;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDroppedItem(): ThreeItem
    {
        return $this->droppedItem;
    }

    public function setDroppedItem(ThreeItem $droppedItem): void
    {
        $this->droppedItem = $droppedItem;
    }

    public function getRemainingAmount(): int
    {
        return $this->remainingAmount;
    }

    public function setRemainingAmount(int $remainingAmount): void
    {
        $this->remainingAmount = $remainingAmount;
    }

    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->droppedItem === null)
        {
            throw new SerializationError('droppedItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->droppedItem);

        if ($data->remainingAmount === null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addInt($data->remainingAmount);

        if ($data->itemIndex === null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->itemIndex);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);


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
            $data->droppedItem = ThreeItem::deserialize($reader);
            $data->remainingAmount = $reader->getInt();
            $data->itemIndex = $reader->getShort();
            $data->coords = Coords::deserialize($reader);
            $data->weight = Weight::deserialize($reader);

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
        return "ItemDropServerPacket(byteSize=' . $this->byteSize . '', droppedItem=' . $this->droppedItem . '', remainingAmount=' . $this->remainingAmount . '', itemIndex=' . $this->itemIndex . '', coords=' . $this->coords . '', weight=' . $this->weight . ')";
    }

}



