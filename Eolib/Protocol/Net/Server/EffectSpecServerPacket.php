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
use Eolib\Protocol\Net\Server\MapDamageType;
use Eolib\Protocol\SerializationError;

/**
 * Taking spike or tp drain damage
 */


class EffectSpecServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $mapDamageType;
    private ?MapDamageTypeData $mapDamageTypeData = null;

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
    public function getMapDamageType(): int
    {
        return $this->mapDamageType;
    }

    /** @param int $mapDamageType */
    public function setMapDamageType(int $mapDamageType): void
    {
        $this->mapDamageType = $mapDamageType;
    }



    public function getMapDamageTypeData(): ?MapDamageTypeData
    {
        /**
         * EffectSpecServerPacket::MapDamageTypeData: Gets or sets the data associated with the `mapDamageType` field.
         */
        return $this->mapDamageTypeData;
    }

    public function setMapDamageTypeData(?MapDamageTypeData $mapDamageTypeData): void
    {
        $this->mapDamageTypeData = $mapDamageTypeData;
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
        return PacketAction::SPEC;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EffectSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectSpecServerPacket $data): void {
        if ($data->getMapDamageType() == null)
        {
            throw new SerializationError('mapDamageType must be provided.');
        }
        $writer->addChar((int) $data->getMapDamageType());

        if ($data->mapDamageType === MapDamageType::TPDRAIN)
        {
            if (!($data->mapDamageTypeData instanceof MapDamageTypeDataTpDrain))
            {
                throw new \Eolib\Protocol\SerializationError("Expected mapDamageTypeData to be of type MapDamageTypeDataTpDrain for mapDamageType " . $data->mapDamageType . ".");
            }
            MapDamageTypeDataTpDrain::serialize($writer, $data->getMapDamageTypeData());
        }
        elseif ($data->mapDamageType === MapDamageType::SPIKES)
        {
            if (!($data->mapDamageTypeData instanceof MapDamageTypeDataSpikes))
            {
                throw new \Eolib\Protocol\SerializationError("Expected mapDamageTypeData to be of type MapDamageTypeDataSpikes for mapDamageType " . $data->mapDamageType . ".");
            }
            MapDamageTypeDataSpikes::serialize($writer, $data->getMapDamageTypeData());
        }

    }

    /**
     * Deserializes an instance of `EffectSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectSpecServerPacket
    {
        $data = new EffectSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapDamageType($reader->getChar());
            if ($data->mapDamageType === MapDamageType::TPDRAIN)
            {
                $data->setMapDamageTypeData(MapDamageTypeDataTpDrain::deserialize($reader));
            }
            elseif ($data->mapDamageType === MapDamageType::SPIKES)
            {
                $data->setMapDamageTypeData(MapDamageTypeDataSpikes::deserialize($reader));
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
        return "EffectSpecServerPacket(byteSize=$this->byteSize, mapDamageType=".var_export($this->mapDamageType, true).", mapDamageTypeData=".var_export($this->mapDamageTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `mapDamageType` field.
 */
interface MapDamageTypeData {}

/**
 * Data associated with mapDamageType value MapDamageType::TPDRAIN
 */

class MapDamageTypeDataTpDrain implements MapDamageTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $tpDamage;
    /** @var int */
    private int $tp;
    /** @var int */
    private int $maxTp;

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
    public function getTpDamage(): int
    {
        return $this->tpDamage;
    }

    /** @param int $tpDamage */
    public function setTpDamage(int $tpDamage): void
    {
        $this->tpDamage = $tpDamage;
    }



    /** @return int */
    public function getTp(): int
    {
        return $this->tp;
    }

    /** @param int $tp */
    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }



    /** @return int */
    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    /** @param int $maxTp */
    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }




    /**
     * Serializes an instance of `MapDamageTypeDataTpDrain` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapDamageTypeDataTpDrain $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapDamageTypeDataTpDrain $data): void {
        if ($data->getTpDamage() == null)
        {
            throw new SerializationError('tpDamage must be provided.');
        }
        $writer->addShort($data->getTpDamage());

        if ($data->getTp() == null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->getTp());

        if ($data->getMaxTp() == null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->getMaxTp());


    }

    /**
     * Deserializes an instance of `MapDamageTypeDataTpDrain` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapDamageTypeDataTpDrain The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapDamageTypeDataTpDrain
    {
        $data = new MapDamageTypeDataTpDrain();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setTpDamage($reader->getShort());
            $data->setTp($reader->getShort());
            $data->setMaxTp($reader->getShort());

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
        return "MapDamageTypeDataTpDrain(byteSize=$this->byteSize, tpDamage=".var_export($this->tpDamage, true).", tp=".var_export($this->tp, true).", maxTp=".var_export($this->maxTp, true).")";
    }

}



/**
 * Data associated with mapDamageType value MapDamageType::SPIKES
 */

class MapDamageTypeDataSpikes implements MapDamageTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $hpDamage;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $maxHp;

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
    public function getHpDamage(): int
    {
        return $this->hpDamage;
    }

    /** @param int $hpDamage */
    public function setHpDamage(int $hpDamage): void
    {
        $this->hpDamage = $hpDamage;
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




    /**
     * Serializes an instance of `MapDamageTypeDataSpikes` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapDamageTypeDataSpikes $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapDamageTypeDataSpikes $data): void {
        if ($data->getHpDamage() == null)
        {
            throw new SerializationError('hpDamage must be provided.');
        }
        $writer->addShort($data->getHpDamage());

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


    }

    /**
     * Deserializes an instance of `MapDamageTypeDataSpikes` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapDamageTypeDataSpikes The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapDamageTypeDataSpikes
    {
        $data = new MapDamageTypeDataSpikes();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setHpDamage($reader->getShort());
            $data->setHp($reader->getShort());
            $data->setMaxHp($reader->getShort());

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
        return "MapDamageTypeDataSpikes(byteSize=$this->byteSize, hpDamage=".var_export($this->hpDamage, true).", hp=".var_export($this->hp, true).", maxHp=".var_export($this->maxHp, true).")";
    }

}





