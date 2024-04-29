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
use Eolib\Protocol\Generated\Net\server\CharacterStatsReset;
use Eolib\Protocol\SerializationError;

/**
 * Response to resetting stats and skills at a skill master
 */


class StatSkillJunkServerPacket
{
    private $byteSize = 0;
    private CharacterStatsReset $stats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getStats(): CharacterStatsReset
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsReset $stats): void
    {
        $this->stats = $stats;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::STATSKILL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::JUNK;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillJunkServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillJunkServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillJunkServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillJunkServerPacket $data): void {
        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsReset::serialize($writer, $data->stats);


    }

    /**
     * Deserializes an instance of `StatSkillJunkServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillJunkServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillJunkServerPacket
    {
        $data = new StatSkillJunkServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->stats = CharacterStatsReset::deserialize($reader);

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
        return "StatSkillJunkServerPacket(byteSize=' . $this->byteSize . '', stats=' . $this->stats . ')";
    }

}



