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
use Eolib\Protocol\SerializationError;

/**
 * Using an item
 */


class ItemUseClientPacket
{
    private $byteSize = 0;
    private int $itemId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
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
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemUseClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemUseClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemUseClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemUseClientPacket $data): void {
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);


    }

    /**
     * Deserializes an instance of `ItemUseClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemUseClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemUseClientPacket
    {
        $data = new ItemUseClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemId = $reader->getShort();

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
        return "ItemUseClientPacket(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . ')";
    }

}



