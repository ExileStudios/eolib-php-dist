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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Facing a direction
 */


class FacePlayerClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $direction;

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
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::FACE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        FacePlayerClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `FacePlayerClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FacePlayerClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FacePlayerClientPacket $data): void {
        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());


    }

    /**
     * Deserializes an instance of `FacePlayerClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FacePlayerClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): FacePlayerClientPacket
    {
        $data = new FacePlayerClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setDirection($reader->getChar());

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
        return "FacePlayerClientPacket(byteSize=$this->byteSize, direction=".var_export($this->direction, true).")";
    }

}



