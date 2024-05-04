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
use Eolib\Protocol\Net\Server\CharacterStatsUpdate;
use Eolib\Protocol\SerializationError;

/**
 * Response to spending stat points
 */


class StatSkillPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $statPoints;
    /** @var CharacterStatsUpdate */
    private CharacterStatsUpdate $stats;

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
    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    /** @param int $statPoints */
    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }



    /** @return CharacterStatsUpdate */
    public function getStats(): CharacterStatsUpdate
    {
        return $this->stats;
    }

    /** @param CharacterStatsUpdate $stats */
    public function setStats(CharacterStatsUpdate $stats): void
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
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillPlayerServerPacket $data): void {
        if ($data->getStatPoints() == null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->getStatPoints());

        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsUpdate::serialize($writer, $data->getStats());


    }

    /**
     * Deserializes an instance of `StatSkillPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillPlayerServerPacket
    {
        $data = new StatSkillPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setStatPoints($reader->getShort());
            $data->setStats(CharacterStatsUpdate::deserialize($reader));

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
        return "StatSkillPlayerServerPacket(byteSize=$this->byteSize, statPoints=".var_export($this->statPoints, true).", stats=".var_export($this->stats, true).")";
    }

}



