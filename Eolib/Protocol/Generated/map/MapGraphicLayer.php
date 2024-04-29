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
use Eolib\Protocol\Generated\Map\MapGraphicRow;
use Eolib\Protocol\SerializationError;


class MapGraphicLayer
{
    private $byteSize = 0;
    private int $graphicRowsCount;
    private array $graphicRows;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGraphicRows(): array
    {
        return $this->graphicRows;
    }

    public function setGraphicRows(array $graphicRows): void
    {
        $this->graphicRows = $graphicRows;
        $this->graphicRowsCount = strlen($this->graphicRows);
    }


    /**
     * Serializes an instance of `MapGraphicLayer` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapGraphicLayer $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapGraphicLayer $data): void {
        if ($data->graphicRowsCount === null)
        {
            throw new SerializationError('graphicRowsCount must be provided.');
        }
        $writer->addChar($data->graphicRowsCount);

        if ($data->graphicRows === null)
        {
            throw new SerializationError('graphicRows must be provided.');
        }
        if (strlen($data->graphicRows) > 252)
        {
            throw new SerializationError("Expected length of graphicRows to be 252 or less, got {strlen($data->graphicRows)}.");
        }
        for ($i = 0; $i < $data->graphicRowsCount; $i++)
        {
            MapGraphicRow::serialize($writer, $data->graphicRows[$i]);

        }

    }

    /**
     * Deserializes an instance of `MapGraphicLayer` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapGraphicLayer The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapGraphicLayer
    {
        $data = new MapGraphicLayer();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->graphicRowsCount = $reader->getChar();
            $data->graphicRows = [];
            for ($i = 0; $i < $data->graphicRowsCount; $i++)
            {
                $data->graphicRows[] = MapGraphicRow::deserialize($reader);
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
        return "MapGraphicLayer(byteSize=' . $this->byteSize . '', graphicRows=' . $this->graphicRows . ')";
    }

}


