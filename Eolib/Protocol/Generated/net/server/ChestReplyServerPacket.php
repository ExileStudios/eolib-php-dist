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
 * Reply to placing an item in to a chest
 */


class ChestReplyServerPacket
{
    private $byteSize = 0;
    private int $addedItemId;
    private int $remainingAmount;
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

    public function getAddedItemId(): int
    {
        return $this->addedItemId;
    }

    public function setAddedItemId(int $addedItemId): void
    {
        $this->addedItemId = $addedItemId;
    }

    public function getRemainingAmount(): int
    {
        return $this->remainingAmount;
    }

    public function setRemainingAmount(int $remainingAmount): void
    {
        $this->remainingAmount = $remainingAmount;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestReplyServerPacket $data): void {
        if ($data->addedItemId === null)
        {
            throw new SerializationError('addedItemId must be provided.');
        }
        $writer->addShort($data->addedItemId);

        if ($data->remainingAmount === null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addInt($data->remainingAmount);

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
     * Deserializes an instance of `ChestReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestReplyServerPacket
    {
        $data = new ChestReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->addedItemId = $reader->getShort();
            $data->remainingAmount = $reader->getInt();
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
        return "ChestReplyServerPacket(byteSize=' . $this->byteSize . '', addedItemId=' . $this->addedItemId . '', remainingAmount=' . $this->remainingAmount . '', weight=' . $this->weight . '', items=' . $this->items . ')";
    }

}



