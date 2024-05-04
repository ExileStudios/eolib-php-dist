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
use Eolib\Protocol\Net\Server\GroupHealTargetPlayer;
use Eolib\Protocol\SerializationError;

/**
 * Nearby player(s) hit by a group heal spell from a player
 */


class SpellTargetGroupServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $spellId;
    /** @var int */
    private int $casterId;
    /** @var int */
    private int $casterTp;
    /** @var int */
    private int $spellHealHp;
    /** @var GroupHealTargetPlayer[] */
    public array $players = [];

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
    public function getSpellHealHp(): int
    {
        return $this->spellHealHp;
    }

    /** @param int $spellHealHp */
    public function setSpellHealHp(int $spellHealHp): void
    {
        $this->spellHealHp = $spellHealHp;
    }



    /** @return GroupHealTargetPlayer[] */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /** @param GroupHealTargetPlayer[] $players */
    public function setPlayers(array $players): void
    {
        $this->players = $players;
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
        return PacketAction::TARGETGROUP;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellTargetGroupServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellTargetGroupServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellTargetGroupServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellTargetGroupServerPacket $data): void {
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

        if ($data->getCasterTp() == null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->getCasterTp());

        if ($data->getSpellHealHp() == null)
        {
            throw new SerializationError('spellHealHp must be provided.');
        }
        $writer->addShort($data->getSpellHealHp());

        if ($data->getPlayers() == null)
        {
            throw new SerializationError('players must be provided.');
        }
        for ($i = 0; $i < count($data->players); $i++)
        {
            GroupHealTargetPlayer::serialize($writer, $data->getPlayers()[$i]);

        }

    }

    /**
     * Deserializes an instance of `SpellTargetGroupServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellTargetGroupServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellTargetGroupServerPacket
    {
        $data = new SpellTargetGroupServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSpellId($reader->getShort());
            $data->setCasterId($reader->getShort());
            $data->setCasterTp($reader->getShort());
            $data->setSpellHealHp($reader->getShort());
            $players_length = (int) $reader->getRemaining() / 5;
            $data->players = [];
            for ($i = 0; $i < $players_length; $i++)
            {
                $data->players[] = GroupHealTargetPlayer::deserialize($reader);
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
        return "SpellTargetGroupServerPacket(byteSize=$this->byteSize, spellId=".var_export($this->spellId, true).", casterId=".var_export($this->casterId, true).", casterTp=".var_export($this->casterTp, true).", spellHealHp=".var_export($this->spellHealHp, true).", players=".var_export($this->players, true).")";
    }

}



