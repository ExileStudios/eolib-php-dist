<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Map\MapWarp;
use Eolib\Protocol\SerializationError;


class MapWarpRowTile
{
    private int $byteSize = 0;
    /** @var int */
    private int $x;
    /** @var MapWarp */
    private MapWarp $warp;

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
    public function getX(): int
    {
        return $this->x;
    }

    /** @param int $x */
    public function setX(int $x): void
    {
        $this->x = $x;
    }



    /** @return MapWarp */
    public function getWarp(): MapWarp
    {
        return $this->warp;
    }

    /** @param MapWarp $warp */
    public function setWarp(MapWarp $warp): void
    {
        $this->warp = $warp;
    }




    /**
     * Serializes an instance of `MapWarpRowTile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapWarpRowTile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapWarpRowTile $data): void {
        if ($data->getX() == null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addChar($data->getX());

        if ($data->getWarp() == null)
        {
            throw new SerializationError('warp must be provided.');
        }
        MapWarp::serialize($writer, $data->getWarp());


    }

    /**
     * Deserializes an instance of `MapWarpRowTile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapWarpRowTile The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapWarpRowTile
    {
        $data = new MapWarpRowTile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setX($reader->getChar());
            $data->setWarp(MapWarp::deserialize($reader));

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
        return "MapWarpRowTile(byteSize=$this->byteSize, x=".var_export($this->x, true).", warp=".var_export($this->warp, true).")";
    }

}


