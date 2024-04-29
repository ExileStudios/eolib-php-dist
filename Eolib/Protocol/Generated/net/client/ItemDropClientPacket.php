<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\Generated\Net\client\ByteCoords;
use Eolib\Protocol\SerializationError;

/**
 * Dropping items on the ground
 */


class ItemDropClientPacket
{
    private $byteSize = 0;
    private ThreeItem $item;
    private ByteCoords $coords;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItem(): ThreeItem
    {
        return $this->item;
    }

    public function setItem(ThreeItem $item): void
    {
        $this->item = $item;
    }

    public function getCoords(): ByteCoords
    {
        return $this->coords;
    }

    public function setCoords(ByteCoords $coords): void
    {
        $this->coords = $coords;
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
        ItemDropClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemDropClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemDropClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemDropClientPacket $data): void {
        if ($data->item === null)
        {
            throw new SerializationError('item must be provided.');
        }
        ThreeItem::serialize($writer, $data->item);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        ByteCoords::serialize($writer, $data->coords);


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
            $data->item = ThreeItem::deserialize($reader);
            $data->coords = ByteCoords::deserialize($reader);

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
        return "ItemDropClientPacket(byteSize=' . $this->byteSize . '', item=' . $this->item . '', coords=' . $this->coords . ')";
    }

}



