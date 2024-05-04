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
use Eolib\Protocol\Net\Server\AvatarChange;
use Eolib\Protocol\SerializationError;

/**
 * Purchasing a new hair style
 */


class BarberAgreeServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $goldAmount;
    /** @var AvatarChange */
    private AvatarChange $change;

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



    /** @return AvatarChange */
    public function getChange(): AvatarChange
    {
        return $this->change;
    }

    /** @param AvatarChange $change */
    public function setChange(AvatarChange $change): void
    {
        $this->change = $change;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BARBER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        BarberAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BarberAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BarberAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BarberAgreeServerPacket $data): void {
        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());

        if ($data->getChange() == null)
        {
            throw new SerializationError('change must be provided.');
        }
        AvatarChange::serialize($writer, $data->getChange());


    }

    /**
     * Deserializes an instance of `BarberAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BarberAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BarberAgreeServerPacket
    {
        $data = new BarberAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setGoldAmount($reader->getInt());
            $data->setChange(AvatarChange::deserialize($reader));

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
        return "BarberAgreeServerPacket(byteSize=$this->byteSize, goldAmount=".var_export($this->goldAmount, true).", change=".var_export($this->change, true).")";
    }

}



