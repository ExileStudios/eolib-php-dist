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
use Eolib\Protocol\Generated\Net\server\CharacterStatsUpdate;
use Eolib\Protocol\SerializationError;

/**
 * Response to spending stat points
 */


class StatSkillPlayerServerPacket
{
    private $byteSize = 0;
    private int $statPoints;
    private CharacterStatsUpdate $stats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }

    public function getStats(): CharacterStatsUpdate
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsUpdate $stats): void
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
        if ($data->statPoints === null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->statPoints);

        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsUpdate::serialize($writer, $data->stats);


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
            $data->statPoints = $reader->getShort();
            $data->stats = CharacterStatsUpdate::deserialize($reader);

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
        return "StatSkillPlayerServerPacket(byteSize=' . $this->byteSize . '', statPoints=' . $this->statPoints . '', stats=' . $this->stats . ')";
    }

}



