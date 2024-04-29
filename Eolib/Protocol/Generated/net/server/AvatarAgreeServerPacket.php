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
 * Nearby player changed appearance
 */


class AvatarAgreeServerPacket
{
    private $byteSize = 0;
    private AvatarChange $change;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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
        return PacketFamily::AVATAR;
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
        AvatarAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AvatarAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AvatarAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AvatarAgreeServerPacket $data): void {
        if ($data->change === null)
        {
            throw new SerializationError('change must be provided.');
        }
        AvatarChange::serialize($writer, $data->change);


    }

    /**
     * Deserializes an instance of `AvatarAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AvatarAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AvatarAgreeServerPacket
    {
        $data = new AvatarAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
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
        return "AvatarAgreeServerPacket(byteSize=' . $this->byteSize . '', change=' . $this->change . ')";
    }

}



