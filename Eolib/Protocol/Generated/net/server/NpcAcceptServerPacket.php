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
use Eolib\Protocol\Generated\Net\server\LevelUpStats;
use Eolib\Protocol\Generated\Net\server\NpcKilledData;
use Eolib\Protocol\SerializationError;

/**
 * Nearby NPC killed by player and you leveled up
 */


class NpcAcceptServerPacket
{
    private $byteSize = 0;
    private NpcKilledData $npcKilledData;
    private int $experience;
    private LevelUpStats $levelUp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcKilledData(): NpcKilledData
    {
        return $this->npcKilledData;
    }

    public function setNpcKilledData(NpcKilledData $npcKilledData): void
    {
        $this->npcKilledData = $npcKilledData;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function getLevelUp(): LevelUpStats
    {
        return $this->levelUp;
    }

    public function setLevelUp(LevelUpStats $levelUp): void
    {
        $this->levelUp = $levelUp;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        NpcAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcAcceptServerPacket $data): void {
        if ($data->npcKilledData === null)
        {
            throw new SerializationError('npcKilledData must be provided.');
        }
        NpcKilledData::serialize($writer, $data->npcKilledData);

        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->experience);

        if ($data->levelUp === null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        LevelUpStats::serialize($writer, $data->levelUp);


    }

    /**
     * Deserializes an instance of `NpcAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcAcceptServerPacket
    {
        $data = new NpcAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->npcKilledData = NpcKilledData::deserialize($reader);
            $data->experience = $reader->getInt();
            $data->levelUp = LevelUpStats::deserialize($reader);

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
        return "NpcAcceptServerPacket(byteSize=' . $this->byteSize . '', npcKilledData=' . $this->npcKilledData . '', experience=' . $this->experience . '', levelUp=' . $this->levelUp . ')";
    }

}



