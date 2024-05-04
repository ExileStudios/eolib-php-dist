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
use Eolib\Protocol\Coords;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Item appeared on the ground
 */


class ItemAddServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $itemIndex;
    /** @var int */
    private int $itemAmount;
    /** @var Coords */
    private Coords $coords;

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
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /** @param int $itemId */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }



    /** @return int */
    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    /** @param int $itemIndex */
    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
    }



    /** @return int */
    public function getItemAmount(): int
    {
        return $this->itemAmount;
    }

    /** @param int $itemAmount */
    public function setItemAmount(int $itemAmount): void
    {
        $this->itemAmount = $itemAmount;
    }



    /** @return Coords */
    public function getCoords(): Coords
    {
        return $this->coords;
    }

    /** @param Coords $coords */
    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemAddServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemAddServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemAddServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemAddServerPacket $data): void {
        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getItemIndex() == null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->getItemIndex());

        if ($data->getItemAmount() == null)
        {
            throw new SerializationError('itemAmount must be provided.');
        }
        $writer->addThree($data->getItemAmount());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());


    }

    /**
     * Deserializes an instance of `ItemAddServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemAddServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemAddServerPacket
    {
        $data = new ItemAddServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItemId($reader->getShort());
            $data->setItemIndex($reader->getShort());
            $data->setItemAmount($reader->getThree());
            $data->setCoords(Coords::deserialize($reader));

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
        return "ItemAddServerPacket(byteSize=$this->byteSize, itemId=".var_export($this->itemId, true).", itemIndex=".var_export($this->itemIndex, true).", itemAmount=".var_export($this->itemAmount, true).", coords=".var_export($this->coords, true).")";
    }

}



