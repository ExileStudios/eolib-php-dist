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
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\Generated\Net\server\ShopSoldItem;
use Eolib\Protocol\SerializationError;

/**
 * Response to selling an item to a shop
 */


class ShopSellServerPacket
{
    private $byteSize = 0;
    private ShopSoldItem $soldItem;
    private int $goldAmount;
    private Weight $weight;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSoldItem(): ShopSoldItem
    {
        return $this->soldItem;
    }

    public function setSoldItem(ShopSoldItem $soldItem): void
    {
        $this->soldItem = $soldItem;
    }

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
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
        if ($data->soldItem === null)
        {
            throw new SerializationError('soldItem must be provided.');
        }
        ShopSoldItem::serialize($writer, $data->soldItem);

        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);


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
            $data->soldItem = ShopSoldItem::deserialize($reader);
            $data->goldAmount = $reader->getInt();
            $data->weight = Weight::deserialize($reader);

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
        return "ShopSellServerPacket(byteSize=' . $this->byteSize . '', soldItem=' . $this->soldItem . '', goldAmount=' . $this->goldAmount . '', weight=' . $this->weight . ')";
    }

}



