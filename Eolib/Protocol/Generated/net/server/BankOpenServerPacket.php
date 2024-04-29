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
use Eolib\Protocol\SerializationError;

/**
 * Open banker NPC interface
 */


class BankOpenServerPacket
{
    private $byteSize = 0;
    private int $goldBank;
    private int $sessionId;
    private int $lockerUpgrades;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGoldBank(): int
    {
        return $this->goldBank;
    }

    public function setGoldBank(int $goldBank): void
    {
        $this->goldBank = $goldBank;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getLockerUpgrades(): int
    {
        return $this->lockerUpgrades;
    }

    public function setLockerUpgrades(int $lockerUpgrades): void
    {
        $this->lockerUpgrades = $lockerUpgrades;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BANK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BankOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BankOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BankOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BankOpenServerPacket $data): void {
        if ($data->goldBank === null)
        {
            throw new SerializationError('goldBank must be provided.');
        }
        $writer->addInt($data->goldBank);

        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addThree($data->sessionId);

        if ($data->lockerUpgrades === null)
        {
            throw new SerializationError('lockerUpgrades must be provided.');
        }
        $writer->addChar($data->lockerUpgrades);


    }

    /**
     * Deserializes an instance of `BankOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BankOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BankOpenServerPacket
    {
        $data = new BankOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->goldBank = $reader->getInt();
            $data->sessionId = $reader->getThree();
            $data->lockerUpgrades = $reader->getChar();

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
        return "BankOpenServerPacket(byteSize=' . $this->byteSize . '', goldBank=' . $this->goldBank . '', sessionId=' . $this->sessionId . '', lockerUpgrades=' . $this->lockerUpgrades . ')";
    }

}



