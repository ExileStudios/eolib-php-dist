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
use Eolib\Protocol\SerializationError;

/**
 * Play jukebox music
 */


class JukeboxUseServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $trackId;

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
    public function getTrackId(): int
    {
        return $this->trackId;
    }

    /** @param int $trackId */
    public function setTrackId(int $trackId): void
    {
        $this->trackId = $trackId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::JUKEBOX;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        JukeboxUseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxUseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxUseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxUseServerPacket $data): void {
        if ($data->getTrackId() == null)
        {
            throw new SerializationError('trackId must be provided.');
        }
        $writer->addShort($data->getTrackId());


    }

    /**
     * Deserializes an instance of `JukeboxUseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxUseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxUseServerPacket
    {
        $data = new JukeboxUseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setTrackId($reader->getShort());

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
        return "JukeboxUseServerPacket(byteSize=$this->byteSize, trackId=".var_export($this->trackId, true).")";
    }

}



