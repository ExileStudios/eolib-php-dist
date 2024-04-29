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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Requesting a song on a jukebox
 */


class JukeboxMsgClientPacket
{
    private $byteSize = 0;
    private int $trackId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getTrackId(): int
    {
        return $this->trackId;
    }

    public function setTrackId(int $trackId): void
    {
        $this->trackId = $trackId;
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
        return PacketAction::MSG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        JukeboxMsgClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxMsgClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxMsgClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxMsgClientPacket $data): void {
        $writer->addChar(0);

        $writer->addChar(0);

        if ($data->trackId === null)
        {
            throw new SerializationError('trackId must be provided.');
        }
        $writer->addShort($data->trackId);


    }

    /**
     * Deserializes an instance of `JukeboxMsgClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxMsgClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxMsgClientPacket
    {
        $data = new JukeboxMsgClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $reader->getChar();
            $reader->getChar();
            $data->trackId = $reader->getShort();
            $reader->setChunkedReadingMode(false);

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
        return "JukeboxMsgClientPacket(byteSize=' . $this->byteSize . '', trackId=' . $this->trackId . ')";
    }

}



