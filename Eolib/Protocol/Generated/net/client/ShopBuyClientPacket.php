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
 * Purchasing an item from a shop
 */


class ShopBuyClientPacket
{
    private $byteSize = 0;
    private Item $buyItem;
    private int $sessionId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBuyItem(): Item
    {
        return $this->buyItem;
    }

    public function setBuyItem(Item $buyItem): void
    {
        $this->buyItem = $buyItem;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SHOP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->buyItem === null)
        {
            throw new SerializationError('buyItem must be provided.');
        }
        Item::serialize($writer, $data->buyItem);

        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);


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
            $data->buyItem = Item::deserialize($reader);
            $data->sessionId = $reader->getInt();

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
        return "ShopBuyClientPacket(byteSize=' . $this->byteSize . '', buyItem=' . $this->buyItem . '', sessionId=' . $this->sessionId . ')";
    }

}



