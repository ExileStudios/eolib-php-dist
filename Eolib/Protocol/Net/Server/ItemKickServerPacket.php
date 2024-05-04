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
use Eolib\Protocol\SerializationError;

/**
 * Lose item (from quest)
 */


class ItemKickServerPacket
{
    private int $byteSize = 0;
    /** @var Item */
    private Item $item;
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

    /** @return Item */
    public function getItem(): Item
    {
        return $this->item;
    }

    /** @param Item $item */
    public function setItem(Item $item): void
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
        return PacketAction::KICK;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemKickServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemKickServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemKickServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemKickServerPacket $data): void {
        if ($data->getItem() == null)
        {
            throw new SerializationError('item must be provided.');
        }
        Item::serialize($writer, $data->getItem());

        if ($data->getCurrentWeight() == null)
        {
            throw new SerializationError('currentWeight must be provided.');
        }
        $writer->addChar($data->getCurrentWeight());


    }

    /**
     * Deserializes an instance of `ItemKickServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemKickServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemKickServerPacket
    {
        $data = new ItemKickServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItem(Item::deserialize($reader));
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
        return "ItemKickServerPacket(byteSize=$this->byteSize, item=".var_export($this->item, true).", currentWeight=".var_export($this->currentWeight, true).")";
    }

}



