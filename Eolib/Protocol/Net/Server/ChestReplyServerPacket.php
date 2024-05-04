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
 * Reply to placing an item in to a chest
 */


class ChestReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $addedItemId;
    /** @var int */
    private int $remainingAmount;
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

    /** @return int */
    public function getAddedItemId(): int
    {
        return $this->addedItemId;
    }

    /** @param int $addedItemId */
    public function setAddedItemId(int $addedItemId): void
    {
        $this->addedItemId = $addedItemId;
    }



    /** @return int */
    public function getRemainingAmount(): int
    {
        return $this->remainingAmount;
    }

    /** @param int $remainingAmount */
    public function setRemainingAmount(int $remainingAmount): void
    {
        $this->remainingAmount = $remainingAmount;
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
        if ($data->getAddedItemId() == null)
        {
            throw new SerializationError('addedItemId must be provided.');
        }
        $writer->addShort($data->getAddedItemId());

        if ($data->getRemainingAmount() == null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addInt($data->getRemainingAmount());

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
            $data->setAddedItemId($reader->getShort());
            $data->setRemainingAmount($reader->getInt());
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
        return "ChestReplyServerPacket(byteSize=$this->byteSize, addedItemId=".var_export($this->addedItemId, true).", remainingAmount=".var_export($this->remainingAmount, true).", weight=".var_export($this->weight, true).", items=".var_export($this->items, true).")";
    }

}



