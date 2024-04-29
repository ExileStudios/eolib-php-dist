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
 * Confirm creating an account
 */


class AccountCreateClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $username = "";
    private string $password = "";
    private string $fullName = "";
    private string $location = "";
    private string $email = "";
    private string $computer = "";
    private string $hdid = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getComputer(): string
    {
        return $this->computer;
    }

    public function setComputer(string $computer): void
    {
        $this->computer = $computer;
    }

    public function getHdid(): string
    {
        return $this->hdid;
    }

    public function setHdid(string $hdid): void
    {
        $this->hdid = $hdid;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ACCOUNT;
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
        AccountCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AccountCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AccountCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AccountCreateClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        $writer->addByte(0xFF);
        if ($data->username === null)
        {
            throw new SerializationError('username must be provided.');
        }
        $writer->addString($data->username);

        $writer->addByte(0xFF);
        if ($data->password === null)
        {
            throw new SerializationError('password must be provided.');
        }
        $writer->addString($data->password);

        $writer->addByte(0xFF);
        if ($data->fullName === null)
        {
            throw new SerializationError('fullName must be provided.');
        }
        $writer->addString($data->fullName);

        $writer->addByte(0xFF);
        if ($data->location === null)
        {
            throw new SerializationError('location must be provided.');
        }
        $writer->addString($data->location);

        $writer->addByte(0xFF);
        if ($data->email === null)
        {
            throw new SerializationError('email must be provided.');
        }
        $writer->addString($data->email);

        $writer->addByte(0xFF);
        if ($data->computer === null)
        {
            throw new SerializationError('computer must be provided.');
        }
        $writer->addString($data->computer);

        $writer->addByte(0xFF);
        if ($data->hdid === null)
        {
            throw new SerializationError('hdid must be provided.');
        }
        $writer->addString($data->hdid);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `AccountCreateClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AccountCreateClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AccountCreateClientPacket
    {
        $data = new AccountCreateClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->sessionId = $reader->getShort();
            $reader->nextChunk();
            $data->username = $reader->getString();
            $reader->nextChunk();
            $data->password = $reader->getString();
            $reader->nextChunk();
            $data->fullName = $reader->getString();
            $reader->nextChunk();
            $data->location = $reader->getString();
            $reader->nextChunk();
            $data->email = $reader->getString();
            $reader->nextChunk();
            $data->computer = $reader->getString();
            $reader->nextChunk();
            $data->hdid = $reader->getString();
            $reader->nextChunk();
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
        return "AccountCreateClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', username=' . $this->username . '', password=' . $this->password . '', fullName=' . $this->fullName . '', location=' . $this->location . '', email=' . $this->email . '', computer=' . $this->computer . '', hdid=' . $this->hdid . ')";
    }

}



