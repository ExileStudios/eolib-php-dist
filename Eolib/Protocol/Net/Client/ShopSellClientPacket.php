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
 * Selling an item to a shop
 */


class ShopSellClientPacket
{
    private int $byteSize = 0;
    /** @var Item */
    private Item $sellItem;
    /** @var int */
    private int $sessionId;

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
    public function getSellItem(): Item
    {
        return $this->sellItem;
    }

    /** @param Item $sellItem */
    public function setSellItem(Item $sellItem): void
    {
        $this->sellItem = $sellItem;
    }



    /** @return int */
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SHOP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::SELL;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopSellClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopSellClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopSellClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopSellClientPacket $data): void {
        if ($data->getSellItem() == null)
        {
            throw new SerializationError('sellItem must be provided.');
        }
        Item::serialize($writer, $data->getSellItem());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());


    }

    /**
     * Deserializes an instance of `ShopSellClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopSellClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopSellClientPacket
    {
        $data = new ShopSellClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSellItem(Item::deserialize($reader));
            $data->setSessionId($reader->getInt());

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
        return "ShopSellClientPacket(byteSize=$this->byteSize, sellItem=".var_export($this->sellItem, true).", sessionId=".var_export($this->sessionId, true).")";
    }

}



