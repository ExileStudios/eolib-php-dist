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
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby player self-casted a spell
 */


class SpellTargetSelfServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $spellId;
    /** @var int */
    private int $spellHealHp;
    /** @var int */
    private int $hpPercentage;
    /** @var int */
    private ?int $hp;
    /** @var int */
    private ?int $tp;

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
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



    /** @return int */
    public function getTp(): ?int
    {
        return $this->tp;
    }

    /** @param int $tp */
    public function setTp(?int $tp): void
    {
        $this->tp = $tp;
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
        return PacketAction::TARGETSELF;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellTargetSelfServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellTargetSelfServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellTargetSelfServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellTargetSelfServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

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
        $reachedMissingOptional = $reachedMissingOptional || $data->tp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->getTp());

        }

    }

    /**
     * Deserializes an instance of `SpellTargetSelfServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellTargetSelfServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellTargetSelfServerPacket
    {
        $data = new SpellTargetSelfServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setSpellId($reader->getShort());
            $data->setSpellHealHp($reader->getInt());
            $data->setHpPercentage($reader->getChar());
            if ($reader->getRemaining() > 0)
            {
                $data->setHp($reader->getShort());
            }
            if ($reader->getRemaining() > 0)
            {
                $data->setTp($reader->getShort());
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
        return "SpellTargetSelfServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", spellId=".var_export($this->spellId, true).", spellHealHp=".var_export($this->spellHealHp, true).", hpPercentage=".var_export($this->hpPercentage, true).", hp=".var_export($this->hp, true).", tp=".var_export($this->tp, true).")";
    }

}



