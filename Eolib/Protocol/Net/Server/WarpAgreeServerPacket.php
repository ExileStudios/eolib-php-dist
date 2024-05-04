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
use Eolib\Protocol\Net\Server\NearbyInfo;
use Eolib\Protocol\Net\Server\WarpEffect;
use Eolib\Protocol\Net\Server\WarpType;
use Eolib\Protocol\SerializationError;

/**
 * Reply after accepting a warp
 */


class WarpAgreeServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $warpType;
    private ?WarpTypeData $warpTypeData = null;
    /** @var NearbyInfo */
    private NearbyInfo $nearby;

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
    public function getWarpType(): int
    {
        return $this->warpType;
    }

    /** @param int $warpType */
    public function setWarpType(int $warpType): void
    {
        $this->warpType = $warpType;
    }



    public function getWarpTypeData(): ?WarpTypeData
    {
        /**
         * WarpAgreeServerPacket::WarpTypeData: Gets or sets the data associated with the `warpType` field.
         */
        return $this->warpTypeData;
    }

    public function setWarpTypeData(?WarpTypeData $warpTypeData): void
    {
        $this->warpTypeData = $warpTypeData;
    }

    /** @return NearbyInfo */
    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

    /** @param NearbyInfo $nearby */
    public function setNearby(NearbyInfo $nearby): void
    {
        $this->nearby = $nearby;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WARP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WarpAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WarpAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpAgreeServerPacket $data): void {
        if ($data->getWarpType() == null)
        {
            throw new SerializationError('warpType must be provided.');
        }
        $writer->addChar((int) $data->getWarpType());

        if ($data->warpType === WarpType::MAPSWITCH)
        {
            if (!($data->warpTypeData instanceof WarpTypeDataMapSwitch))
            {
                throw new \Eolib\Protocol\SerializationError("Expected warpTypeData to be of type WarpTypeDataMapSwitch for warpType " . $data->warpType . ".");
            }
            WarpTypeDataMapSwitch::serialize($writer, $data->getWarpTypeData());
        }
        if ($data->getNearby() == null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->getNearby());


    }

    /**
     * Deserializes an instance of `WarpAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WarpAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WarpAgreeServerPacket
    {
        $data = new WarpAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setWarpType($reader->getChar());
            if ($data->warpType === WarpType::MAPSWITCH)
            {
                $data->setWarpTypeData(WarpTypeDataMapSwitch::deserialize($reader));
            }
            $data->setNearby(NearbyInfo::deserialize($reader));
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
        return "WarpAgreeServerPacket(byteSize=$this->byteSize, warpType=".var_export($this->warpType, true).", warpTypeData=".var_export($this->warpTypeData, true).", nearby=".var_export($this->nearby, true).")";
    }

}

/**
 * Data associated with different values of the `warpType` field.
 */
interface WarpTypeData {}

/**
 * Data associated with warpType value WarpType::MAPSWITCH
 */

class WarpTypeDataMapSwitch implements WarpTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $mapId;
    /** @var int */
    private int $warpEffect;

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
    public function getMapId(): int
    {
        return $this->mapId;
    }

    /** @param int $mapId */
    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }



    /** @return int */
    public function getWarpEffect(): int
    {
        return $this->warpEffect;
    }

    /** @param int $warpEffect */
    public function setWarpEffect(int $warpEffect): void
    {
        $this->warpEffect = $warpEffect;
    }




    /**
     * Serializes an instance of `WarpTypeDataMapSwitch` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpTypeDataMapSwitch $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpTypeDataMapSwitch $data): void {
        if ($data->getMapId() == null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->getMapId());

        if ($data->getWarpEffect() == null)
        {
            throw new SerializationError('warpEffect must be provided.');
        }
        $writer->addChar((int) $data->getWarpEffect());


    }

    /**
     * Deserializes an instance of `WarpTypeDataMapSwitch` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WarpTypeDataMapSwitch The deserialized data.
     */
    public static function deserialize(EoReader $reader): WarpTypeDataMapSwitch
    {
        $data = new WarpTypeDataMapSwitch();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapId($reader->getShort());
            $data->setWarpEffect($reader->getChar());

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
        return "WarpTypeDataMapSwitch(byteSize=$this->byteSize, mapId=".var_export($this->mapId, true).", warpEffect=".var_export($this->warpEffect, true).")";
    }

}





