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
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby player hit by a heal spell from a player
 */


class SpellTargetOtherServerPacket
{
    private $byteSize = 0;
    private int $victimId;
    private int $casterId;
    private int $casterDirection;
    private int $spellId;
    private int $spellHealHp;
    private int $hpPercentage;
    private ?int $hp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getVictimId(): int
    {
        return $this->victimId;
    }

    public function setVictimId(int $victimId): void
    {
        $this->victimId = $victimId;
    }

    public function getCasterId(): int
    {
        return $this->casterId;
    }

    public function setCasterId(int $casterId): void
    {
        $this->casterId = $casterId;
    }

    public function getCasterDirection(): int
    {
        return $this->casterDirection;
    }

    public function setCasterDirection(int $casterDirection): void
    {
        $this->casterDirection = $casterDirection;
    }

    public function getSpellId(): int
    {
        return $this->spellId;
    }

    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }

    public function getSpellHealHp(): int
    {
        return $this->spellHealHp;
    }

    public function setSpellHealHp(int $spellHealHp): void
    {
        $this->spellHealHp = $spellHealHp;
    }

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(?int $hp): void
    {
        $this->hp = $hp;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SPELL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::TARGETOTHER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellTargetOtherServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellTargetOtherServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellTargetOtherServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellTargetOtherServerPacket $data): void {
        if ($data->victimId === null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->victimId);

        if ($data->casterId === null)
        {
            throw new SerializationError('casterId must be provided.');
        }
        $writer->addShort($data->casterId);

        if ($data->casterDirection === null)
        {
            throw new SerializationError('casterDirection must be provided.');
        }
        $writer->addChar((int) $data->casterDirection);

        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);

        if ($data->spellHealHp === null)
        {
            throw new SerializationError('spellHealHp must be provided.');
        }
        $writer->addInt($data->spellHealHp);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);

        $reachedMissingOptional = $data->hp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->hp);

        }

    }

    /**
     * Deserializes an instance of `SpellTargetOtherServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellTargetOtherServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellTargetOtherServerPacket
    {
        $data = new SpellTargetOtherServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->victimId = $reader->getShort();
            $data->casterId = $reader->getShort();
            $data->casterDirection = Direction($reader->getChar());
            $data->spellId = $reader->getShort();
            $data->spellHealHp = $reader->getInt();
            $data->hpPercentage = $reader->getChar();
            if ($reader->remaining() > 0)
            {
                $data->hp = $reader->getShort();
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
        return "SpellTargetOtherServerPacket(byteSize=' . $this->byteSize . '', victimId=' . $this->victimId . '', casterId=' . $this->casterId . '', casterDirection=' . $this->casterDirection . '', spellId=' . $this->spellId . '', spellHealHp=' . $this->spellHealHp . '', hpPercentage=' . $this->hpPercentage . '', hp=' . $this->hp . ')";
    }

}



