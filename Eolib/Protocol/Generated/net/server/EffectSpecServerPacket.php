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
use Eolib\Protocol\Generated\Net\server\MapDamageType;
use Eolib\Protocol\SerializationError;

/**
 * Taking spike or tp drain damage
 */


class EffectSpecServerPacket
{
    private $byteSize = 0;
    private int $mapDamageType;
    private ?mapDamageTypeData $mapDamageTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapDamageType(): int
    {
        return $this->mapDamageType;
    }

    public function setMapDamageType(int $mapDamageType): void
    {
        $this->mapDamageType = $mapDamageType;
    }

    public function mapDamageTypeData(): ?mapDamageTypeData
    {
        /**
         * EffectSpecServerPacket::MapDamageTypeData: Gets or sets the data associated with the `mapDamageType` field.
         */
        return $this->mapDamageTypeData;
    }

    public function setMapDamageTypeData($mapDamageTypeData): void
    {
        $this->mapDamageTypeData = $mapDamageTypeData;
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
        if ($data->mapDamageType === null)
        {
            throw new SerializationError('mapDamageType must be provided.');
        }
        $writer->addChar((int) $data->mapDamageType);

        if ($data->mapDamageType === MapDamageType::TPDRAIN)
        {
            if (!($data->mapDamageTypeData instanceof MapDamageTypeDataTpDrain))
            {
                throw new \Eolib\Protocol\SerializationError("Expected mapDamageTypeData to be of type MapDamageTypeDataTpDrain for mapDamageType " . MapDamageType($data->mapDamageType)->name . ".");
            }
            MapDamageTypeDataTpDrain::serialize($writer, $data->mapDamageTypeData);
        }
        elseif ($data->mapDamageType === MapDamageType::SPIKES)
        {
            if (!($data->mapDamageTypeData instanceof MapDamageTypeDataSpikes))
            {
                throw new \Eolib\Protocol\SerializationError("Expected mapDamageTypeData to be of type MapDamageTypeDataSpikes for mapDamageType " . MapDamageType($data->mapDamageType)->name . ".");
            }
            MapDamageTypeDataSpikes::serialize($writer, $data->mapDamageTypeData);
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
            $data->mapDamageType = MapDamageType($reader->getChar());
            if ($data->mapDamageType === MapDamageType::TPDRAIN)
            {
                $data->mapDamageTypeData = MapDamageTypeDataTpDrain::deserialize($reader);
            }
            elseif ($data->mapDamageType === MapDamageType::SPIKES)
            {
                $data->mapDamageTypeData = MapDamageTypeDataSpikes::deserialize($reader);
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
        return "EffectSpecServerPacket(byteSize=' . $this->byteSize . '', mapDamageType=' . $this->mapDamageType . '', mapDamageTypeData=' . $this->mapDamageTypeData . ')";
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
    private $byteSize = 0;
    private int $tpDamage;
    private int $tp;
    private int $maxTp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getTpDamage(): int
    {
        return $this->tpDamage;
    }

    public function setTpDamage(int $tpDamage): void
    {
        $this->tpDamage = $tpDamage;
    }

    public function getTp(): int
    {
        return $this->tp;
    }

    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }

    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

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
        if ($data->tpDamage === null)
        {
            throw new SerializationError('tpDamage must be provided.');
        }
        $writer->addShort($data->tpDamage);

        if ($data->tp === null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->tp);

        if ($data->maxTp === null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->maxTp);


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
            $data->tpDamage = $reader->getShort();
            $data->tp = $reader->getShort();
            $data->maxTp = $reader->getShort();

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
        return "MapDamageTypeDataTpDrain(byteSize=' . $this->byteSize . '', tpDamage=' . $this->tpDamage . '', tp=' . $this->tp . '', maxTp=' . $this->maxTp . ')";
    }

}



/**
 * Data associated with mapDamageType value MapDamageType::SPIKES
 */

class MapDamageTypeDataSpikes implements MapDamageTypeData
{
    private $byteSize = 0;
    private int $hpDamage;
    private int $hp;
    private int $maxHp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getHpDamage(): int
    {
        return $this->hpDamage;
    }

    public function setHpDamage(int $hpDamage): void
    {
        $this->hpDamage = $hpDamage;
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


    /**
     * Serializes an instance of `MapDamageTypeDataSpikes` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapDamageTypeDataSpikes $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapDamageTypeDataSpikes $data): void {
        if ($data->hpDamage === null)
        {
            throw new SerializationError('hpDamage must be provided.');
        }
        $writer->addShort($data->hpDamage);

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
            $data->hpDamage = $reader->getShort();
            $data->hp = $reader->getShort();
            $data->maxHp = $reader->getShort();

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
        return "MapDamageTypeDataSpikes(byteSize=' . $this->byteSize . '', hpDamage=' . $this->hpDamage . '', hp=' . $this->hp . '', maxHp=' . $this->maxHp . ')";
    }

}





