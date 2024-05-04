<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\Client\WalkAction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Walking through a player
 */


class WalkSpecClientPacket
{
    private int $byteSize = 0;
    /** @var WalkAction */
    private WalkAction $walkAction;

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

    /** @return WalkAction */
    public function getWalkAction(): WalkAction
    {
        return $this->walkAction;
    }

    /** @param WalkAction $walkAction */
    public function setWalkAction(WalkAction $walkAction): void
    {
        $this->walkAction = $walkAction;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WALK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::SPEC;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WalkSpecClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WalkSpecClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WalkSpecClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WalkSpecClientPacket $data): void {
        if ($data->getWalkAction() == null)
        {
            throw new SerializationError('walkAction must be provided.');
        }
        WalkAction::serialize($writer, $data->getWalkAction());


    }

    /**
     * Deserializes an instance of `WalkSpecClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WalkSpecClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WalkSpecClientPacket
    {
        $data = new WalkSpecClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setWalkAction(WalkAction::deserialize($reader));

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
        return "WalkSpecClientPacket(byteSize=$this->byteSize, walkAction=".var_export($this->walkAction, true).")";
    }

}



