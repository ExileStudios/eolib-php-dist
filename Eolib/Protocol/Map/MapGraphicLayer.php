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
use Eolib\Protocol\Map\MapGraphicRow;
use Eolib\Protocol\SerializationError;


class MapGraphicLayer
{
    private int $byteSize = 0;
    /** @var int */
    private int $graphicRowsCount;
    /** @var MapGraphicRow[] */
    public array $graphicRows = [];

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

    /** @return MapGraphicRow[] */
    public function getGraphicRows(): array
    {
        return $this->graphicRows;
    }

    /** @param MapGraphicRow[] $graphicRows */
    public function setGraphicRows(array $graphicRows): void
    {
        $this->graphicRows = $graphicRows;
        $this->graphicRowsCount = count($this->graphicRows);
    }

    /** @return int */
    public function getGraphicRowsCount(): int
    {
        return $this->graphicRowsCount;
    }

    /** @param int $graphicRowsCount */
    public function setGraphicRowsCount(int $graphicRowsCount): void
    {
        $this->graphicRowsCount = $graphicRowsCount;
    }


    /**
     * Serializes an instance of `MapGraphicLayer` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapGraphicLayer $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapGraphicLayer $data): void {
        if ($data->getGraphicRowsCount() == null)
        {
            throw new SerializationError('graphicRowsCount must be provided.');
        }
        $writer->addChar($data->getGraphicRowsCount());

        if ($data->getGraphicRows() == null)
        {
            throw new SerializationError('graphicRows must be provided.');
        }
        if (count($data->graphicRows) > 252)
        {
            throw new SerializationError("Expected length of graphicRows to be 252 or less, got " . count($data->graphicRows) . ".");
        }
        for ($i = 0; $i < $data->getGraphicRowsCount(); $i++)
        {
            MapGraphicRow::serialize($writer, $data->getGraphicRows()[$i]);

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
            $data->setGraphicRowsCount($reader->getChar());
            $data->graphicRows = [];
            for ($i = 0; $i < $data->getGraphicRowsCount(); $i++)
            {
                $data->graphicRows[] = MapGraphicRow::deserialize($reader);
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
        return "MapGraphicLayer(byteSize=$this->byteSize, graphicRows=".var_export($this->graphicRows, true).")";
    }

}


