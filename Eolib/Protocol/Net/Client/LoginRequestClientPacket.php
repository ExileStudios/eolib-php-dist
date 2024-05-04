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
use Eolib\Protocol\SerializationError;

/**
 * Login request
 */


class LoginRequestClientPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $username = "";
    /** @var string */
    private string $password = "";

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

    /** @return string */
    public function getUsername(): string
    {
        return $this->username;
    }

    /** @param string $username */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }



    /** @return string */
    public function getPassword(): string
    {
        return $this->password;
    }

    /** @param string $password */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::LOGIN;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LoginRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LoginRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LoginRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LoginRequestClientPacket $data): void {
        if ($data->getUsername() == null)
        {
            throw new SerializationError('username must be provided.');
        }
        $writer->addString($data->getUsername());

        $writer->addByte(0xFF);
        if ($data->getPassword() == null)
        {
            throw new SerializationError('password must be provided.');
        }
        $writer->addString($data->getPassword());

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `LoginRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LoginRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LoginRequestClientPacket
    {
        $data = new LoginRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setUsername($reader->getString());
            $reader->nextChunk();
            $data->setPassword($reader->getString());
            $reader->nextChunk();
            $reader->setChunkedReadingMode(false);

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
        return "LoginRequestClientPacket(byteSize=$this->byteSize, username=$this->username, password=$this->password)";
    }

}



