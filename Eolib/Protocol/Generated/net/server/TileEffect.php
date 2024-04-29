<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class TileEffect
{
    private $byteSize = 0;
    private Coords $coords;
    private int $effectId;

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

    public function getEffectId(): int
    {
        return $this->effectId;
    }

    public function setEffectId(int $effectId): void
    {
        $this->effectId = $effectId;
    }


    /**
     * Serializes an instance of `TileEffect` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TileEffect $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TileEffect $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->effectId === null)
        {
            throw new SerializationError('effectId must be provided.');
        }
        $writer->addShort($data->effectId);


    }

    /**
     * Deserializes an instance of `TileEffect` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TileEffect The deserialized data.
     */
    public static function deserialize(EoReader $reader): TileEffect
    {
        $data = new TileEffect();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->coords = Coords::deserialize($reader);
            $data->effectId = $reader->getShort();

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
        return "TileEffect(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', effectId=' . $this->effectId . ')";
    }

}


