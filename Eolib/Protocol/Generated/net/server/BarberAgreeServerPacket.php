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
use Eolib\Protocol\Generated\Net\server\AvatarChange;
use Eolib\Protocol\SerializationError;

/**
 * Purchasing a new hair style
 */


class BarberAgreeServerPacket
{
    private $byteSize = 0;
    private int $goldAmount;
    private AvatarChange $change;

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

    public function getChange(): AvatarChange
    {
        return $this->change;
    }

    public function setChange(AvatarChange $change): void
    {
        $this->change = $change;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BARBER;
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
        BarberAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BarberAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BarberAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BarberAgreeServerPacket $data): void {
        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);

        if ($data->change === null)
        {
            throw new SerializationError('change must be provided.');
        }
        AvatarChange::serialize($writer, $data->change);


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
            $data->goldAmount = $reader->getInt();
            $data->change = AvatarChange::deserialize($reader);

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
        return "BarberAgreeServerPacket(byteSize=' . $this->byteSize . '', goldAmount=' . $this->goldAmount . '', change=' . $this->change . ')";
    }

}



