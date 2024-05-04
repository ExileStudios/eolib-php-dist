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
 * Your character standing up from a chair
 */


class ChairCloseServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
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
        return PacketFamily::CHAIR;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::CLOSE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ChairCloseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ChairCloseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ChairCloseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ChairCloseServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());


    }

    /**
     * Deserializes an instance of `ChairCloseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ChairCloseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ChairCloseServerPacket
    {
        $data = new ChairCloseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
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
        return "ChairCloseServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", coords=".var_export($this->coords, true).")";
    }

}



