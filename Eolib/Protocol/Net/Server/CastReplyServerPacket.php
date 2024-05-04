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
use Eolib\Protocol\Net\Server\NpcKillStealProtectionState;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby NPC hit by a spell from a player
 */


class CastReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $spellId;
    /** @var int */
    private int $casterId;
    /** @var int */
    private int $casterDirection;
    /** @var int */
    private int $npcIndex;
    /** @var int */
    private int $damage;
    /** @var int */
    private int $hpPercentage;
    /** @var int */
    private int $casterTp;
    /** @var int */
    private ?int $killStealProtection;

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
    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    /** @param int $npcIndex */
    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }



    /** @return int */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /** @param int $damage */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
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
    public function getKillStealProtection(): ?int
    {
        return $this->killStealProtection;
    }

    /** @param int $killStealProtection */
    public function setKillStealProtection(?int $killStealProtection): void
    {
        $this->killStealProtection = $killStealProtection;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        CastReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CastReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CastReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CastReplyServerPacket $data): void {
        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());

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

        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->getNpcIndex());

        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->getDamage());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addShort($data->getHpPercentage());

        if ($data->getCasterTp() == null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->getCasterTp());

        $reachedMissingOptional = $data->killStealProtection === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->getKillStealProtection());

        }

    }

    /**
     * Deserializes an instance of `CastReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CastReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CastReplyServerPacket
    {
        $data = new CastReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSpellId($reader->getShort());
            $data->setCasterId($reader->getShort());
            $data->setCasterDirection($reader->getChar());
            $data->setNpcIndex($reader->getShort());
            $data->setDamage($reader->getThree());
            $data->setHpPercentage($reader->getShort());
            $data->setCasterTp($reader->getShort());
            if ($reader->getRemaining() > 0)
            {
                $data->setKillStealProtection($reader->getChar());
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
        return "CastReplyServerPacket(byteSize=$this->byteSize, spellId=".var_export($this->spellId, true).", casterId=".var_export($this->casterId, true).", casterDirection=".var_export($this->casterDirection, true).", npcIndex=".var_export($this->npcIndex, true).", damage=".var_export($this->damage, true).", hpPercentage=".var_export($this->hpPercentage, true).", casterTp=".var_export($this->casterTp, true).", killStealProtection=".var_export($this->killStealProtection, true).")";
    }

}



