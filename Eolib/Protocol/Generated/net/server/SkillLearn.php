<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\server\CharacterBaseStats;
use Eolib\Protocol\SerializationError;


class SkillLearn
{
    private $byteSize = 0;
    private int $id;
    private int $levelRequirement;
    private int $classRequirement;
    private int $cost;
    private array $skillRequirements;
    private CharacterBaseStats $statRequirements;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLevelRequirement(): int
    {
        return $this->levelRequirement;
    }

    public function setLevelRequirement(int $levelRequirement): void
    {
        $this->levelRequirement = $levelRequirement;
    }

    public function getClassRequirement(): int
    {
        return $this->classRequirement;
    }

    public function setClassRequirement(int $classRequirement): void
    {
        $this->classRequirement = $classRequirement;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }

    public function getSkillRequirements(): array
    {
        return $this->skillRequirements;
    }

    public function setSkillRequirements(array $skillRequirements): void
    {
        $this->skillRequirements = $skillRequirements;
    }

    public function getStatRequirements(): CharacterBaseStats
    {
        return $this->statRequirements;
    }

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
        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->levelRequirement === null)
        {
            throw new SerializationError('levelRequirement must be provided.');
        }
        $writer->addChar($data->levelRequirement);

        if ($data->classRequirement === null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->classRequirement);

        if ($data->cost === null)
        {
            throw new SerializationError('cost must be provided.');
        }
        $writer->addInt($data->cost);

        if ($data->skillRequirements === null)
        {
            throw new SerializationError('skillRequirements must be provided.');
        }
        if (strlen($data->skillRequirements) != 4)
        {
            throw new SerializationError("Expected length of skillRequirements to be exactly 4, got {strlen($data->skillRequirements)}.");
        }
        for ($i = 0; $i < 4; $i++)
        {
            $writer->addShort($data->skillRequirements[$i]);

        }
        if ($data->statRequirements === null)
        {
            throw new SerializationError('statRequirements must be provided.');
        }
        CharacterBaseStats::serialize($writer, $data->statRequirements);


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
            $data->id = $reader->getShort();
            $data->levelRequirement = $reader->getChar();
            $data->classRequirement = $reader->getChar();
            $data->cost = $reader->getInt();
            $data->skillRequirements = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->skillRequirements[] = $reader->getShort();
            }
            $data->statRequirements = CharacterBaseStats::deserialize($reader);

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
        return "SkillLearn(byteSize=' . $this->byteSize . '', id=' . $this->id . '', levelRequirement=' . $this->levelRequirement . '', classRequirement=' . $this->classRequirement . '', cost=' . $this->cost . '', skillRequirements=' . $this->skillRequirements . '', statRequirements=' . $this->statRequirements . ')";
    }

}


