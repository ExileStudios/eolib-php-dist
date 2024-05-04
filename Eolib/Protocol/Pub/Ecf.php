<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\EcfRecord;
use Eolib\Protocol\SerializationError;


class Ecf
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $rid = [];
    /** @var int */
    private int $totalClassesCount;
    /** @var int */
    private int $version;
    /** @var EcfRecord[] */
    public array $classes = [];

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

    /** @return int[] */
    public function getRid(): array
    {
        return $this->rid;
    }

    /** @param int[] $rid */
    public function setRid(array $rid): void
    {
        $this->rid = $rid;
    }



    /** @return int */
    public function getTotalClassesCount(): int
    {
        return $this->totalClassesCount;
    }

    /** @param int $totalClassesCount */
    public function setTotalClassesCount(int $totalClassesCount): void
    {
        $this->totalClassesCount = $totalClassesCount;
    }



    /** @return int */
    public function getVersion(): int
    {
        return $this->version;
    }

    /** @param int $version */
    public function setVersion(int $version): void
    {
        $this->version = $version;
    }



    /** @return EcfRecord[] */
    public function getClasses(): array
    {
        return $this->classes;
    }

    /** @param EcfRecord[] $classes */
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

        if ($data->getRid() == null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (count($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got " . count($data->rid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getRid()[$i]);

        }
        if ($data->getTotalClassesCount() == null)
        {
            throw new SerializationError('totalClassesCount must be provided.');
        }
        $writer->addShort($data->getTotalClassesCount());

        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->getVersion());

        if ($data->getClasses() == null)
        {
            throw new SerializationError('classes must be provided.');
        }
        for ($i = 0; $i < count($data->classes); $i++)
        {
            EcfRecord::serialize($writer, $data->getClasses()[$i]);

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
            $data->setTotalClassesCount($reader->getShort());
            $data->setVersion($reader->getChar());
            $classes_length = (int) $reader->getRemaining() / 14;
            $data->classes = [];
            for ($i = 0; $i < $classes_length; $i++)
            {
                $data->classes[] = EcfRecord::deserialize($reader);
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
        return "Ecf(byteSize=$this->byteSize, rid=".var_export($this->rid, true).", totalClassesCount=".var_export($this->totalClassesCount, true).", version=".var_export($this->version, true).", classes=".var_export($this->classes, true).")";
    }

}


