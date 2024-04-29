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
 * Response to buying a locker space upgrade from a banker NPC
 */


class LockerBuyServerPacket
{
    private $byteSize = 0;
    private int $goldAmount;
    private int $lockerUpgrades;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
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
        return PacketFamily::LOCKER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);

        if ($data->lockerUpgrades === null)
        {
            throw new SerializationError('lockerUpgrades must be provided.');
        }
        $writer->addChar($data->lockerUpgrades);


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
            $data->goldAmount = $reader->getInt();
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
        return "LockerBuyServerPacket(byteSize=' . $this->byteSize . '', goldAmount=' . $this->goldAmount . '', lockerUpgrades=' . $this->lockerUpgrades . ')";
    }

}



