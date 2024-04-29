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
use Eolib\Protocol\Generated\Net\Spell;
use Eolib\Protocol\SerializationError;

/**
 * Response to spending skill points
 */


class StatSkillAcceptServerPacket
{
    private $byteSize = 0;
    private int $skillPoints;
    private Spell $spell;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }

    public function getSpell(): Spell
    {
        return $this->spell;
    }

    public function setSpell(Spell $spell): void
    {
        $this->spell = $spell;
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
        if ($data->skillPoints === null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->skillPoints);

        if ($data->spell === null)
        {
            throw new SerializationError('spell must be provided.');
        }
        Spell::serialize($writer, $data->spell);


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
            $data->skillPoints = $reader->getShort();
            $data->spell = Spell::deserialize($reader);

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
        return "StatSkillAcceptServerPacket(byteSize=' . $this->byteSize . '', skillPoints=' . $this->skillPoints . '', spell=' . $this->spell . ')";
    }

}



