<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Placing an item in to a chest
 */


class ChestAddClientPacket
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var ThreeItem */
    private ThreeItem $addItem;

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



    /** @return ThreeItem */
    public function getAddItem(): ThreeItem
    {
        return $this->addItem;
    }

    /** @param ThreeItem $addItem */
    public function setAddItem(ThreeItem $addItem): void
    {
        $this->addItem = $addItem;
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
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getAddItem() == null)
        {
            throw new SerializationError('addItem must be provided.');
        }
        ThreeItem::serialize($writer, $data->getAddItem());


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
            $data->setCoords(Coords::deserialize($reader));
            $data->setAddItem(ThreeItem::deserialize($reader));

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
        return "ChestAddClientPacket(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", addItem=".var_export($this->addItem, true).")";
    }

}



