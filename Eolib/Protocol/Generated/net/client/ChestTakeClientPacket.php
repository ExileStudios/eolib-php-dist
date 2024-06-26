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
use Eolib\Protocol\SerializationError;

/**
 * Taking an item from a chest
 */


class ChestTakeClientPacket
{
    private $byteSize = 0;
    private Coords $coords;
    private int $takeItemId;

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

    public function getTakeItemId(): int
    {
        return $this->takeItemId;
    }

    public function setTakeItemId(int $takeItemId): void
    {
        $this->takeItemId = $takeItemId;
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
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->takeItemId === null)
        {
            throw new SerializationError('takeItemId must be provided.');
        }
        $writer->addShort($data->takeItemId);


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
            $data->coords = Coords::deserialize($reader);
            $data->takeItemId = $reader->getShort();

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
        return "ChestTakeClientPacket(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', takeItemId=' . $this->takeItemId . ')";
    }

}



