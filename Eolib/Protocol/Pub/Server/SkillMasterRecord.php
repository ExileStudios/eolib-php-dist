<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\Server\SkillMasterSkillRecord;
use Eolib\Protocol\SerializationError;


class SkillMasterRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $nameLength;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $minLevel;
    /** @var int */
    private int $maxLevel;
    /** @var int */
    private int $classRequirement;
    /** @var int */
    private int $skillsCount;
    /** @var SkillMasterSkillRecord[] */
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

    /** @return int */
    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    /** @param int $behaviorId */
    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }



    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
        $this->nameLength = mb_strlen($this->name);
    }

    /** @return int */
    public function getNameLength(): int
    {
        return $this->nameLength;
    }

    /** @param int $nameLength */
    public function setNameLength(int $nameLength): void
    {
        $this->nameLength = $nameLength;
    }

    /** @return int */
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /** @param int $minLevel */
    public function setMinLevel(int $minLevel): void
    {
        $this->minLevel = $minLevel;
    }



    /** @return int */
    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    /** @param int $maxLevel */
    public function setMaxLevel(int $maxLevel): void
    {
        $this->maxLevel = $maxLevel;
    }



    /** @return int */
    public function getClassRequirement(): int
    {
        return $this->classRequirement;
    }

    /** @param int $classRequirement */
    public function setClassRequirement(int $classRequirement): void
    {
        $this->classRequirement = $classRequirement;
    }



    /** @return SkillMasterSkillRecord[] */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /** @param SkillMasterSkillRecord[] $skills */
    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
        $this->skillsCount = count($this->skills);
    }

    /** @return int */
    public function getSkillsCount(): int
    {
        return $this->skillsCount;
    }

    /** @param int $skillsCount */
    public function setSkillsCount(int $skillsCount): void
    {
        $this->skillsCount = $skillsCount;
    }


    /**
     * Serializes an instance of `SkillMasterRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SkillMasterRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SkillMasterRecord $data): void {
        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->getBehaviorId());

        if ($data->getNameLength() == null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->getNameLength());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got " . strlen($data->name) . ".");
        }
        $writer->addFixedString($data->getName(), $data->getNameLength(), false);

        if ($data->getMinLevel() == null)
        {
            throw new SerializationError('minLevel must be provided.');
        }
        $writer->addChar($data->getMinLevel());

        if ($data->getMaxLevel() == null)
        {
            throw new SerializationError('maxLevel must be provided.');
        }
        $writer->addChar($data->getMaxLevel());

        if ($data->getClassRequirement() == null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->getClassRequirement());

        if ($data->getSkillsCount() == null)
        {
            throw new SerializationError('skillsCount must be provided.');
        }
        $writer->addShort($data->getSkillsCount());

        if ($data->getSkills() == null)
        {
            throw new SerializationError('skills must be provided.');
        }
        if (count($data->skills) > 64008)
        {
            throw new SerializationError("Expected length of skills to be 64008 or less, got " . count($data->skills) . ".");
        }
        for ($i = 0; $i < $data->getSkillsCount(); $i++)
        {
            SkillMasterSkillRecord::serialize($writer, $data->getSkills()[$i]);

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
            $data->setBehaviorId($reader->getShort());
            $data->setNameLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setMinLevel($reader->getChar());
            $data->setMaxLevel($reader->getChar());
            $data->setClassRequirement($reader->getChar());
            $data->setSkillsCount($reader->getShort());
            $data->skills = [];
            for ($i = 0; $i < $data->getSkillsCount(); $i++)
            {
                $data->skills[] = SkillMasterSkillRecord::deserialize($reader);
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
        return "SkillMasterRecord(byteSize=$this->byteSize, behaviorId=".var_export($this->behaviorId, true).", name=".var_export($this->name, true).", minLevel=".var_export($this->minLevel, true).", maxLevel=".var_export($this->maxLevel, true).", classRequirement=".var_export($this->classRequirement, true).", skills=".var_export($this->skills, true).")";
    }

}


