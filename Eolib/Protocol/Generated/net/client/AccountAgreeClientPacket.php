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
 * Change password
 */


class AccountAgreeClientPacket
{
    private $byteSize = 0;
    private string $username = "";
    private string $oldPassword = "";
    private string $newPassword = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): void
    {
        $this->newPassword = $newPassword;
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
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AccountAgreeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AccountAgreeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AccountAgreeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AccountAgreeClientPacket $data): void {
        if ($data->username === null)
        {
            throw new SerializationError('username must be provided.');
        }
        $writer->addString($data->username);

        $writer->addByte(0xFF);
        if ($data->oldPassword === null)
        {
            throw new SerializationError('oldPassword must be provided.');
        }
        $writer->addString($data->oldPassword);

        $writer->addByte(0xFF);
        if ($data->newPassword === null)
        {
            throw new SerializationError('newPassword must be provided.');
        }
        $writer->addString($data->newPassword);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `AccountAgreeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AccountAgreeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AccountAgreeClientPacket
    {
        $data = new AccountAgreeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->username = $reader->getString();
            $reader->nextChunk();
            $data->oldPassword = $reader->getString();
            $reader->nextChunk();
            $data->newPassword = $reader->getString();
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
        return "AccountAgreeClientPacket(byteSize=' . $this->byteSize . '', username=' . $this->username . '', oldPassword=' . $this->oldPassword . '', newPassword=' . $this->newPassword . ')";
    }

}



