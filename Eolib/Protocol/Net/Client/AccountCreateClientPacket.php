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
 * Confirm creating an account
 */


class AccountCreateClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $username = "";
    /** @var string */
    private string $password = "";
    /** @var string */
    private string $fullName = "";
    /** @var string */
    private string $location = "";
    /** @var string */
    private string $email = "";
    /** @var string */
    private string $computer = "";
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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
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



    /** @return string */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /** @param string $fullName */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }



    /** @return string */
    public function getLocation(): string
    {
        return $this->location;
    }

    /** @param string $location */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }



    /** @return string */
    public function getEmail(): string
    {
        return $this->email;
    }

    /** @param string $email */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }



    /** @return string */
    public function getComputer(): string
    {
        return $this->computer;
    }

    /** @param string $computer */
    public function setComputer(string $computer): void
    {
        $this->computer = $computer;
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
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ACCOUNT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        $writer->addByte(0xFF);
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
        if ($data->getFullName() == null)
        {
            throw new SerializationError('fullName must be provided.');
        }
        $writer->addString($data->getFullName());

        $writer->addByte(0xFF);
        if ($data->getLocation() == null)
        {
            throw new SerializationError('location must be provided.');
        }
        $writer->addString($data->getLocation());

        $writer->addByte(0xFF);
        if ($data->getEmail() == null)
        {
            throw new SerializationError('email must be provided.');
        }
        $writer->addString($data->getEmail());

        $writer->addByte(0xFF);
        if ($data->getComputer() == null)
        {
            throw new SerializationError('computer must be provided.');
        }
        $writer->addString($data->getComputer());

        $writer->addByte(0xFF);
        if ($data->getHdid() == null)
        {
            throw new SerializationError('hdid must be provided.');
        }
        $writer->addString($data->getHdid());

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
            $data->setSessionId($reader->getShort());
            $reader->nextChunk();
            $data->setUsername($reader->getString());
            $reader->nextChunk();
            $data->setPassword($reader->getString());
            $reader->nextChunk();
            $data->setFullName($reader->getString());
            $reader->nextChunk();
            $data->setLocation($reader->getString());
            $reader->nextChunk();
            $data->setEmail($reader->getString());
            $reader->nextChunk();
            $data->setComputer($reader->getString());
            $reader->nextChunk();
            $data->setHdid($reader->getString());
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
        return "AccountCreateClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", username=$this->username, password=$this->password, fullName=$this->fullName, location=$this->location, email=$this->email, computer=$this->computer, hdid=$this->hdid)";
    }

}



