<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Version;
use Eolib\Protocol\SerializationError;

/**
 * 
 * Connection initialization request.
 * This packet is unencrypted.
 * 
 */


class InitInitClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $challenge;
    /** @var Version */
    private Version $version;
    /** @var int */
    private int $hdidLength;
    /** @var string */
    private string $hdid = "";

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
    public function getChallenge(): int
    {
        return $this->challenge;
    }

    /** @param int $challenge */
    public function setChallenge(int $challenge): void
    {
        $this->challenge = $challenge;
    }



    /** @return Version */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /** @param Version $version */
    public function setVersion(Version $version): void
    {
        $this->version = $version;
    }



    /** @return string */
    public function getHdid(): string
    {
        return $this->hdid;
    }

    /** @param string $hdid */
    public function setHdid(string $hdid): void
    {
        $this->hdid = $hdid;
        $this->hdidLength = mb_strlen($this->hdid);
    }

    /** @return int */
    public function getHdidLength(): int
    {
        return $this->hdidLength;
    }

    /** @param int $hdidLength */
    public function setHdidLength(int $hdidLength): void
    {
        $this->hdidLength = $hdidLength;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::INIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getChallenge() == null)
        {
            throw new SerializationError('challenge must be provided.');
        }
        $writer->addThree($data->getChallenge());

        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        Version::serialize($writer, $data->getVersion());

        $writer->addChar(112);

        if ($data->getHdidLength() == null)
        {
            throw new SerializationError('hdidLength must be provided.');
        }
        $writer->addChar($data->getHdidLength());

        if ($data->getHdid() == null)
        {
            throw new SerializationError('hdid must be provided.');
        }
        if (strlen($data->hdid) > 252)
        {
            throw new SerializationError("Expected length of hdid to be 252 or less, got " . strlen($data->hdid) . ".");
        }
        $writer->addFixedString($data->getHdid(), $data->getHdidLength(), false);


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
            $data->setChallenge($reader->getThree());
            $data->setVersion(Version::deserialize($reader));
            $reader->getChar();
            $data->setHdidLength($reader->getChar());
            $data->setHdid($reader->getFixedString($data->getHdidLength(), false));

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
        return "InitInitClientPacket(byteSize=$this->byteSize, challenge=".var_export($this->challenge, true).", version=".var_export($this->version, true).", hdid=".var_export($this->hdid, true).")";
    }

}



