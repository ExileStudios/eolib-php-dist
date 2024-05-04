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
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to removing an item from a chest
 */


class ChestGetServerPacket
{
    private int $byteSize = 0;
    /** @var ThreeItem */
    private ThreeItem $takenItem;
    /** @var Weight */
    private Weight $weight;
    /** @var ThreeItem[] */
    public array $items = [];

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

    /** @return ThreeItem */
    public function getTakenItem(): ThreeItem
    {
        return $this->takenItem;
    }

    /** @param ThreeItem $takenItem */
    public function setTakenItem(ThreeItem $takenItem): void
    {
        $this->takenItem = $takenItem;
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



    /** @return ThreeItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param ThreeItem[] $items */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::GET;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestGetServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestGetServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestGetServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestGetServerPacket $data): void {
        if ($data->getTakenItem() == null)
        {
            throw new SerializationError('takenItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getTakenItem());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());

        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ThreeItem::serialize($writer, $data->getItems()[$i]);

        }

    }

    /**
     * Deserializes an instance of `ChestGetServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestGetServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestGetServerPacket
    {
        $data = new ChestGetServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setTakenItem(ThreeItem::deserialize($reader));
            $data->setWeight(Weight::deserialize($reader));
            $items_length = (int) $reader->getRemaining() / 5;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ThreeItem::deserialize($reader);
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
        return "ChestGetServerPacket(byteSize=$this->byteSize, takenItem=".var_export($this->takenItem, true).", weight=".var_export($this->weight, true).", items=".var_export($this->items, true).")";
    }

}



