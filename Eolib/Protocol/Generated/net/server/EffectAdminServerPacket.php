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

/**
 * Nearby character taking spike damage
 */


class EffectAdminServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $hpPercentage;
    private bool $died;
    private int $damage;

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

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }

    public function getDied(): bool
    {
        return $this->died;
    }

    public function setDied(bool $died): void
    {
        $this->died = $died;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::EFFECT;
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
        EffectAdminServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectAdminServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectAdminServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectAdminServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);

        if ($data->died === null)
        {
            throw new SerializationError('died must be provided.');
        }
        $writer->addChar($data->died ? 1 : 0);

        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->damage);


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
            $data->playerId = $reader->getShort();
            $data->hpPercentage = $reader->getChar();
            $data->died = $reader->getChar() !== 0;
            $data->damage = $reader->getThree();

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
        return "EffectAdminServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', hpPercentage=' . $this->hpPercentage . '', died=' . $this->died . '', damage=' . $this->damage . ')";
    }

}



