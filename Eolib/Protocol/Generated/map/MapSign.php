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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class MapSign
{
    private $byteSize = 0;
    private Coords $coords;
    private int $stringDataLength;
    private string $stringData = "";
    private int $titleLength;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    public function getStringData(): string
    {
        return $this->stringData;
    }

    public function setStringData(string $stringData): void
    {
        $this->stringData = $stringData;
        $this->stringDataLength = strlen($this->stringData);
    }

    public function getTitleLength(): int
    {
        return $this->titleLength;
    }

    public function setTitleLength(int $titleLength): void
    {
        $this->titleLength = $titleLength;
    }


    /**
     * Serializes an instance of `MapSign` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapSign $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapSign $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->stringDataLength === null)
        {
            throw new SerializationError('stringDataLength must be provided.');
        }
        $writer->addShort($data->stringDataLength + 1);

        if ($data->stringData === null)
        {
            throw new SerializationError('stringData must be provided.');
        }
        if (strlen($data->stringData) > 64007)
        {
            throw new SerializationError("Expected length of stringData to be 64007 or less, got {strlen($data->stringData)}.");
        }
        $writer->addFixedEncodedString($data->stringData, $data->stringDataLength, false);

        if ($data->titleLength === null)
        {
            throw new SerializationError('titleLength must be provided.');
        }
        $writer->addChar($data->titleLength);


    }

    /**
     * Deserializes an instance of `MapSign` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapSign The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapSign
    {
        $data = new MapSign();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->coords = Coords::deserialize($reader);
            $data->stringDataLength = $reader->getShort() - 1;
            $data->stringData = $reader->getFixedEncodedString($data->stringDataLength, false);
            $data->titleLength = $reader->getChar();

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
        return "MapSign(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', stringData=' . $this->stringData . '', titleLength=' . $this->titleLength . ')";
    }

}


