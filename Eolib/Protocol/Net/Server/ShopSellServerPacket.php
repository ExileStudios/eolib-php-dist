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
use Eolib\Protocol\Net\Server\ShopSoldItem;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Response to selling an item to a shop
 */


class ShopSellServerPacket
{
    private int $byteSize = 0;
    /** @var ShopSoldItem */
    private ShopSoldItem $soldItem;
    /** @var int */
    private int $goldAmount;
    /** @var Weight */
    private Weight $weight;

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

    /** @return ShopSoldItem */
    public function getSoldItem(): ShopSoldItem
    {
        return $this->soldItem;
    }

    /** @param ShopSoldItem $soldItem */
    public function setSoldItem(ShopSoldItem $soldItem): void
    {
        $this->soldItem = $soldItem;
    }



    /** @return int */
    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    /** @param int $goldAmount */
    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }



    /** @return Weight */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /** @param Weight $weight */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
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
        ShopSellServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopSellServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopSellServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopSellServerPacket $data): void {
        if ($data->getSoldItem() == null)
        {
            throw new SerializationError('soldItem must be provided.');
        }
        ShopSoldItem::serialize($writer, $data->getSoldItem());

        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());


    }

    /**
     * Deserializes an instance of `ShopSellServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopSellServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopSellServerPacket
    {
        $data = new ShopSellServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSoldItem(ShopSoldItem::deserialize($reader));
            $data->setGoldAmount($reader->getInt());
            $data->setWeight(Weight::deserialize($reader));

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
        return "ShopSellServerPacket(byteSize=$this->byteSize, soldItem=".var_export($this->soldItem, true).", goldAmount=".var_export($this->goldAmount, true).", weight=".var_export($this->weight, true).")";
    }

}



