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
use Eolib\Protocol\Generated\Pub\EsfRecord;
use Eolib\Protocol\SerializationError;


class Esf
{
    private $byteSize = 0;
    private array $rid;
    private int $totalSkillsCount;
    private int $version;
    private array $skills;

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

    public function getTotalSkillsCount(): int
    {
        return $this->totalSkillsCount;
    }

    public function setTotalSkillsCount(int $totalSkillsCount): void
    {
        $this->totalSkillsCount = $totalSkillsCount;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }


    /**
     * Serializes an instance of `Esf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Esf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Esf $data): void {
        $writer->addFixedString('ESF', 3, false);

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
        if ($data->totalSkillsCount === null)
        {
            throw new SerializationError('totalSkillsCount must be provided.');
        }
        $writer->addShort($data->totalSkillsCount);

        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->version);

        if ($data->skills === null)
        {
            throw new SerializationError('skills must be provided.');
        }
        for ($i = 0; $i < count($data->skills); $i++)
        {
            EsfRecord::serialize($writer, $data->skills[$i]);

        }

    }

    /**
     * Deserializes an instance of `Esf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Esf The deserialized data.
     */
    public static function deserialize(EoReader $reader): Esf
    {
        $data = new Esf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->rid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->rid[] = $reader->getShort();
            }
            $data->totalSkillsCount = $reader->getShort();
            $data->version = $reader->getChar();
            $data->skills = [];
            while ($reader->remaining() > 0)
            {
                $data->skills[] = EsfRecord::deserialize($reader);
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
        return "Esf(byteSize=' . $this->byteSize . '', rid=' . $this->rid . '', totalSkillsCount=' . $this->totalSkillsCount . '', version=' . $this->version . '', skills=' . $this->skills . ')";
    }

}


