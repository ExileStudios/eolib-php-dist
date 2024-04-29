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
use Eolib\Protocol\Generated\Net\server\NpcKilledData;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby NPC killed by player spell
 */


class CastSpecServerPacket
{
    private $byteSize = 0;
    private int $spellId;
    private NpcKilledData $npcKilledData;
    private int $casterTp;
    private ?int $experience;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSpellId(): int
    {
        return $this->spellId;
    }

    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }

    public function getNpcKilledData(): NpcKilledData
    {
        return $this->npcKilledData;
    }

    public function setNpcKilledData(NpcKilledData $npcKilledData): void
    {
        $this->npcKilledData = $npcKilledData;
    }

    public function getCasterTp(): int
    {
        return $this->casterTp;
    }

    public function setCasterTp(int $casterTp): void
    {
        $this->casterTp = $casterTp;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CAST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        CastSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CastSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CastSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CastSpecServerPacket $data): void {
        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);

        if ($data->npcKilledData === null)
        {
            throw new SerializationError('npcKilledData must be provided.');
        }
        NpcKilledData::serialize($writer, $data->npcKilledData);

        if ($data->casterTp === null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->casterTp);

        $reachedMissingOptional = $data->experience === null;
        if (!$reachedMissingOptional)
        {
            $writer->addInt($data->experience);

        }

    }

    /**
     * Deserializes an instance of `CastSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CastSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CastSpecServerPacket
    {
        $data = new CastSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->spellId = $reader->getShort();
            $data->npcKilledData = NpcKilledData::deserialize($reader);
            $data->casterTp = $reader->getShort();
            if ($reader->remaining() > 0)
            {
                $data->experience = $reader->getInt();
            }

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
        return "CastSpecServerPacket(byteSize=' . $this->byteSize . '', spellId=' . $this->spellId . '', npcKilledData=' . $this->npcKilledData . '', casterTp=' . $this->casterTp . '', experience=' . $this->experience . ')";
    }

}



