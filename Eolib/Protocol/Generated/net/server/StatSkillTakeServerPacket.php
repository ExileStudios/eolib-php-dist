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
use Eolib\Protocol\SerializationError;

/**
 * Response from learning a skill from a skill master
 */


class StatSkillTakeServerPacket
{
    private $byteSize = 0;
    private int $spellId;
    private int $goldAmount;

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

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
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
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillTakeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillTakeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillTakeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillTakeServerPacket $data): void {
        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);

        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);


    }

    /**
     * Deserializes an instance of `StatSkillTakeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillTakeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillTakeServerPacket
    {
        $data = new StatSkillTakeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->spellId = $reader->getShort();
            $data->goldAmount = $reader->getInt();

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
        return "StatSkillTakeServerPacket(byteSize=' . $this->byteSize . '', spellId=' . $this->spellId . '', goldAmount=' . $this->goldAmount . ')";
    }

}



