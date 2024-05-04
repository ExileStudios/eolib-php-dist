<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Server\ShopCraftItem;
use Eolib\Protocol\Net\Server\ShopTradeItem;
use Eolib\Protocol\SerializationError;

/**
 * Response from talking to a shop NPC
 */


class ShopOpenServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $shopName = "";
    /** @var ShopTradeItem[] */
    public array $tradeItems = [];
    /** @var ShopCraftItem[] */
    public array $craftItems = [];

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /** @return string */
    public function getShopName(): string
    {
        return $this->shopName;
    }

    /** @param string $shopName */
    public function setShopName(string $shopName): void
    {
        $this->shopName = $shopName;
    }



    /** @return ShopTradeItem[] */
    public function getTradeItems(): array
    {
        return $this->tradeItems;
    }

    /** @param ShopTradeItem[] $tradeItems */
    public function setTradeItems(array $tradeItems): void
    {
        $this->tradeItems = $tradeItems;
    }



    /** @return ShopCraftItem[] */
    public function getCraftItems(): array
    {
        return $this->craftItems;
    }

    /** @param ShopCraftItem[] $craftItems */
    public function setCraftItems(array $craftItems): void
    {
        $this->craftItems = $craftItems;
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopOpenServerPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->getShopName() == null)
        {
            throw new SerializationError('shopName must be provided.');
        }
        $writer->addString($data->getShopName());

        $writer->addByte(0xFF);
        if ($data->getTradeItems() == null)
        {
            throw new SerializationError('tradeItems must be provided.');
        }
        for ($i = 0; $i < count($data->tradeItems); $i++)
        {
            ShopTradeItem::serialize($writer, $data->getTradeItems()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getCraftItems() == null)
        {
            throw new SerializationError('craftItems must be provided.');
        }
        for ($i = 0; $i < count($data->craftItems); $i++)
        {
            ShopCraftItem::serialize($writer, $data->getCraftItems()[$i]);

        }
        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `ShopOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopOpenServerPacket
    {
        $data = new ShopOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setSessionId($reader->getShort());
            $data->setShopName($reader->getString());
            $reader->nextChunk();
            $tradeItems_length = (int) $reader->getRemaining() / 9;
            $data->tradeItems = [];
            for ($i = 0; $i < $tradeItems_length; $i++)
            {
                $data->tradeItems[] = ShopTradeItem::deserialize($reader);
            }
            $reader->nextChunk();
            $craftItems_length = (int) $reader->getRemaining() / 14;
            $data->craftItems = [];
            for ($i = 0; $i < $craftItems_length; $i++)
            {
                $data->craftItems[] = ShopCraftItem::deserialize($reader);
            }
            $reader->nextChunk();
            $reader->setChunkedReadingMode(false);

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
        return "ShopOpenServerPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", shopName=$this->shopName, tradeItems=".var_export($this->tradeItems, true).", craftItems=".var_export($this->craftItems, true).")";
    }

}



