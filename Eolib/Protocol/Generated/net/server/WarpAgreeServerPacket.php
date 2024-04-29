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
use Eolib\Protocol\Generated\Net\server\NearbyInfo;
use Eolib\Protocol\Generated\Net\server\WarpEffect;
use Eolib\Protocol\Generated\Net\server\WarpType;
use Eolib\Protocol\SerializationError;

/**
 * Reply after accepting a warp
 */


class WarpAgreeServerPacket
{
    private $byteSize = 0;
    private int $warpType;
    private ?warpTypeData $warpTypeData = null;
    private NearbyInfo $nearby;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getWarpType(): int
    {
        return $this->warpType;
    }

    public function setWarpType(int $warpType): void
    {
        $this->warpType = $warpType;
    }

    public function warpTypeData(): ?warpTypeData
    {
        /**
         * WarpAgreeServerPacket::WarpTypeData: Gets or sets the data associated with the `warpType` field.
         */
        return $this->warpTypeData;
    }

    public function setWarpTypeData($warpTypeData): void
    {
        $this->warpTypeData = $warpTypeData;
    }

    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

    public function setNearby(NearbyInfo $nearby): void
    {
        $this->nearby = $nearby;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WARP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->warpType === null)
        {
            throw new SerializationError('warpType must be provided.');
        }
        $writer->addChar((int) $data->warpType);

        if ($data->warpType === WarpType::MAPSWITCH)
        {
            if (!($data->warpTypeData instanceof WarpTypeDataMapSwitch))
            {
                throw new \Eolib\Protocol\SerializationError("Expected warpTypeData to be of type WarpTypeDataMapSwitch for warpType " . WarpType($data->warpType)->name . ".");
            }
            WarpTypeDataMapSwitch::serialize($writer, $data->warpTypeData);
        }
        if ($data->nearby === null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->nearby);


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
            $data->warpType = WarpType($reader->getChar());
            if ($data->warpType === WarpType::MAPSWITCH)
            {
                $data->warpTypeData = WarpTypeDataMapSwitch::deserialize($reader);
            }
            $data->nearby = NearbyInfo::deserialize($reader);
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
        return "WarpAgreeServerPacket(byteSize=' . $this->byteSize . '', warpType=' . $this->warpType . '', warpTypeData=' . $this->warpTypeData . '', nearby=' . $this->nearby . ')";
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
    private $byteSize = 0;
    private int $mapId;
    private int $warpEffect;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getWarpEffect(): int
    {
        return $this->warpEffect;
    }

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
        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->warpEffect === null)
        {
            throw new SerializationError('warpEffect must be provided.');
        }
        $writer->addChar((int) $data->warpEffect);


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
            $data->mapId = $reader->getShort();
            $data->warpEffect = WarpEffect($reader->getChar());

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
        return "WarpTypeDataMapSwitch(byteSize=' . $this->byteSize . '', mapId=' . $this->mapId . '', warpEffect=' . $this->warpEffect . ')";
    }

}





