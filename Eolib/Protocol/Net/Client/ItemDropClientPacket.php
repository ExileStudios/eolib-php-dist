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
use Eolib\Protocol\Net\Client\ByteCoords;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Dropping items on the ground
 */


class ItemDropClientPacket
{
    private int $byteSize = 0;
    /** @var ThreeItem */
    private ThreeItem $item;
    /** @var ByteCoords */
    private ByteCoords $coords;

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



    /** @return ByteCoords */
    public function getCoords(): ByteCoords
    {
        return $this->coords;
    }

    /** @param ByteCoords $coords */
    public function setCoords(ByteCoords $coords): void
    {
        $this->coords = $coords;
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
        ItemDropClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemDropClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemDropClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemDropClientPacket $data): void {
        if ($data->getItem() == null)
        {
            throw new SerializationError('item must be provided.');
        }
        ThreeItem::serialize($writer, $data->getItem());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        ByteCoords::serialize($writer, $data->getCoords());


    }

    /**
     * Deserializes an instance of `ItemDropClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemDropClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemDropClientPacket
    {
        $data = new ItemDropClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItem(ThreeItem::deserialize($reader));
            $data->setCoords(ByteCoords::deserialize($reader));

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
        return "ItemDropClientPacket(byteSize=$this->byteSize, item=".var_export($this->item, true).", coords=".var_export($this->coords, true).")";
    }

}



