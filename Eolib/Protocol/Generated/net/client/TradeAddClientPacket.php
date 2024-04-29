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
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Add an item to the trade screen
 */


class TradeAddClientPacket
{
    private $byteSize = 0;
    private Item $addItem;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getAddItem(): Item
    {
        return $this->addItem;
    }

    public function setAddItem(Item $addItem): void
    {
        $this->addItem = $addItem;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TRADE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->addItem === null)
        {
            throw new SerializationError('addItem must be provided.');
        }
        Item::serialize($writer, $data->addItem);


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
            $data->addItem = Item::deserialize($reader);

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
        return "TradeAddClientPacket(byteSize=' . $this->byteSize . '', addItem=' . $this->addItem . ')";
    }

}



