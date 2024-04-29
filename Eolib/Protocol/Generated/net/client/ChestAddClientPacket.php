<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Placing an item in to a chest
 */


class ChestAddClientPacket
{
    private $byteSize = 0;
    private Coords $coords;
    private ThreeItem $addItem;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    public function getAddItem(): ThreeItem
    {
        return $this->addItem;
    }

    public function setAddItem(ThreeItem $addItem): void
    {
        $this->addItem = $addItem;
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
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestAddClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestAddClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestAddClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestAddClientPacket $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->addItem === null)
        {
            throw new SerializationError('addItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->addItem);


    }

    /**
     * Deserializes an instance of `ChestAddClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestAddClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestAddClientPacket
    {
        $data = new ChestAddClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->coords = Coords::deserialize($reader);
            $data->addItem = ThreeItem::deserialize($reader);

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
        return "ChestAddClientPacket(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', addItem=' . $this->addItem . ')";
    }

}



