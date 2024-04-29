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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Item appeared on the ground
 */


class ItemAddServerPacket
{
    private $byteSize = 0;
    private int $itemId;
    private int $itemIndex;
    private int $itemAmount;
    private Coords $coords;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getItemIndex(): int
    {
        return $this->itemIndex;
    }

    public function setItemIndex(int $itemIndex): void
    {
        $this->itemIndex = $itemIndex;
    }

    public function getItemAmount(): int
    {
        return $this->itemAmount;
    }

    public function setItemAmount(int $itemAmount): void
    {
        $this->itemAmount = $itemAmount;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->itemIndex === null)
        {
            throw new SerializationError('itemIndex must be provided.');
        }
        $writer->addShort($data->itemIndex);

        if ($data->itemAmount === null)
        {
            throw new SerializationError('itemAmount must be provided.');
        }
        $writer->addThree($data->itemAmount);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);


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
            $data->itemId = $reader->getShort();
            $data->itemIndex = $reader->getShort();
            $data->itemAmount = $reader->getThree();
            $data->coords = Coords::deserialize($reader);

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
        return "ItemAddServerPacket(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', itemIndex=' . $this->itemIndex . '', itemAmount=' . $this->itemAmount . '', coords=' . $this->coords . ')";
    }

}



