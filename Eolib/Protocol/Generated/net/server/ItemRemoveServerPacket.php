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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Item disappeared from the ground
 */


class ItemRemoveServerPacket
{
    private $byteSize = 0;
    private int $itemIndex;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
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
        return PacketAction::REMOVE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemRemoveServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemRemoveServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemRemoveServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemRemoveServerPacket $data): void {
        if ($data->itemIndex === null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->itemIndex);


    }

    /**
     * Deserializes an instance of `ItemRemoveServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemRemoveServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemRemoveServerPacket
    {
        $data = new ItemRemoveServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemIndex = $reader->getShort();

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
        return "ItemRemoveServerPacket(byteSize=' . $this->byteSize . '', itemIndex=' . $this->itemIndex . ')";
    }

}



