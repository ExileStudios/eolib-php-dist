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
use Eolib\Protocol\Generated\Net\server\NpcUpdateAttack;
use Eolib\Protocol\Generated\Net\server\NpcUpdateChat;
use Eolib\Protocol\Generated\Net\server\NpcUpdatePosition;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Main NPC update message
 */


class NpcPlayerServerPacket
{
    private $byteSize = 0;
    private array $positions;
    private array $attacks;
    private array $chats;
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

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }

    public function getAttacks(): array
    {
        return $this->attacks;
    }

    public function setAttacks(array $attacks): void
    {
        $this->attacks = $attacks;
    }

    public function getChats(): array
    {
        return $this->chats;
    }

    public function setChats(array $chats): void
    {
        $this->chats = $chats;
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
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->positions === null)
        {
            throw new SerializationError('positions must be provided.');
        }
        for ($i = 0; $i < count($data->positions); $i++)
        {
            NpcUpdatePosition::serialize($writer, $data->positions[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->attacks === null)
        {
            throw new SerializationError('attacks must be provided.');
        }
        for ($i = 0; $i < count($data->attacks); $i++)
        {
            NpcUpdateAttack::serialize($writer, $data->attacks[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->chats === null)
        {
            throw new SerializationError('chats must be provided.');
        }
        for ($i = 0; $i < count($data->chats); $i++)
        {
            NpcUpdateChat::serialize($writer, $data->chats[$i]);

        }
        $writer->addByte(0xFF);
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
            $positions_length = (int) $reader->remaining() / 4;
            $data->positions = [];
            for ($i = 0; $i < $positions_length; $i++)
            {
                $data->positions[] = NpcUpdatePosition::deserialize($reader);
            }
            $reader->nextChunk();
            $attacks_length = (int) $reader->remaining() / 9;
            $data->attacks = [];
            for ($i = 0; $i < $attacks_length; $i++)
            {
                $data->attacks[] = NpcUpdateAttack::deserialize($reader);
            }
            $reader->nextChunk();
            $data->chats = [];
            while ($reader->remaining() > 0)
            {
                $data->chats[] = NpcUpdateChat::deserialize($reader);
            }
            $reader->nextChunk();
            if ($reader->remaining() > 0)
            {
                $data->hp = $reader->getShort();
            }
            if ($reader->remaining() > 0)
            {
                $data->tp = $reader->getShort();
            }
            $reader->setChunkedReadingMode(false);

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
        return "NpcPlayerServerPacket(byteSize=' . $this->byteSize . '', positions=' . $this->positions . '', attacks=' . $this->attacks . '', chats=' . $this->chats . '', hp=' . $this->hp . '', tp=' . $this->tp . ')";
    }

}



