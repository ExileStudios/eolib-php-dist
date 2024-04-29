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
use Eolib\Protocol\SerializationError;


class MapGraphicRowTile
{
    private $byteSize = 0;
    private int $x;
    private int $graphic;

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

    public function getGraphic(): int
    {
        return $this->graphic;
    }

    public function setGraphic(int $graphic): void
    {
        $this->graphic = $graphic;
    }


    /**
     * Serializes an instance of `MapGraphicRowTile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapGraphicRowTile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapGraphicRowTile $data): void {
        if ($data->x === null)
        {
            throw new SerializationError('x must be provided.');
        }
        $writer->addChar($data->x);

        if ($data->graphic === null)
        {
            throw new SerializationError('graphic must be provided.');
        }
        $writer->addShort($data->graphic);


    }

    /**
     * Deserializes an instance of `MapGraphicRowTile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapGraphicRowTile The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapGraphicRowTile
    {
        $data = new MapGraphicRowTile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->x = $reader->getChar();
            $data->graphic = $reader->getShort();

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
        return "MapGraphicRowTile(byteSize=' . $this->byteSize . '', x=' . $this->x . '', graphic=' . $this->graphic . ')";
    }

}


