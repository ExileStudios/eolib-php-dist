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
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Response to purchasing an item from a shop
 */


class ShopBuyServerPacket
{
    private $byteSize = 0;
    private int $goldAmount;
    private Item $boughtItem;
    private Weight $weight;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }

    public function getBoughtItem(): Item
    {
        return $this->boughtItem;
    }

    public function setBoughtItem(Item $boughtItem): void
    {
        $this->boughtItem = $boughtItem;
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
        return PacketAction::BUY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopBuyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopBuyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopBuyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopBuyServerPacket $data): void {
        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);

        if ($data->boughtItem === null)
        {
            throw new SerializationError('boughtItem must be provided.');
        }
        Item::serialize($writer, $data->boughtItem);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);


    }

    /**
     * Deserializes an instance of `ShopBuyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopBuyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopBuyServerPacket
    {
        $data = new ShopBuyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->goldAmount = $reader->getInt();
            $data->boughtItem = Item::deserialize($reader);
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
        return "ShopBuyServerPacket(byteSize=' . $this->byteSize . '', goldAmount=' . $this->goldAmount . '', boughtItem=' . $this->boughtItem . '', weight=' . $this->weight . ')";
    }

}



