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
use Eolib\Protocol\Net\Server\NearbyInfo;
use Eolib\Protocol\SerializationError;

/**
 * Reply to request for new info about nearby objects
 */


class RefreshReplyServerPacket
{
    private int $byteSize = 0;
    /** @var NearbyInfo */
    private NearbyInfo $nearby;

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

    /** @return NearbyInfo */
    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

    /** @param NearbyInfo $nearby */
    public function setNearby(NearbyInfo $nearby): void
    {
        $this->nearby = $nearby;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::REFRESH;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        RefreshReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RefreshReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RefreshReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RefreshReplyServerPacket $data): void {
        if ($data->getNearby() == null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->getNearby());


    }

    /**
     * Deserializes an instance of `RefreshReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RefreshReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RefreshReplyServerPacket
    {
        $data = new RefreshReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNearby(NearbyInfo::deserialize($reader));

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
        return "RefreshReplyServerPacket(byteSize=$this->byteSize, nearby=".var_export($this->nearby, true).")";
    }

}



