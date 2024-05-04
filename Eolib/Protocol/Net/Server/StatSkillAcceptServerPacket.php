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
use Eolib\Protocol\Net\Spell;
use Eolib\Protocol\SerializationError;

/**
 * Response to spending skill points
 */


class StatSkillAcceptServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $skillPoints;
    /** @var Spell */
    private Spell $spell;

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
    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    /** @param int $skillPoints */
    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }



    /** @return Spell */
    public function getSpell(): Spell
    {
        return $this->spell;
    }

    /** @param Spell $spell */
    public function setSpell(Spell $spell): void
    {
        $this->spell = $spell;
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
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillAcceptServerPacket $data): void {
        if ($data->getSkillPoints() == null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->getSkillPoints());

        if ($data->getSpell() == null)
        {
            throw new SerializationError('spell must be provided.');
        }
        Spell::serialize($writer, $data->getSpell());


    }

    /**
     * Deserializes an instance of `StatSkillAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillAcceptServerPacket
    {
        $data = new StatSkillAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSkillPoints($reader->getShort());
            $data->setSpell(Spell::deserialize($reader));

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
        return "StatSkillAcceptServerPacket(byteSize=$this->byteSize, skillPoints=".var_export($this->skillPoints, true).", spell=".var_export($this->spell, true).")";
    }

}



