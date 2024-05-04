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
use Eolib\Protocol\Net\Server\CharacterStatsReset;
use Eolib\Protocol\SerializationError;

/**
 * Response to resetting stats and skills at a skill master
 */


class StatSkillJunkServerPacket
{
    private int $byteSize = 0;
    /** @var CharacterStatsReset */
    private CharacterStatsReset $stats;

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

    /** @return CharacterStatsReset */
    public function getStats(): CharacterStatsReset
    {
        return $this->stats;
    }

    /** @param CharacterStatsReset $stats */
    public function setStats(CharacterStatsReset $stats): void
    {
        $this->stats = $stats;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::STATSKILL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsReset::serialize($writer, $data->getStats());


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
            $data->setStats(CharacterStatsReset::deserialize($reader));

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
        return "StatSkillJunkServerPacket(byteSize=$this->byteSize, stats=".var_export($this->stats, true).")";
    }

}



