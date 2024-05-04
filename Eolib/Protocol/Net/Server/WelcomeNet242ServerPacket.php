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
use Eolib\Protocol\Net\Server\PubFile;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.FileEnf
 */


class WelcomeNet242ServerPacket
{
    private int $byteSize = 0;
    /** @var PubFile */
    private PubFile $pubFile;

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

    /** @return PubFile */
    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    /** @param PubFile $pubFile */
    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::NET242;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeNet242ServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeNet242ServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeNet242ServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeNet242ServerPacket $data): void {
        if ($data->getPubFile() == null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->getPubFile());


    }

    /**
     * Deserializes an instance of `WelcomeNet242ServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeNet242ServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeNet242ServerPacket
    {
        $data = new WelcomeNet242ServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPubFile(PubFile::deserialize($reader));

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
        return "WelcomeNet242ServerPacket(byteSize=$this->byteSize, pubFile=".var_export($this->pubFile, true).")";
    }

}



