<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Map\MapWarp;
use Eolib\Protocol\SerializationError;


class MapWarpRowTile
{
    private $byteSize = 0;
    private int $x;
    private MapWarp $warp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getWarp(): MapWarp
    {
        return $this->warp;
    }

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
        if ($data->x === null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addChar($data->x);

        if ($data->warp === null)
        {
            throw new SerializationError('warp must be provided.');
        }
        MapWarp::serialize($writer, $data->warp);


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
            $data->x = $reader->getChar();
            $data->warp = MapWarp::deserialize($reader);

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
        return "MapWarpRowTile(byteSize=' . $this->byteSize . '', x=' . $this->x . '', warp=' . $this->warp . ')";
    }

}


