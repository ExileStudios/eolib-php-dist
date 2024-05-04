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
use Eolib\Protocol\Net\Server\LevelUpStats;
use Eolib\Protocol\Net\Server\NpcKilledData;
use Eolib\Protocol\SerializationError;

/**
 * Nearby NPC killed by player spell and you leveled up
 */


class CastAcceptServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $spellId;
    /** @var NpcKilledData */
    private NpcKilledData $npcKilledData;
    /** @var int */
    private int $casterTp;
    /** @var int */
    private int $experience;
    /** @var LevelUpStats */
    private LevelUpStats $levelUp;

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
    public function getSpellId(): int
    {
        return $this->spellId;
    }

    /** @param int $spellId */
    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }



    /** @return NpcKilledData */
    public function getNpcKilledData(): NpcKilledData
    {
        return $this->npcKilledData;
    }

    /** @param NpcKilledData $npcKilledData */
    public function setNpcKilledData(NpcKilledData $npcKilledData): void
    {
        $this->npcKilledData = $npcKilledData;
    }



    /** @return int */
    public function getCasterTp(): int
    {
        return $this->casterTp;
    }

    /** @param int $casterTp */
    public function setCasterTp(int $casterTp): void
    {
        $this->casterTp = $casterTp;
    }



    /** @return int */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /** @param int $experience */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }



    /** @return LevelUpStats */
    public function getLevelUp(): LevelUpStats
    {
        return $this->levelUp;
    }

    /** @param LevelUpStats $levelUp */
    public function setLevelUp(LevelUpStats $levelUp): void
    {
        $this->levelUp = $levelUp;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CAST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        CastAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CastAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CastAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CastAcceptServerPacket $data): void {
        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());

        if ($data->getNpcKilledData() == null)
        {
            throw new SerializationError('npcKilledData must be provided.');
        }
        NpcKilledData::serialize($writer, $data->getNpcKilledData());

        if ($data->getCasterTp() == null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->getCasterTp());

        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->getExperience());

        if ($data->getLevelUp() == null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        LevelUpStats::serialize($writer, $data->getLevelUp());


    }

    /**
     * Deserializes an instance of `CastAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CastAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CastAcceptServerPacket
    {
        $data = new CastAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSpellId($reader->getShort());
            $data->setNpcKilledData(NpcKilledData::deserialize($reader));
            $data->setCasterTp($reader->getShort());
            $data->setExperience($reader->getInt());
            $data->setLevelUp(LevelUpStats::deserialize($reader));

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
        return "CastAcceptServerPacket(byteSize=$this->byteSize, spellId=".var_export($this->spellId, true).", npcKilledData=".var_export($this->npcKilledData, true).", casterTp=".var_export($this->casterTp, true).", experience=".var_export($this->experience, true).", levelUp=".var_export($this->levelUp, true).")";
    }

}



