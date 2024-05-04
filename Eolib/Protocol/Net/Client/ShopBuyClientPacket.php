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
 * Purchasing an item from a shop
 */


class ShopBuyClientPacket
{
    private int $byteSize = 0;
    /** @var Item */
    private Item $buyItem;
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
    public function getBuyItem(): Item
    {
        return $this->buyItem;
    }

    /** @param Item $buyItem */
    public function setBuyItem(Item $buyItem): void
    {
        $this->buyItem = $buyItem;
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
        return PacketAction::BUY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopBuyClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopBuyClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopBuyClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopBuyClientPacket $data): void {
        if ($data->getBuyItem() == null)
        {
            throw new SerializationError('buyItem must be provided.');
        }
        Item::serialize($writer, $data->getBuyItem());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());


    }

    /**
     * Deserializes an instance of `ShopBuyClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopBuyClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopBuyClientPacket
    {
        $data = new ShopBuyClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setBuyItem(Item::deserialize($reader));
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
        return "ShopBuyClientPacket(byteSize=$this->byteSize, buyItem=".var_export($this->buyItem, true).", sessionId=".var_export($this->sessionId, true).")";
    }

}



