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
 * Response to crafting an item from a shop
 */


class ShopCreateServerPacket
{
    private $byteSize = 0;
    private int $craftItemId;
    private Weight $weight;
    private array $ingredients;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCraftItemId(): int
    {
        return $this->craftItemId;
    }

    public function setCraftItemId(int $craftItemId): void
    {
        $this->craftItemId = $craftItemId;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
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
        if ($data->craftItemId === null)
        {
            throw new SerializationError('craftItemId must be provided.');
        }
        $writer->addShort($data->craftItemId);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);

        if ($data->ingredients === null)
        {
            throw new SerializationError('ingredients must be provided.');
        }
        if (strlen($data->ingredients) != 4)
        {
            throw new SerializationError("Expected length of ingredients to be exactly 4, got {strlen($data->ingredients)}.");
        }
        for ($i = 0; $i < 4; $i++)
        {
            Item::serialize($writer, $data->ingredients[$i]);

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
            $data->craftItemId = $reader->getShort();
            $data->weight = Weight::deserialize($reader);
            $data->ingredients = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->ingredients[] = Item::deserialize($reader);
            }

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
        return "ShopCreateServerPacket(byteSize=' . $this->byteSize . '', craftItemId=' . $this->craftItemId . '', weight=' . $this->weight . '', ingredients=' . $this->ingredients . ')";
    }

}



