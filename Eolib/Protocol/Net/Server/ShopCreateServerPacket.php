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
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Response to crafting an item from a shop
 */


class ShopCreateServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $craftItemId;
    /** @var Weight */
    private Weight $weight;
    /** @var Item[] */
    public array $ingredients = [];

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
    public function getCraftItemId(): int
    {
        return $this->craftItemId;
    }

    /** @param int $craftItemId */
    public function setCraftItemId(int $craftItemId): void
    {
        $this->craftItemId = $craftItemId;
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



    /** @return Item[] */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /** @param Item[] $ingredients */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
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
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopCreateServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopCreateServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopCreateServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopCreateServerPacket $data): void {
        if ($data->getCraftItemId() == null)
        {
            throw new SerializationError('craftItemId must be provided.');
        }
        $writer->addShort($data->getCraftItemId());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());

        if ($data->getIngredients() == null)
        {
            throw new SerializationError('ingredients must be provided.');
        }
        if (count($data->ingredients) != 4)
        {
            throw new SerializationError("Expected length of ingredients to be exactly 4, got " . count($data->ingredients) . ".");
        }
        for ($i = 0; $i < 4; $i++)
        {
            Item::serialize($writer, $data->getIngredients()[$i]);

        }

    }

    /**
     * Deserializes an instance of `ShopCreateServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopCreateServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopCreateServerPacket
    {
        $data = new ShopCreateServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCraftItemId($reader->getShort());
            $data->setWeight(Weight::deserialize($reader));
            $data->ingredients = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->ingredients[] = Item::deserialize($reader);
            }

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
        return "ShopCreateServerPacket(byteSize=$this->byteSize, craftItemId=".var_export($this->craftItemId, true).", weight=".var_export($this->weight, true).", ingredients=".var_export($this->ingredients, true).")";
    }

}



