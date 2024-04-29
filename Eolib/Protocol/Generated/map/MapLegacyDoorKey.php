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


class MapLegacyDoorKey
{
    private $byteSize = 0;
    private Coords $coords;
    private int $key;

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

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int $key): void
    {
        $this->key = $key;
    }


    /**
     * Serializes an instance of `MapLegacyDoorKey` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapLegacyDoorKey $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapLegacyDoorKey $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->key === null)
        {
            throw new SerializationError('key must be provided.');
        }
        $writer->addShort($data->key);


    }

    /**
     * Deserializes an instance of `MapLegacyDoorKey` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapLegacyDoorKey The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapLegacyDoorKey
    {
        $data = new MapLegacyDoorKey();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->coords = Coords::deserialize($reader);
            $data->key = $reader->getShort();

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
        return "MapLegacyDoorKey(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', key=' . $this->key . ')";
    }

}


