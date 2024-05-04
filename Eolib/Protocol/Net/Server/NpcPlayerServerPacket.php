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
use Eolib\Protocol\Net\Server\NpcUpdateAttack;
use Eolib\Protocol\Net\Server\NpcUpdateChat;
use Eolib\Protocol\Net\Server\NpcUpdatePosition;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Main NPC update message
 */


class NpcPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var NpcUpdatePosition[] */
    public array $positions = [];
    /** @var NpcUpdateAttack[] */
    public array $attacks = [];
    /** @var NpcUpdateChat[] */
    public array $chats = [];
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

    /** @return NpcUpdatePosition[] */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /** @param NpcUpdatePosition[] $positions */
    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }



    /** @return NpcUpdateAttack[] */
    public function getAttacks(): array
    {
        return $this->attacks;
    }

    /** @param NpcUpdateAttack[] $attacks */
    public function setAttacks(array $attacks): void
    {
        $this->attacks = $attacks;
    }



    /** @return NpcUpdateChat[] */
    public function getChats(): array
    {
        return $this->chats;
    }

    /** @param NpcUpdateChat[] $chats */
    public function setChats(array $chats): void
    {
        $this->chats = $chats;
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
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        NpcPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcPlayerServerPacket $data): void {
        if ($data->getPositions() == null)
        {
            throw new SerializationError('positions must be provided.');
        }
        for ($i = 0; $i < count($data->positions); $i++)
        {
            NpcUpdatePosition::serialize($writer, $data->getPositions()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getAttacks() == null)
        {
            throw new SerializationError('attacks must be provided.');
        }
        for ($i = 0; $i < count($data->attacks); $i++)
        {
            NpcUpdateAttack::serialize($writer, $data->getAttacks()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getChats() == null)
        {
            throw new SerializationError('chats must be provided.');
        }
        for ($i = 0; $i < count($data->chats); $i++)
        {
            NpcUpdateChat::serialize($writer, $data->getChats()[$i]);

        }
        $writer->addByte(0xFF);
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
     * Deserializes an instance of `NpcPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcPlayerServerPacket
    {
        $data = new NpcPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $positions_length = (int) $reader->getRemaining() / 4;
            $data->positions = [];
            for ($i = 0; $i < $positions_length; $i++)
            {
                $data->positions[] = NpcUpdatePosition::deserialize($reader);
            }
            $reader->nextChunk();
            $attacks_length = (int) $reader->getRemaining() / 9;
            $data->attacks = [];
            for ($i = 0; $i < $attacks_length; $i++)
            {
                $data->attacks[] = NpcUpdateAttack::deserialize($reader);
            }
            $reader->nextChunk();
            $chats_length = (int) $reader->getRemaining() / 1;
            $data->chats = [];
            for ($i = 0; $i < $chats_length; $i++)
            {
                $data->chats[] = NpcUpdateChat::deserialize($reader);
            }
            $reader->nextChunk();
            if ($reader->getRemaining() > 0)
            {
                $data->setHp($reader->getShort());
            }
            if ($reader->getRemaining() > 0)
            {
                $data->setTp($reader->getShort());
            }
            $reader->setChunkedReadingMode(false);

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
        return "NpcPlayerServerPacket(byteSize=$this->byteSize, positions=".var_export($this->positions, true).", attacks=".var_export($this->attacks, true).", chats=".var_export($this->chats, true).", hp=".var_export($this->hp, true).", tp=".var_export($this->tp, true).")";
    }

}



