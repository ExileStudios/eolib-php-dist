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
use Eolib\Protocol\SerializationError;

/**
 * Receive item (from quest)
 */


class ItemObtainServerPacket
{
    private int $byteSize = 0;
    /** @var ThreeItem */
    private ThreeItem $item;
    /** @var int */
    private int $currentWeight;

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
    public function getItem(): ThreeItem
    {
        return $this->item;
    }

    /** @param ThreeItem $item */
    public function setItem(ThreeItem $item): void
    {
        $this->item = $item;
    }



    /** @return int */
    public function getCurrentWeight(): int
    {
        return $this->currentWeight;
    }

    /** @param int $currentWeight */
    public function setCurrentWeight(int $currentWeight): void
    {
        $this->currentWeight = $currentWeight;
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
        return PacketAction::OBTAIN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemObtainServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemObtainServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemObtainServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemObtainServerPacket $data): void {
        if ($data->getItem() == null)
        {
            throw new SerializationError('item must be provided.');
        }
        ThreeItem::serialize($writer, $data->getItem());

        if ($data->getCurrentWeight() == null)
        {
            throw new SerializationError('currentWeight must be provided.');
        }
        $writer->addChar($data->getCurrentWeight());


    }

    /**
     * Deserializes an instance of `ItemObtainServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemObtainServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemObtainServerPacket
    {
        $data = new ItemObtainServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItem(ThreeItem::deserialize($reader));
            $data->setCurrentWeight($reader->getChar());

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
        return "ItemObtainServerPacket(byteSize=$this->byteSize, item=".var_export($this->item, true).", currentWeight=".var_export($this->currentWeight, true).")";
    }

}



