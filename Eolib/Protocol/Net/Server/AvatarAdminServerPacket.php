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

/**
 * Nearby player hit by a damage spell from a player
 */


class AvatarAdminServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $casterId;
    /** @var int */
    private int $victimId;
    /** @var int */
    private int $damage;
    /** @var int */
    private int $casterDirection;
    /** @var int */
    private int $hpPercentage;
    /** @var bool */
    private bool $victimDied;
    /** @var int */
    private int $spellId;

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
    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    /** @param int $hpPercentage */
    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }



    /** @return bool */
    public function getVictimDied(): bool
    {
        return $this->victimDied;
    }

    /** @param bool $victimDied */
    public function setVictimDied(bool $victimDied): void
    {
        $this->victimDied = $victimDied;
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



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::AVATAR;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ADMIN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AvatarAdminServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AvatarAdminServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AvatarAdminServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AvatarAdminServerPacket $data): void {
        if ($data->getCasterId() == null)
        {
            throw new SerializationError('casterId must be provided.');
        }
        $writer->addShort($data->getCasterId());

        if ($data->getVictimId() == null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->getVictimId());

        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->getDamage());

        if ($data->getCasterDirection() == null)
        {
            throw new SerializationError('casterDirection must be provided.');
        }
        $writer->addChar((int) $data->getCasterDirection());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());

        if ($data->getVictimDied() == null)
        {
            throw new SerializationError('victimDied must be provided.');
        }
        $writer->addChar((int) $data->getVictimDied());

        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());


    }

    /**
     * Deserializes an instance of `AvatarAdminServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AvatarAdminServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AvatarAdminServerPacket
    {
        $data = new AvatarAdminServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCasterId($reader->getShort());
            $data->setVictimId($reader->getShort());
            $data->setDamage($reader->getThree());
            $data->setCasterDirection($reader->getChar());
            $data->setHpPercentage($reader->getChar());
            $data->setVictimDied($reader->getChar() !== 0);
            $data->setSpellId($reader->getShort());

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
        return "AvatarAdminServerPacket(byteSize=$this->byteSize, casterId=".var_export($this->casterId, true).", victimId=".var_export($this->victimId, true).", damage=".var_export($this->damage, true).", casterDirection=".var_export($this->casterDirection, true).", hpPercentage=".var_export($this->hpPercentage, true).", victimDied=".var_export($this->victimDied, true).", spellId=".var_export($this->spellId, true).")";
    }

}



