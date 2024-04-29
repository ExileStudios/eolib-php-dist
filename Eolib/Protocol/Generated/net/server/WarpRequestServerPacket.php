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
use Eolib\Protocol\Generated\Net\server\WarpType;
use Eolib\Protocol\SerializationError;

/**
 * Warp request from server
 */


class WarpRequestServerPacket
{
    private $byteSize = 0;
    private int $warpType;
    private int $mapId;
    private ?warpTypeData $warpTypeData = null;
    private int $sessionId;

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

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function warpTypeData(): ?warpTypeData
    {
        /**
         * WarpRequestServerPacket::WarpTypeData: Gets or sets the data associated with the `warpType` field.
         */
        return $this->warpTypeData;
    }

    public function setWarpTypeData($warpTypeData): void
    {
        $this->warpTypeData = $warpTypeData;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
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
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WarpRequestServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WarpRequestServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpRequestServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpRequestServerPacket $data): void {
        if ($data->warpType === null)
        {
            throw new SerializationError('warpType must be provided.');
        }
        $writer->addChar((int) $data->warpType);

        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->warpType === WarpType::MAPSWITCH)
        {
            if (!($data->warpTypeData instanceof WarpTypeDataMapSwitch))
            {
                throw new \Eolib\Protocol\SerializationError("Expected warpTypeData to be of type WarpTypeDataMapSwitch for warpType " . WarpType($data->warpType)->name . ".");
            }
            WarpTypeDataMapSwitch::serialize($writer, $data->warpTypeData);
        }
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);


    }

    /**
     * Deserializes an instance of `WarpRequestServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WarpRequestServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WarpRequestServerPacket
    {
        $data = new WarpRequestServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->warpType = WarpType($reader->getChar());
            $data->mapId = $reader->getShort();
            if ($data->warpType === WarpType::MAPSWITCH)
            {
                $data->warpTypeData = WarpTypeDataMapSwitch::deserialize($reader);
            }
            $data->sessionId = $reader->getShort();

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
        return "WarpRequestServerPacket(byteSize=' . $this->byteSize . '', warpType=' . $this->warpType . '', mapId=' . $this->mapId . '', warpTypeData=' . $this->warpTypeData . '', sessionId=' . $this->sessionId . ')";
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
    private array $mapRid;
    private int $mapFileSize;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapRid(): array
    {
        return $this->mapRid;
    }

    public function setMapRid(array $mapRid): void
    {
        $this->mapRid = $mapRid;
    }

    public function getMapFileSize(): int
    {
        return $this->mapFileSize;
    }

    public function setMapFileSize(int $mapFileSize): void
    {
        $this->mapFileSize = $mapFileSize;
    }


    /**
     * Serializes an instance of `WarpTypeDataMapSwitch` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WarpTypeDataMapSwitch $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WarpTypeDataMapSwitch $data): void {
        if ($data->mapRid === null)
        {
            throw new SerializationError('mapRid must be provided.');
        }
        if (strlen($data->mapRid) != 2)
        {
            throw new SerializationError("Expected length of mapRid to be exactly 2, got {strlen($data->mapRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->mapRid[$i]);

        }
        if ($data->mapFileSize === null)
        {
            throw new SerializationError('mapFileSize must be provided.');
        }
        $writer->addThree($data->mapFileSize);


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
            $data->mapRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->mapRid[] = $reader->getShort();
            }
            $data->mapFileSize = $reader->getThree();

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
        return "WarpTypeDataMapSwitch(byteSize=' . $this->byteSize . '', mapRid=' . $this->mapRid . '', mapFileSize=' . $this->mapFileSize . ')";
    }

}





