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
use Eolib\Protocol\Generated\Net\server\MapDrainDamageOther;
use Eolib\Protocol\SerializationError;

/**
 * Map drain damage
 */


class EffectTargetOtherServerPacket
{
    private $byteSize = 0;
    private int $damage;
    private int $hp;
    private int $maxHp;
    private array $others;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }

    public function getOthers(): array
    {
        return $this->others;
    }

    public function setOthers(array $others): void
    {
        $this->others = $others;
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
        return PacketAction::TARGETOTHER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EffectTargetOtherServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectTargetOtherServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectTargetOtherServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectTargetOtherServerPacket $data): void {
        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addShort($data->damage);

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->hp);

        if ($data->maxHp === null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->maxHp);

        if ($data->others === null)
        {
            throw new SerializationError('others must be provided.');
        }
        for ($i = 0; $i < count($data->others); $i++)
        {
            MapDrainDamageOther::serialize($writer, $data->others[$i]);

        }

    }

    /**
     * Deserializes an instance of `EffectTargetOtherServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectTargetOtherServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectTargetOtherServerPacket
    {
        $data = new EffectTargetOtherServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->damage = $reader->getShort();
            $data->hp = $reader->getShort();
            $data->maxHp = $reader->getShort();
            $others_length = (int) $reader->remaining() / 5;
            $data->others = [];
            for ($i = 0; $i < $others_length; $i++)
            {
                $data->others[] = MapDrainDamageOther::deserialize($reader);
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
        return "EffectTargetOtherServerPacket(byteSize=' . $this->byteSize . '', damage=' . $this->damage . '', hp=' . $this->hp . '', maxHp=' . $this->maxHp . '', others=' . $this->others . ')";
    }

}



