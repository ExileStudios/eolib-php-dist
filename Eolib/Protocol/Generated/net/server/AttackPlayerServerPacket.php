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
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Nearby player attacking
 */


class AttackPlayerServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $direction;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ATTACK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        AttackPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AttackPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AttackPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AttackPlayerServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);


    }

    /**
     * Deserializes an instance of `AttackPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AttackPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AttackPlayerServerPacket
    {
        $data = new AttackPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->direction = Direction($reader->getChar());

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
        return "AttackPlayerServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', direction=' . $this->direction . ')";
    }

}



