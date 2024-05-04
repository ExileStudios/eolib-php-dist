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
use Eolib\Protocol\Map\MapGraphicRowTile;
use Eolib\Protocol\SerializationError;


class MapGraphicRow
{
    private int $byteSize = 0;
    /** @var int */
    private int $y;
    /** @var int */
    private int $tilesCount;
    /** @var MapGraphicRowTile[] */
    public array $tiles = [];

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
    public function getY(): int
    {
        return $this->y;
    }

    /** @param int $y */
    public function setY(int $y): void
    {
        $this->y = $y;
    }



    /** @return MapGraphicRowTile[] */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    /** @param MapGraphicRowTile[] $tiles */
    public function setTiles(array $tiles): void
    {
        $this->tiles = $tiles;
        $this->tilesCount = count($this->tiles);
    }

    /** @return int */
    public function getTilesCount(): int
    {
        return $this->tilesCount;
    }

    /** @param int $tilesCount */
    public function setTilesCount(int $tilesCount): void
    {
        $this->tilesCount = $tilesCount;
    }


    /**
     * Serializes an instance of `MapGraphicRow` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapGraphicRow $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapGraphicRow $data): void {
        if ($data->getY() == null)
        {
            throw new SerializationError('y must be provided.');
        }
        $writer->addChar($data->getY());

        if ($data->getTilesCount() == null)
        {
            throw new SerializationError('tilesCount must be provided.');
        }
        $writer->addChar($data->getTilesCount());

        if ($data->getTiles() == null)
        {
            throw new SerializationError('tiles must be provided.');
        }
        if (count($data->tiles) > 252)
        {
            throw new SerializationError("Expected length of tiles to be 252 or less, got " . count($data->tiles) . ".");
        }
        for ($i = 0; $i < $data->getTilesCount(); $i++)
        {
            MapGraphicRowTile::serialize($writer, $data->getTiles()[$i]);

        }

    }

    /**
     * Deserializes an instance of `MapGraphicRow` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapGraphicRow The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapGraphicRow
    {
        $data = new MapGraphicRow();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setY($reader->getChar());
            $data->setTilesCount($reader->getChar());
            $data->tiles = [];
            for ($i = 0; $i < $data->getTilesCount(); $i++)
            {
                $data->tiles[] = MapGraphicRowTile::deserialize($reader);
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
        return "MapGraphicRow(byteSize=$this->byteSize, y=".var_export($this->y, true).", tiles=".var_export($this->tiles, true).")";
    }

}


