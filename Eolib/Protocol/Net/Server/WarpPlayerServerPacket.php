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
use Eolib\Protocol\Net\Server\MapFile;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.WarpMap
 */


class WarpPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var MapFile */
    private MapFile $mapFile;

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

    /** @return MapFile */
    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

    /** @param MapFile $mapFile */
    public function setMapFile(MapFile $mapFile): void
    {
        $this->mapFile = $mapFile;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WARP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WarpPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WarpPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpPlayerServerPacket $data): void {
        if ($data->getMapFile() == null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->getMapFile());


    }

    /**
     * Deserializes an instance of `WarpPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WarpPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WarpPlayerServerPacket
    {
        $data = new WarpPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapFile(MapFile::deserialize($reader));

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
        return "WarpPlayerServerPacket(byteSize=$this->byteSize, mapFile=".var_export($this->mapFile, true).")";
    }

}



