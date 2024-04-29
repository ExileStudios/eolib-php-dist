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
use Eolib\Protocol\Generated\Net\Version;
use Eolib\Protocol\SerializationError;

/**
 * 
 * Connection initialization request.
 * This packet is unencrypted.
 * 
 */


class InitInitClientPacket
{
    private $byteSize = 0;
    private int $challenge;
    private Version $version;
    private int $hdidLength;
    private string $hdid = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getChallenge(): int
    {
        return $this->challenge;
    }

    public function setChallenge(int $challenge): void
    {
        $this->challenge = $challenge;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function setVersion(Version $version): void
    {
        $this->version = $version;
    }

    public function getHdid(): string
    {
        return $this->hdid;
    }

    public function setHdid(string $hdid): void
    {
        $this->hdid = $hdid;
        $this->hdidLength = strlen($this->hdid);
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::INIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::INIT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        InitInitClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `InitInitClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InitInitClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InitInitClientPacket $data): void {
        if ($data->challenge === null)
        {
            throw new SerializationError('challenge must be provided.');
        }
        $writer->addThree($data->challenge);

        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        Version::serialize($writer, $data->version);

        $writer->addChar(112);

        if ($data->hdidLength === null)
        {
            throw new SerializationError('hdidLength must be provided.');
        }
        $writer->addChar($data->hdidLength);

        if ($data->hdid === null)
        {
            throw new SerializationError('hdid must be provided.');
        }
        if (strlen($data->hdid) > 252)
        {
            throw new SerializationError("Expected length of hdid to be 252 or less, got {strlen($data->hdid)}.");
        }
        $writer->addFixedString($data->hdid, $data->hdidLength, false);


    }

    /**
     * Deserializes an instance of `InitInitClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InitInitClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): InitInitClientPacket
    {
        $data = new InitInitClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->challenge = $reader->getThree();
            $data->version = Version::deserialize($reader);
            $reader->getChar();
            $data->hdidLength = $reader->getChar();
            $data->hdid = $reader->getFixedString($data->hdidLength, false);

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
        return "InitInitClientPacket(byteSize=' . $this->byteSize . '', challenge=' . $this->challenge . '', version=' . $this->version . '', hdid=' . $this->hdid . ')";
    }

}



