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
 * Nearby player hit by another player
 */


class AvatarReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $victimId;
    /** @var int */
    private int $damage;
    /** @var int */
    private int $direction;
    /** @var int */
    private int $hpPercentage;
    /** @var bool */
    private bool $dead;

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
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
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
    public function getDead(): bool
    {
        return $this->dead;
    }

    /** @param bool $dead */
    public function setDead(bool $dead): void
    {
        $this->dead = $dead;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AvatarReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AvatarReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AvatarReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AvatarReplyServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

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

        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());

        if ($data->getDead() == null)
        {
            throw new SerializationError('dead must be provided.');
        }
        $writer->addChar((int) $data->getDead());


    }

    /**
     * Deserializes an instance of `AvatarReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AvatarReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AvatarReplyServerPacket
    {
        $data = new AvatarReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setVictimId($reader->getShort());
            $data->setDamage($reader->getThree());
            $data->setDirection($reader->getChar());
            $data->setHpPercentage($reader->getChar());
            $data->setDead($reader->getChar() !== 0);

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
        return "AvatarReplyServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", victimId=".var_export($this->victimId, true).", damage=".var_export($this->damage, true).", direction=".var_export($this->direction, true).", hpPercentage=".var_export($this->hpPercentage, true).", dead=".var_export($this->dead, true).")";
    }

}



