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
use Eolib\Protocol\Net\Server\NpcKilledData;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby NPC killed by player
 */


class NpcSpecServerPacket
{
    private int $byteSize = 0;
    /** @var NpcKilledData */
    private NpcKilledData $npcKilledData;
    /** @var int */
    private ?int $experience;

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
    public function getExperience(): ?int
    {
        return $this->experience;
    }

    /** @param int $experience */
    public function setExperience(?int $experience): void
    {
        $this->experience = $experience;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPC;
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
        NpcSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcSpecServerPacket $data): void {
        if ($data->getNpcKilledData() == null)
        {
            throw new SerializationError('npcKilledData must be provided.');
        }
        NpcKilledData::serialize($writer, $data->getNpcKilledData());

        $reachedMissingOptional = $data->experience === null;
        if (!$reachedMissingOptional)
        {
            $writer->addInt($data->getExperience());

        }

    }

    /**
     * Deserializes an instance of `NpcSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcSpecServerPacket
    {
        $data = new NpcSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcKilledData(NpcKilledData::deserialize($reader));
            if ($reader->getRemaining() > 0)
            {
                $data->setExperience($reader->getInt());
            }

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
        return "NpcSpecServerPacket(byteSize=$this->byteSize, npcKilledData=".var_export($this->npcKilledData, true).", experience=".var_export($this->experience, true).")";
    }

}



