<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class TileEffect
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $effectId;

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

    /** @return Coords */
    public function getCoords(): Coords
    {
        return $this->coords;
    }

    /** @param Coords $coords */
    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }



    /** @return int */
    public function getEffectId(): int
    {
        return $this->effectId;
    }

    /** @param int $effectId */
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
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getEffectId() == null)
        {
            throw new SerializationError('effectId must be provided.');
        }
        $writer->addShort($data->getEffectId());


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
            $data->setCoords(Coords::deserialize($reader));
            $data->setEffectId($reader->getShort());

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
        return "TileEffect(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", effectId=".var_export($this->effectId, true).")";
    }

}


