<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\EcfRecord;
use Eolib\Protocol\SerializationError;


class Ecf
{
    private $byteSize = 0;
    private array $rid;
    private int $totalClassesCount;
    private int $version;
    private array $classes;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRid(): array
    {
        return $this->rid;
    }

    public function setRid(array $rid): void
    {
        $this->rid = $rid;
    }

    public function getTotalClassesCount(): int
    {
        return $this->totalClassesCount;
    }

    public function setTotalClassesCount(int $totalClassesCount): void
    {
        $this->totalClassesCount = $totalClassesCount;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    public function getClasses(): array
    {
        return $this->classes;
    }

    public function setClasses(array $classes): void
    {
        $this->classes = $classes;
    }


    /**
     * Serializes an instance of `Ecf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Ecf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Ecf $data): void {
        $writer->addFixedString('ECF', 3, false);

        if ($data->rid === null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (strlen($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got {strlen($data->rid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->rid[$i]);

        }
        if ($data->totalClassesCount === null)
        {
            throw new SerializationError('totalClassesCount must be provided.');
        }
        $writer->addShort($data->totalClassesCount);

        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->version);

        if ($data->classes === null)
        {
            throw new SerializationError('classes must be provided.');
        }
        for ($i = 0; $i < count($data->classes); $i++)
        {
            EcfRecord::serialize($writer, $data->classes[$i]);

        }

    }

    /**
     * Deserializes an instance of `Ecf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Ecf The deserialized data.
     */
    public static function deserialize(EoReader $reader): Ecf
    {
        $data = new Ecf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->rid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->rid[] = $reader->getShort();
            }
            $data->totalClassesCount = $reader->getShort();
            $data->version = $reader->getChar();
            $data->classes = [];
            while ($reader->remaining() > 0)
            {
                $data->classes[] = EcfRecord::deserialize($reader);
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
        return "Ecf(byteSize=' . $this->byteSize . '', rid=' . $this->rid . '', totalClassesCount=' . $this->totalClassesCount . '', version=' . $this->version . '', classes=' . $this->classes . ')";
    }

}


