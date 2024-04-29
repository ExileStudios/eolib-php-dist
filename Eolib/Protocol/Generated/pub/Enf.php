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
use Eolib\Protocol\Generated\Pub\EnfRecord;
use Eolib\Protocol\SerializationError;


class Enf
{
    private $byteSize = 0;
    private array $rid;
    private int $totalNpcsCount;
    private int $version;
    private array $npcs;

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

    public function getTotalNpcsCount(): int
    {
        return $this->totalNpcsCount;
    }

    public function setTotalNpcsCount(int $totalNpcsCount): void
    {
        $this->totalNpcsCount = $totalNpcsCount;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    public function getNpcs(): array
    {
        return $this->npcs;
    }

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
        if ($data->totalNpcsCount === null)
        {
            throw new SerializationError('totalNpcsCount must be provided.');
        }
        $writer->addShort($data->totalNpcsCount);

        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->version);

        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            EnfRecord::serialize($writer, $data->npcs[$i]);

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
            $data->totalNpcsCount = $reader->getShort();
            $data->version = $reader->getChar();
            $data->npcs = [];
            while ($reader->remaining() > 0)
            {
                $data->npcs[] = EnfRecord::deserialize($reader);
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
        return "Enf(byteSize=' . $this->byteSize . '', rid=' . $this->rid . '', totalNpcsCount=' . $this->totalNpcsCount . '', version=' . $this->version . '', npcs=' . $this->npcs . ')";
    }

}


