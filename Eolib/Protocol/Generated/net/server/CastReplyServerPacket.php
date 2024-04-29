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
use Eolib\Protocol\Generated\Net\server\NpcKillStealProtectionState;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby NPC hit by a spell from a player
 */


class CastReplyServerPacket
{
    private $byteSize = 0;
    private int $spellId;
    private int $casterId;
    private int $casterDirection;
    private int $npcIndex;
    private int $damage;
    private int $hpPercentage;
    private int $casterTp;
    private ?int $killStealProtection;

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

    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }

    public function getCasterTp(): int
    {
        return $this->casterTp;
    }

    public function setCasterTp(int $casterTp): void
    {
        $this->casterTp = $casterTp;
    }

    public function getKillStealProtection(): ?int
    {
        return $this->killStealProtection;
    }

    public function setKillStealProtection(?int $killStealProtection): void
    {
        $this->killStealProtection = $killStealProtection;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CAST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);

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

        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->npcIndex);

        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->damage);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addShort($data->hpPercentage);

        if ($data->casterTp === null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->casterTp);

        $reachedMissingOptional = $data->killStealProtection === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->killStealProtection);

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
            $data->spellId = $reader->getShort();
            $data->casterId = $reader->getShort();
            $data->casterDirection = Direction($reader->getChar());
            $data->npcIndex = $reader->getShort();
            $data->damage = $reader->getThree();
            $data->hpPercentage = $reader->getShort();
            $data->casterTp = $reader->getShort();
            if ($reader->remaining() > 0)
            {
                $data->killStealProtection = NpcKillStealProtectionState($reader->getChar());
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
        return "CastReplyServerPacket(byteSize=' . $this->byteSize . '', spellId=' . $this->spellId . '', casterId=' . $this->casterId . '', casterDirection=' . $this->casterDirection . '', npcIndex=' . $this->npcIndex . '', damage=' . $this->damage . '', hpPercentage=' . $this->hpPercentage . '', casterTp=' . $this->casterTp . '', killStealProtection=' . $this->killStealProtection . ')";
    }

}



