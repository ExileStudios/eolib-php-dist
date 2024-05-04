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
use Eolib\Protocol\SerializationError;

/**
 * Response to buying a locker space upgrade from a banker NPC
 */


class LockerBuyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $goldAmount;
    /** @var int */
    private int $lockerUpgrades;

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
    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    /** @param int $goldAmount */
    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }



    /** @return int */
    public function getLockerUpgrades(): int
    {
        return $this->lockerUpgrades;
    }

    /** @param int $lockerUpgrades */
    public function setLockerUpgrades(int $lockerUpgrades): void
    {
        $this->lockerUpgrades = $lockerUpgrades;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::LOCKER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::BUY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        LockerBuyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LockerBuyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LockerBuyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LockerBuyServerPacket $data): void {
        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());

        if ($data->getLockerUpgrades() == null)
        {
            throw new SerializationError('lockerUpgrades must be provided.');
        }
        $writer->addChar($data->getLockerUpgrades());


    }

    /**
     * Deserializes an instance of `LockerBuyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LockerBuyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LockerBuyServerPacket
    {
        $data = new LockerBuyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setGoldAmount($reader->getInt());
            $data->setLockerUpgrades($reader->getChar());

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
        return "LockerBuyServerPacket(byteSize=$this->byteSize, goldAmount=".var_export($this->goldAmount, true).", lockerUpgrades=".var_export($this->lockerUpgrades, true).")";
    }

}



