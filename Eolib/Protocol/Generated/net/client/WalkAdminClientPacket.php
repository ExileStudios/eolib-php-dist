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
use Eolib\Protocol\Generated\Net\client\WalkAction;
use Eolib\Protocol\SerializationError;

/**
 * Walking with #nowall
 */


class WalkAdminClientPacket
{
    private $byteSize = 0;
    private WalkAction $walkAction;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getWalkAction(): WalkAction
    {
        return $this->walkAction;
    }

    public function setWalkAction(WalkAction $walkAction): void
    {
        $this->walkAction = $walkAction;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WALK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ADMIN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WalkAdminClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WalkAdminClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WalkAdminClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WalkAdminClientPacket $data): void {
        if ($data->walkAction === null)
        {
            throw new SerializationError('walkAction must be provided.');
        }
        WalkAction::serialize($writer, $data->walkAction);


    }

    /**
     * Deserializes an instance of `WalkAdminClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WalkAdminClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WalkAdminClientPacket
    {
        $data = new WalkAdminClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->walkAction = WalkAction::deserialize($reader);

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
        return "WalkAdminClientPacket(byteSize=' . $this->byteSize . '', walkAction=' . $this->walkAction . ')";
    }

}



