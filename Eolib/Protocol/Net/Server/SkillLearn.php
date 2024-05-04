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
use Eolib\Protocol\Net\Server\CharacterBaseStats;
use Eolib\Protocol\SerializationError;


class SkillLearn
{
    private int $byteSize = 0;
    /** @var int */
    private int $id;
    /** @var int */
    private int $levelRequirement;
    /** @var int */
    private int $classRequirement;
    /** @var int */
    private int $cost;
    /** @var int[] */
    public array $skillRequirements = [];
    /** @var CharacterBaseStats */
    private CharacterBaseStats $statRequirements;

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
    public function getId(): int
    {
        return $this->id;
    }

    /** @param int $id */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    /** @return int */
    public function getLevelRequirement(): int
    {
        return $this->levelRequirement;
    }

    /** @param int $levelRequirement */
    public function setLevelRequirement(int $levelRequirement): void
    {
        $this->levelRequirement = $levelRequirement;
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



    /** @return int */
    public function getCost(): int
    {
        return $this->cost;
    }

    /** @param int $cost */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }



    /** @return int[] */
    public function getSkillRequirements(): array
    {
        return $this->skillRequirements;
    }

    /** @param int[] $skillRequirements */
    public function setSkillRequirements(array $skillRequirements): void
    {
        $this->skillRequirements = $skillRequirements;
    }



    /** @return CharacterBaseStats */
    public function getStatRequirements(): CharacterBaseStats
    {
        return $this->statRequirements;
    }

    /** @param CharacterBaseStats $statRequirements */
    public function setStatRequirements(CharacterBaseStats $statRequirements): void
    {
        $this->statRequirements = $statRequirements;
    }




    /**
     * Serializes an instance of `SkillLearn` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SkillLearn $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SkillLearn $data): void {
        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->getId());

        if ($data->getLevelRequirement() == null)
        {
            throw new SerializationError('levelRequirement must be provided.');
        }
        $writer->addChar($data->getLevelRequirement());

        if ($data->getClassRequirement() == null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->getClassRequirement());

        if ($data->getCost() == null)
        {
            throw new SerializationError('cost must be provided.');
        }
        $writer->addInt($data->getCost());

        if ($data->getSkillRequirements() == null)
        {
            throw new SerializationError('skillRequirements must be provided.');
        }
        if (count($data->skillRequirements) != 4)
        {
            throw new SerializationError("Expected length of skillRequirements to be exactly 4, got " . count($data->skillRequirements) . ".");
        }
        for ($i = 0; $i < 4; $i++)
        {
            $writer->addShort($data->getSkillRequirements()[$i]);

        }
        if ($data->getStatRequirements() == null)
        {
            throw new SerializationError('statRequirements must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->getStatRequirements());


    }

    /**
     * Deserializes an instance of `SkillLearn` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SkillLearn The deserialized data.
     */
    public static function deserialize(EoReader $reader): SkillLearn
    {
        $data = new SkillLearn();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setId($reader->getShort());
            $data->setLevelRequirement($reader->getChar());
            $data->setClassRequirement($reader->getChar());
            $data->setCost($reader->getInt());
            $data->skillRequirements = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->skillRequirements[] = $reader->getShort();
            }
            $data->setStatRequirements(CharacterBaseStats::deserialize($reader));

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
        return "SkillLearn(byteSize=$this->byteSize, id=".var_export($this->id, true).", levelRequirement=".var_export($this->levelRequirement, true).", classRequirement=".var_export($this->classRequirement, true).", cost=".var_export($this->cost, true).", skillRequirements=".var_export($this->skillRequirements, true).", statRequirements=".var_export($this->statRequirements, true).")";
    }

}


