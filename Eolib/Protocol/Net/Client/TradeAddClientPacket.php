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
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Add an item to the trade screen
 */


class TradeAddClientPacket
{
    private int $byteSize = 0;
    /** @var Item */
    private Item $addItem;

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
    public function getAddItem(): Item
    {
        return $this->addItem;
    }

    /** @param Item $addItem */
    public function setAddItem(Item $addItem): void
    {
        $this->addItem = $addItem;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TRADE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TradeAddClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeAddClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeAddClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeAddClientPacket $data): void {
        if ($data->getAddItem() == null)
        {
            throw new SerializationError('addItem must be provided.');
        }
        Item::serialize($writer, $data->getAddItem());


    }

    /**
     * Deserializes an instance of `TradeAddClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeAddClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeAddClientPacket
    {
        $data = new TradeAddClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setAddItem(Item::deserialize($reader));

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
        return "TradeAddClientPacket(byteSize=$this->byteSize, addItem=".var_export($this->addItem, true).")";
    }

}



