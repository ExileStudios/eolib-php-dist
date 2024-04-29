<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\server\SkillMasterSkillRecord;
use Eolib\Protocol\SerializationError;


class SkillMasterRecord
{
    private $byteSize = 0;
    private int $behaviorId;
    private int $nameLength;
    private string $name = "";
    private int $minLevel;
    private int $maxLevel;
    private int $classRequirement;
    private int $skillsCount;
    private array $skills;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->nameLength = strlen($this->name);
    }

    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    public function setMinLevel(int $minLevel): void
    {
        $this->minLevel = $minLevel;
    }

    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    public function setMaxLevel(int $maxLevel): void
    {
        $this->maxLevel = $maxLevel;
    }

    public function getClassRequirement(): int
    {
        return $this->classRequirement;
    }

    public function setClassRequirement(int $classRequirement): void
    {
        $this->classRequirement = $classRequirement;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
        $this->skillsCount = strlen($this->skills);
    }


    /**
     * Serializes an instance of `SkillMasterRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SkillMasterRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SkillMasterRecord $data): void {
        if ($data->behaviorId === null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->behaviorId);

        if ($data->nameLength === null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->nameLength);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got {strlen($data->name)}.");
        }
        $writer->addFixedString($data->name, $data->nameLength, false);

        if ($data->minLevel === null)
        {
            throw new SerializationError('minLevel must be provided.');
        }
        $writer->addChar($data->minLevel);

        if ($data->maxLevel === null)
        {
            throw new SerializationError('maxLevel must be provided.');
        }
        $writer->addChar($data->maxLevel);

        if ($data->classRequirement === null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->classRequirement);

        if ($data->skillsCount === null)
        {
            throw new SerializationError('skillsCount must be provided.');
        }
        $writer->addShort($data->skillsCount);

        if ($data->skills === null)
        {
            throw new SerializationError('skills must be provided.');
        }
        if (strlen($data->skills) > 64008)
        {
            throw new SerializationError("Expected length of skills to be 64008 or less, got {strlen($data->skills)}.");
        }
        for ($i = 0; $i < $data->skillsCount; $i++)
        {
            SkillMasterSkillRecord::serialize($writer, $data->skills[$i]);

        }

    }

    /**
     * Deserializes an instance of `SkillMasterRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SkillMasterRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): SkillMasterRecord
    {
        $data = new SkillMasterRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->behaviorId = $reader->getShort();
            $data->nameLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->minLevel = $reader->getChar();
            $data->maxLevel = $reader->getChar();
            $data->classRequirement = $reader->getChar();
            $data->skillsCount = $reader->getShort();
            $data->skills = [];
            for ($i = 0; $i < $data->skillsCount; $i++)
            {
                $data->skills[] = SkillMasterSkillRecord::deserialize($reader);
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
        return "SkillMasterRecord(byteSize=' . $this->byteSize . '', behaviorId=' . $this->behaviorId . '', name=' . $this->name . '', minLevel=' . $this->minLevel . '', maxLevel=' . $this->maxLevel . '', classRequirement=' . $this->classRequirement . '', skills=' . $this->skills . ')";
    }

}


