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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\server\MapFile;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.MapMutation
 */


class WarpCreateServerPacket
{
    private $byteSize = 0;
    private MapFile $mapFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

    public function setMapFile(MapFile $mapFile): void
    {
        $this->mapFile = $mapFile;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WARP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WarpCreateServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WarpCreateServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpCreateServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpCreateServerPacket $data): void {
        if ($data->mapFile === null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->mapFile);


    }

    /**
     * Deserializes an instance of `WarpCreateServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WarpCreateServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WarpCreateServerPacket
    {
        $data = new WarpCreateServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->mapFile = MapFile::deserialize($reader);

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
        return "WarpCreateServerPacket(byteSize=' . $this->byteSize . '', mapFile=' . $this->mapFile . ')";
    }

}



