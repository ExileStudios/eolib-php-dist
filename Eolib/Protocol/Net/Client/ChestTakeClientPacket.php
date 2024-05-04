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
use Eolib\Protocol\SerializationError;

/**
 * Taking an item from a chest
 */


class ChestTakeClientPacket
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $takeItemId;

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



    /** @return int */
    public function getTakeItemId(): int
    {
        return $this->takeItemId;
    }

    /** @param int $takeItemId */
    public function setTakeItemId(int $takeItemId): void
    {
        $this->takeItemId = $takeItemId;
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
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChestTakeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChestTakeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChestTakeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChestTakeClientPacket $data): void {
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getTakeItemId() == null)
        {
            throw new SerializationError('takeItemId must be provided.');
        }
        $writer->addShort($data->getTakeItemId());


    }

    /**
     * Deserializes an instance of `ChestTakeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChestTakeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChestTakeClientPacket
    {
        $data = new ChestTakeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCoords(Coords::deserialize($reader));
            $data->setTakeItemId($reader->getShort());

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
        return "ChestTakeClientPacket(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", takeItemId=".var_export($this->takeItemId, true).")";
    }

}



