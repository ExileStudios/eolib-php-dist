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
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Reply to opening a chest
 */


class ChestOpenServerPacket
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestOpenServerPacket $data): void {
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

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
     * Deserializes an instance of `ChestOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestOpenServerPacket
    {
        $data = new ChestOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCoords(Coords::deserialize($reader));
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
        return "ChestOpenServerPacket(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", items=".var_export($this->items, true).")";
    }

}



