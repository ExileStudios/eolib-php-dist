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
use Eolib\Protocol\Generated\Net\server\PubFile;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.FileEsf
 */


class WelcomeNet243ServerPacket
{
    private $byteSize = 0;
    private PubFile $pubFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::NET243;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeNet243ServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeNet243ServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeNet243ServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeNet243ServerPacket $data): void {
        if ($data->pubFile === null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->pubFile);


    }

    /**
     * Deserializes an instance of `WelcomeNet243ServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeNet243ServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeNet243ServerPacket
    {
        $data = new WelcomeNet243ServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->pubFile = PubFile::deserialize($reader);

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
        return "WelcomeNet243ServerPacket(byteSize=' . $this->byteSize . '', pubFile=' . $this->pubFile . ')";
    }

}



