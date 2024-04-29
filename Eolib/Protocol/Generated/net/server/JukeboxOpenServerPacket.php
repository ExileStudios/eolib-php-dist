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
use Eolib\Protocol\SerializationError;

/**
 * Reply to opening the jukebox listing
 */


class JukeboxOpenServerPacket
{
    private $byteSize = 0;
    private int $mapId;
    private string $jukeboxPlayer = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getJukeboxPlayer(): string
    {
        return $this->jukeboxPlayer;
    }

    public function setJukeboxPlayer(string $jukeboxPlayer): void
    {
        $this->jukeboxPlayer = $jukeboxPlayer;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::JUKEBOX;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        JukeboxOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxOpenServerPacket $data): void {
        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->jukeboxPlayer === null)
        {
            throw new SerializationError('jukeboxPlayer must be provided.');
        }
        $writer->addString($data->jukeboxPlayer);


    }

    /**
     * Deserializes an instance of `JukeboxOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxOpenServerPacket
    {
        $data = new JukeboxOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->mapId = $reader->getShort();
            $data->jukeboxPlayer = $reader->getString();

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
        return "JukeboxOpenServerPacket(byteSize=' . $this->byteSize . '', mapId=' . $this->mapId . '', jukeboxPlayer=' . $this->jukeboxPlayer . ')";
    }

}



