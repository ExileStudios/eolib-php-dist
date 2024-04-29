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
 * Nearby NPC hit by a player
 */


class NpcReplyServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $playerDirection;
    private int $npcIndex;
    private int $damage;
    private int $hpPercentage;
    private ?int $killStealProtection;

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

    public function getPlayerDirection(): int
    {
        return $this->playerDirection;
    }

    public function setPlayerDirection(int $playerDirection): void
    {
        $this->playerDirection = $playerDirection;
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
        return PacketFamily::NPC;
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
        NpcReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcReplyServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->playerDirection === null)
        {
            throw new SerializationError('playerDirection must be provided.');
        }
        $writer->addChar((int) $data->playerDirection);

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

        $reachedMissingOptional = $data->killStealProtection === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->killStealProtection);

        }

    }

    /**
     * Deserializes an instance of `NpcReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcReplyServerPacket
    {
        $data = new NpcReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->playerDirection = Direction($reader->getChar());
            $data->npcIndex = $reader->getShort();
            $data->damage = $reader->getThree();
            $data->hpPercentage = $reader->getShort();
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
        return "NpcReplyServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', playerDirection=' . $this->playerDirection . '', npcIndex=' . $this->npcIndex . '', damage=' . $this->damage . '', hpPercentage=' . $this->hpPercentage . '', killStealProtection=' . $this->killStealProtection . ')";
    }

}



