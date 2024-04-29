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
use Eolib\Protocol\Generated\Map\MapTileSpecRowTile;
use Eolib\Protocol\SerializationError;


class MapTileSpecRow
{
    private $byteSize = 0;
    private int $y;
    private int $tilesCount;
    private array $tiles;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getTiles(): array
    {
        return $this->tiles;
    }

    public function setTiles(array $tiles): void
    {
        $this->tiles = $tiles;
        $this->tilesCount = strlen($this->tiles);
    }


    /**
     * Serializes an instance of `MapTileSpecRow` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapTileSpecRow $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapTileSpecRow $data): void {
        if ($data->y === null)
        {
            throw new SerializationError('y must be provided.');
        }
        $writer->addChar($data->y);

        if ($data->tilesCount === null)
        {
            throw new SerializationError('tilesCount must be provided.');
        }
        $writer->addChar($data->tilesCount);

        if ($data->tiles === null)
        {
            throw new SerializationError('tiles must be provided.');
        }
        if (strlen($data->tiles) > 252)
        {
            throw new SerializationError("Expected length of tiles to be 252 or less, got {strlen($data->tiles)}.");
        }
        for ($i = 0; $i < $data->tilesCount; $i++)
        {
            MapTileSpecRowTile::serialize($writer, $data->tiles[$i]);

        }

    }

    /**
     * Deserializes an instance of `MapTileSpecRow` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapTileSpecRow The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapTileSpecRow
    {
        $data = new MapTileSpecRow();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->y = $reader->getChar();
            $data->tilesCount = $reader->getChar();
            $data->tiles = [];
            for ($i = 0; $i < $data->tilesCount; $i++)
            {
                $data->tiles[] = MapTileSpecRowTile::deserialize($reader);
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
        return "MapTileSpecRow(byteSize=' . $this->byteSize . '', y=' . $this->y . '', tiles=' . $this->tiles . ')";
    }

}


