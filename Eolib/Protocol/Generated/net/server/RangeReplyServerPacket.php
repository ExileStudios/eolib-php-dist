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
use Eolib\Protocol\Generated\Net\server\NearbyInfo;
use Eolib\Protocol\SerializationError;

/**
 * Reply to request for information about nearby players and NPCs
 */


class RangeReplyServerPacket
{
    private $byteSize = 0;
    private NearbyInfo $nearby;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

    public function setNearby(NearbyInfo $nearby): void
    {
        $this->nearby = $nearby;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RANGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        RangeReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RangeReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RangeReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RangeReplyServerPacket $data): void {
        if ($data->nearby === null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->nearby);


    }

    /**
     * Deserializes an instance of `RangeReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RangeReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RangeReplyServerPacket
    {
        $data = new RangeReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->nearby = NearbyInfo::deserialize($reader);

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
        return "RangeReplyServerPacket(byteSize=' . $this->byteSize . '', nearby=' . $this->nearby . ')";
    }

}



