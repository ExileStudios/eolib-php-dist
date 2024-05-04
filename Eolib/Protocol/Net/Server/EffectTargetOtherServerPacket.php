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
use Eolib\Protocol\Net\Server\MapDrainDamageOther;
use Eolib\Protocol\SerializationError;

/**
 * Map drain damage
 */


class EffectTargetOtherServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $damage;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $maxHp;
    /** @var MapDrainDamageOther[] */
    public array $others = [];

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
    public function getHp(): int
    {
        return $this->hp;
    }

    /** @param int $hp */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }



    /** @return int */
    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    /** @param int $maxHp */
    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }



    /** @return MapDrainDamageOther[] */
    public function getOthers(): array
    {
        return $this->others;
    }

    /** @param MapDrainDamageOther[] $others */
    public function setOthers(array $others): void
    {
        $this->others = $others;
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
        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addShort($data->getDamage());

        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->getHp());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

        if ($data->getOthers() == null)
        {
            throw new SerializationError('others must be provided.');
        }
        for ($i = 0; $i < count($data->others); $i++)
        {
            MapDrainDamageOther::serialize($writer, $data->getOthers()[$i]);

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
            $data->setDamage($reader->getShort());
            $data->setHp($reader->getShort());
            $data->setMaxHp($reader->getShort());
            $others_length = (int) $reader->getRemaining() / 5;
            $data->others = [];
            for ($i = 0; $i < $others_length; $i++)
            {
                $data->others[] = MapDrainDamageOther::deserialize($reader);
            }

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
        return "EffectTargetOtherServerPacket(byteSize=$this->byteSize, damage=".var_export($this->damage, true).", hp=".var_export($this->hp, true).", maxHp=".var_export($this->maxHp, true).", others=".var_export($this->others, true).")";
    }

}



