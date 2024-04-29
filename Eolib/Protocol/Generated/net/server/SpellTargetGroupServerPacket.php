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
use Eolib\Protocol\Generated\Net\server\GroupHealTargetPlayer;
use Eolib\Protocol\SerializationError;

/**
 * Nearby player(s) hit by a group heal spell from a player
 */


class SpellTargetGroupServerPacket
{
    private $byteSize = 0;
    private int $spellId;
    private int $casterId;
    private int $casterTp;
    private int $spellHealHp;
    private array $players;

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

    public function getCasterTp(): int
    {
        return $this->casterTp;
    }

    public function setCasterTp(int $casterTp): void
    {
        $this->casterTp = $casterTp;
    }

    public function getSpellHealHp(): int
    {
        return $this->spellHealHp;
    }

    public function setSpellHealHp(int $spellHealHp): void
    {
        $this->spellHealHp = $spellHealHp;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function setPlayers(array $players): void
    {
        $this->players = $players;
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

        if ($data->casterTp === null)
        {
            throw new SerializationError('casterTp must be provided.');
        }
        $writer->addShort($data->casterTp);

        if ($data->spellHealHp === null)
        {
            throw new SerializationError('spellHealHp must be provided.');
        }
        $writer->addShort($data->spellHealHp);

        if ($data->players === null)
        {
            throw new SerializationError('players must be provided.');
        }
        for ($i = 0; $i < count($data->players); $i++)
        {
            GroupHealTargetPlayer::serialize($writer, $data->players[$i]);

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
            $data->spellId = $reader->getShort();
            $data->casterId = $reader->getShort();
            $data->casterTp = $reader->getShort();
            $data->spellHealHp = $reader->getShort();
            $players_length = (int) $reader->remaining() / 5;
            $data->players = [];
            for ($i = 0; $i < $players_length; $i++)
            {
                $data->players[] = GroupHealTargetPlayer::deserialize($reader);
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
        return "SpellTargetGroupServerPacket(byteSize=' . $this->byteSize . '', spellId=' . $this->spellId . '', casterId=' . $this->casterId . '', casterTp=' . $this->casterTp . '', spellHealHp=' . $this->spellHealHp . '', players=' . $this->players . ')";
    }

}



