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
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to removing an item from a chest
 */


class ChestGetServerPacket
{
    private $byteSize = 0;
    private ThreeItem $takenItem;
    private Weight $weight;
    private array $items;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getTakenItem(): ThreeItem
    {
        return $this->takenItem;
    }

    public function setTakenItem(ThreeItem $takenItem): void
    {
        $this->takenItem = $takenItem;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->takenItem === null)
        {
            throw new SerializationError('takenItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->takenItem);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);

        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ThreeItem::serialize($writer, $data->items[$i]);

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
            $data->takenItem = ThreeItem::deserialize($reader);
            $data->weight = Weight::deserialize($reader);
            $items_length = (int) $reader->remaining() / 5;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ThreeItem::deserialize($reader);
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
        return "ChestGetServerPacket(byteSize=' . $this->byteSize . '', takenItem=' . $this->takenItem . '', weight=' . $this->weight . '', items=' . $this->items . ')";
    }

}



