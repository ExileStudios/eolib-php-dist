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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Taking items from the ground
 */


class ItemGetClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemIndex;

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
    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    /** @param int $itemIndex */
    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
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
        ItemGetClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemGetClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemGetClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemGetClientPacket $data): void {
        if ($data->getItemIndex() == null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->getItemIndex());


    }

    /**
     * Deserializes an instance of `ItemGetClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemGetClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemGetClientPacket
    {
        $data = new ItemGetClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItemIndex($reader->getShort());

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
        return "ItemGetClientPacket(byteSize=$this->byteSize, itemIndex=".var_export($this->itemIndex, true).")";
    }

}



