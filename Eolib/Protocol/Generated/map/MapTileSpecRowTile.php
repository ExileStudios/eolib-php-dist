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
use Eolib\Protocol\Generated\Map\MapTileSpec;
use Eolib\Protocol\SerializationError;


class MapTileSpecRowTile
{
    private $byteSize = 0;
    private int $x;
    private int $tileSpec;

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

    public function getTileSpec(): int
    {
        return $this->tileSpec;
    }

    public function setTileSpec(int $tileSpec): void
    {
        $this->tileSpec = $tileSpec;
    }


    /**
     * Serializes an instance of `MapTileSpecRowTile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapTileSpecRowTile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapTileSpecRowTile $data): void {
        if ($data->x === null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addChar($data->x);

        if ($data->tileSpec === null)
        {
            throw new SerializationError('tileSpec must be provided.');
        }
        $writer->addChar((int) $data->tileSpec);


    }

    /**
     * Deserializes an instance of `MapTileSpecRowTile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapTileSpecRowTile The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapTileSpecRowTile
    {
        $data = new MapTileSpecRowTile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->x = $reader->getChar();
            $data->tileSpec = MapTileSpec($reader->getChar());

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
        return "MapTileSpecRowTile(byteSize=' . $this->byteSize . '', x=' . $this->x . '', tileSpec=' . $this->tileSpec . ')";
    }

}


