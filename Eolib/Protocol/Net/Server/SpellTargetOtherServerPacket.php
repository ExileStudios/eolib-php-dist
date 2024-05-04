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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby player hit by a heal spell from a player
 */


class SpellTargetOtherServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $victimId;
    /** @var int */
    private int $casterId;
    /** @var int */
    private int $casterDirection;
    /** @var int */
    private int $spellId;
    /** @var int */
    private int $spellHealHp;
    /** @var int */
    private int $hpPercentage;
    /** @var int */
    private ?int $hp;

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
    public function getVictimId(): int
    {
        return $this->victimId;
    }

    /** @param int $victimId */
    public function setVictimId(int $victimId): void
    {
        $this->victimId = $victimId;
    }



    /** @return int */
    public function getCasterId(): int
    {
        return $this->casterId;
    }

    /** @param int $casterId */
    public function setCasterId(int $casterId): void
    {
        $this->casterId = $casterId;
    }



    /** @return int */
    public function getCasterDirection(): int
    {
        return $this->casterDirection;
    }

    /** @param int $casterDirection */
    public function setCasterDirection(int $casterDirection): void
    {
        $this->casterDirection = $casterDirection;
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



    /** @return int */
    public function getSpellHealHp(): int
    {
        return $this->spellHealHp;
    }

    /** @param int $spellHealHp */
    public function setSpellHealHp(int $spellHealHp): void
    {
        $this->spellHealHp = $spellHealHp;
    }



    /** @return int */
    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    /** @param int $hpPercentage */
    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }



    /** @return int */
    public function getHp(): ?int
    {
        return $this->hp;
    }

    /** @param int $hp */
    public function setHp(?int $hp): void
    {
        $this->hp = $hp;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SPELL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getVictimId() == null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->getVictimId());

        if ($data->getCasterId() == null)
        {
            throw new SerializationError('casterId must be provided.');
        }
        $writer->addShort($data->getCasterId());

        if ($data->getCasterDirection() == null)
        {
            throw new SerializationError('casterDirection must be provided.');
        }
        $writer->addChar((int) $data->getCasterDirection());

        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());

        if ($data->getSpellHealHp() == null)
        {
            throw new SerializationError('spellHealHp must be provided.');
        }
        $writer->addInt($data->getSpellHealHp());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());

        $reachedMissingOptional = $data->hp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->getHp());

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
            $data->setVictimId($reader->getShort());
            $data->setCasterId($reader->getShort());
            $data->setCasterDirection($reader->getChar());
            $data->setSpellId($reader->getShort());
            $data->setSpellHealHp($reader->getInt());
            $data->setHpPercentage($reader->getChar());
            if ($reader->getRemaining() > 0)
            {
                $data->setHp($reader->getShort());
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
        return "SpellTargetOtherServerPacket(byteSize=$this->byteSize, victimId=".var_export($this->victimId, true).", casterId=".var_export($this->casterId, true).", casterDirection=".var_export($this->casterDirection, true).", spellId=".var_export($this->spellId, true).", spellHealHp=".var_export($this->spellHealHp, true).", hpPercentage=".var_export($this->hpPercentage, true).", hp=".var_export($this->hp, true).")";
    }

}



