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
use typing\cast;

/**
 * Nearby player self-casted a spell
 */


class SpellTargetSelfServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $spellId;
    private int $spellHealHp;
    private int $hpPercentage;
    private ?int $hp;
    private ?int $tp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
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

    public function getTp(): ?int
    {
        return $this->tp;
    }

    public function setTp(?int $tp): void
    {
        $this->tp = $tp;
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
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

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
        $reachedMissingOptional = $reachedMissingOptional || $data->tp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->tp);

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
            $data->playerId = $reader->getShort();
            $data->spellId = $reader->getShort();
            $data->spellHealHp = $reader->getInt();
            $data->hpPercentage = $reader->getChar();
            if ($reader->remaining() > 0)
            {
                $data->hp = $reader->getShort();
            }
            if ($reader->remaining() > 0)
            {
                $data->tp = $reader->getShort();
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
        return "SpellTargetSelfServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', spellId=' . $this->spellId . '', spellHealHp=' . $this->spellHealHp . '', hpPercentage=' . $this->hpPercentage . '', hp=' . $this->hp . '', tp=' . $this->tp . ')";
    }

}



