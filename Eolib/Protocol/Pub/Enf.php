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
use Eolib\Protocol\Pub\EnfRecord;
use Eolib\Protocol\SerializationError;


class Enf
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $rid = [];
    /** @var int */
    private int $totalNpcsCount;
    /** @var int */
    private int $version;
    /** @var EnfRecord[] */
    public array $npcs = [];

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
    public function getTotalNpcsCount(): int
    {
        return $this->totalNpcsCount;
    }

    /** @param int $totalNpcsCount */
    public function setTotalNpcsCount(int $totalNpcsCount): void
    {
        $this->totalNpcsCount = $totalNpcsCount;
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



    /** @return EnfRecord[] */
    public function getNpcs(): array
    {
        return $this->npcs;
    }

    /** @param EnfRecord[] $npcs */
    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
    }




    /**
     * Serializes an instance of `Enf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Enf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Enf $data): void {
        $writer->addFixedString('ENF', 3, false);

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
        if ($data->getTotalNpcsCount() == null)
        {
            throw new SerializationError('totalNpcsCount must be provided.');
        }
        $writer->addShort($data->getTotalNpcsCount());

        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->getVersion());

        if ($data->getNpcs() == null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            EnfRecord::serialize($writer, $data->getNpcs()[$i]);

        }

    }

    /**
     * Deserializes an instance of `Enf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Enf The deserialized data.
     */
    public static function deserialize(EoReader $reader): Enf
    {
        $data = new Enf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->rid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->rid[] = $reader->getShort();
            }
            $data->setTotalNpcsCount($reader->getShort());
            $data->setVersion($reader->getChar());
            $npcs_length = (int) $reader->getRemaining() / 39;
            $data->npcs = [];
            for ($i = 0; $i < $npcs_length; $i++)
            {
                $data->npcs[] = EnfRecord::deserialize($reader);
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
        return "Enf(byteSize=$this->byteSize, rid=".var_export($this->rid, true).", totalNpcsCount=".var_export($this->totalNpcsCount, true).", version=".var_export($this->version, true).", npcs=".var_export($this->npcs, true).")";
    }

}


