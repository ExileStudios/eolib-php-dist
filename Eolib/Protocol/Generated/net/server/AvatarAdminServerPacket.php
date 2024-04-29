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

/**
 * Nearby player hit by a damage spell from a player
 */


class AvatarAdminServerPacket
{
    private $byteSize = 0;
    private int $casterId;
    private int $victimId;
    private int $damage;
    private int $casterDirection;
    private int $hpPercentage;
    private bool $victimDied;
    private int $spellId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCasterId(): int
    {
        return $this->casterId;
    }

    public function setCasterId(int $casterId): void
    {
        $this->casterId = $casterId;
    }

    public function getVictimId(): int
    {
        return $this->victimId;
    }

    public function setVictimId(int $victimId): void
    {
        $this->victimId = $victimId;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    public function getCasterDirection(): int
    {
        return $this->casterDirection;
    }

    public function setCasterDirection(int $casterDirection): void
    {
        $this->casterDirection = $casterDirection;
    }

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }

    public function getVictimDied(): bool
    {
        return $this->victimDied;
    }

    public function setVictimDied(bool $victimDied): void
    {
        $this->victimDied = $victimDied;
    }

    public function getSpellId(): int
    {
        return $this->spellId;
    }

    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::AVATAR;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->casterId === null)
        {
            throw new SerializationError('casterId must be provided.');
        }
        $writer->addShort($data->casterId);

        if ($data->victimId === null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->victimId);

        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->damage);

        if ($data->casterDirection === null)
        {
            throw new SerializationError('casterDirection must be provided.');
        }
        $writer->addChar((int) $data->casterDirection);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);

        if ($data->victimDied === null)
        {
            throw new SerializationError('victimDied must be provided.');
        }
        $writer->addChar($data->victimDied ? 1 : 0);

        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);


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
            $data->casterId = $reader->getShort();
            $data->victimId = $reader->getShort();
            $data->damage = $reader->getThree();
            $data->casterDirection = Direction($reader->getChar());
            $data->hpPercentage = $reader->getChar();
            $data->victimDied = $reader->getChar() !== 0;
            $data->spellId = $reader->getShort();

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
        return "AvatarAdminServerPacket(byteSize=' . $this->byteSize . '', casterId=' . $this->casterId . '', victimId=' . $this->victimId . '', damage=' . $this->damage . '', casterDirection=' . $this->casterDirection . '', hpPercentage=' . $this->hpPercentage . '', victimDied=' . $this->victimDied . '', spellId=' . $this->spellId . ')";
    }

}



