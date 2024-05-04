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
use Eolib\Protocol\SerializationError;

/**
 * Nearby character taking spike damage
 */


class EffectAdminServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $hpPercentage;
    /** @var bool */
    private bool $died;
    /** @var int */
    private int $damage;

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
    public function getDied(): bool
    {
        return $this->died;
    }

    /** @param bool $died */
    public function setDied(bool $died): void
    {
        $this->died = $died;
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



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::EFFECT;
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
        EffectAdminServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectAdminServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectAdminServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectAdminServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());

        if ($data->getDied() == null)
        {
            throw new SerializationError('died must be provided.');
        }
        $writer->addChar((int) $data->getDied());

        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->getDamage());


    }

    /**
     * Deserializes an instance of `EffectAdminServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectAdminServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectAdminServerPacket
    {
        $data = new EffectAdminServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setHpPercentage($reader->getChar());
            $data->setDied($reader->getChar() !== 0);
            $data->setDamage($reader->getThree());

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
        return "EffectAdminServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", hpPercentage=".var_export($this->hpPercentage, true).", died=".var_export($this->died, true).", damage=".var_export($this->damage, true).")";
    }

}



