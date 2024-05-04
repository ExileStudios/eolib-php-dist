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
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class MapSign
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $stringDataLength;
    /** @var string */
    private string $stringData = "";
    /** @var int */
    private int $titleLength;

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



    /** @return string */
    public function getStringData(): string
    {
        return $this->stringData;
    }

    /** @param string $stringData */
    public function setStringData(string $stringData): void
    {
        $this->stringData = $stringData;
        $this->stringDataLength = mb_strlen($this->stringData);
    }

    /** @return int */
    public function getStringDataLength(): int
    {
        return $this->stringDataLength;
    }

    /** @param int $stringDataLength */
    public function setStringDataLength(int $stringDataLength): void
    {
        $this->stringDataLength = $stringDataLength;
    }

    /** @return int */
    public function getTitleLength(): int
    {
        return $this->titleLength;
    }

    /** @param int $titleLength */
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
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getStringDataLength() == null)
        {
            throw new SerializationError('stringDataLength must be provided.');
        }
        $writer->addShort($data->getStringDataLength() + 1);

        if ($data->getStringData() == null)
        {
            throw new SerializationError('stringData must be provided.');
        }
        if (strlen($data->stringData) > 64007)
        {
            throw new SerializationError("Expected length of stringData to be 64007 or less, got " . strlen($data->stringData) . ".");
        }
        $writer->addFixedEncodedString($data->getStringData(), $data->getStringDataLength(), false);

        if ($data->getTitleLength() == null)
        {
            throw new SerializationError('titleLength must be provided.');
        }
        $writer->addChar($data->getTitleLength());


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
            $data->setCoords(Coords::deserialize($reader));
            $data->setStringDataLength($reader->getShort() - 1);
            $data->setStringData($reader->getFixedEncodedString($data->getStringDataLength(), false));
            $data->setTitleLength($reader->getChar());

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
        return "MapSign(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", stringData=".var_export($this->stringData, true).", titleLength=".var_export($this->titleLength, true).")";
    }

}


