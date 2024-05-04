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
use Eolib\Protocol\Pub\EsfRecord;
use Eolib\Protocol\SerializationError;


class Esf
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $rid = [];
    /** @var int */
    private int $totalSkillsCount;
    /** @var int */
    private int $version;
    /** @var EsfRecord[] */
    public array $skills = [];

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
    public function getTotalSkillsCount(): int
    {
        return $this->totalSkillsCount;
    }

    /** @param int $totalSkillsCount */
    public function setTotalSkillsCount(int $totalSkillsCount): void
    {
        $this->totalSkillsCount = $totalSkillsCount;
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



    /** @return EsfRecord[] */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /** @param EsfRecord[] $skills */
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
        if ($data->getTotalSkillsCount() == null)
        {
            throw new SerializationError('totalSkillsCount must be provided.');
        }
        $writer->addShort($data->getTotalSkillsCount());

        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->getVersion());

        if ($data->getSkills() == null)
        {
            throw new SerializationError('skills must be provided.');
        }
        for ($i = 0; $i < count($data->skills); $i++)
        {
            EsfRecord::serialize($writer, $data->getSkills()[$i]);

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
            $data->setTotalSkillsCount($reader->getShort());
            $data->setVersion($reader->getChar());
            $skills_length = (int) $reader->getRemaining() / 51;
            $data->skills = [];
            for ($i = 0; $i < $skills_length; $i++)
            {
                $data->skills[] = EsfRecord::deserialize($reader);
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
        return "Esf(byteSize=$this->byteSize, rid=".var_export($this->rid, true).", totalSkillsCount=".var_export($this->totalSkillsCount, true).", version=".var_export($this->version, true).", skills=".var_export($this->skills, true).")";
    }

}


