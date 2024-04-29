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
use Eolib\Protocol\SerializationError;


class SkillMasterSkillRecord
{
    private $byteSize = 0;
    private int $skillId;
    private int $levelRequirement;
    private int $classRequirement;
    private int $price;
    private array $skillRequirements;
    private int $strRequirement;
    private int $intRequirement;
    private int $wisRequirement;
    private int $agiRequirement;
    private int $conRequirement;
    private int $chaRequirement;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSkillId(): int
    {
        return $this->skillId;
    }

    public function setSkillId(int $skillId): void
    {
        $this->skillId = $skillId;
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

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getSkillRequirements(): array
    {
        return $this->skillRequirements;
    }

    public function setSkillRequirements(array $skillRequirements): void
    {
        $this->skillRequirements = $skillRequirements;
    }

    public function getStrRequirement(): int
    {
        return $this->strRequirement;
    }

    public function setStrRequirement(int $strRequirement): void
    {
        $this->strRequirement = $strRequirement;
    }

    public function getIntRequirement(): int
    {
        return $this->intRequirement;
    }

    public function setIntRequirement(int $intRequirement): void
    {
        $this->intRequirement = $intRequirement;
    }

    public function getWisRequirement(): int
    {
        return $this->wisRequirement;
    }

    public function setWisRequirement(int $wisRequirement): void
    {
        $this->wisRequirement = $wisRequirement;
    }

    public function getAgiRequirement(): int
    {
        return $this->agiRequirement;
    }

    public function setAgiRequirement(int $agiRequirement): void
    {
        $this->agiRequirement = $agiRequirement;
    }

    public function getConRequirement(): int
    {
        return $this->conRequirement;
    }

    public function setConRequirement(int $conRequirement): void
    {
        $this->conRequirement = $conRequirement;
    }

    public function getChaRequirement(): int
    {
        return $this->chaRequirement;
    }

    public function setChaRequirement(int $chaRequirement): void
    {
        $this->chaRequirement = $chaRequirement;
    }


    /**
     * Serializes an instance of `SkillMasterSkillRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SkillMasterSkillRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SkillMasterSkillRecord $data): void {
        if ($data->skillId === null)
        {
            throw new SerializationError('skillId must be provided.');
        }
        $writer->addShort($data->skillId);

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

        if ($data->price === null)
        {
            throw new SerializationError('price must be provided.');
        }
        $writer->addInt($data->price);

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
        if ($data->strRequirement === null)
        {
            throw new SerializationError('strRequirement must be provided.');
        }
        $writer->addShort($data->strRequirement);

        if ($data->intRequirement === null)
        {
            throw new SerializationError('intRequirement must be provided.');
        }
        $writer->addShort($data->intRequirement);

        if ($data->wisRequirement === null)
        {
            throw new SerializationError('wisRequirement must be provided.');
        }
        $writer->addShort($data->wisRequirement);

        if ($data->agiRequirement === null)
        {
            throw new SerializationError('agiRequirement must be provided.');
        }
        $writer->addShort($data->agiRequirement);

        if ($data->conRequirement === null)
        {
            throw new SerializationError('conRequirement must be provided.');
        }
        $writer->addShort($data->conRequirement);

        if ($data->chaRequirement === null)
        {
            throw new SerializationError('chaRequirement must be provided.');
        }
        $writer->addShort($data->chaRequirement);


    }

    /**
     * Deserializes an instance of `SkillMasterSkillRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SkillMasterSkillRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): SkillMasterSkillRecord
    {
        $data = new SkillMasterSkillRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->skillId = $reader->getShort();
            $data->levelRequirement = $reader->getChar();
            $data->classRequirement = $reader->getChar();
            $data->price = $reader->getInt();
            $data->skillRequirements = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->skillRequirements[] = $reader->getShort();
            }
            $data->strRequirement = $reader->getShort();
            $data->intRequirement = $reader->getShort();
            $data->wisRequirement = $reader->getShort();
            $data->agiRequirement = $reader->getShort();
            $data->conRequirement = $reader->getShort();
            $data->chaRequirement = $reader->getShort();

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
        return "SkillMasterSkillRecord(byteSize=' . $this->byteSize . '', skillId=' . $this->skillId . '', levelRequirement=' . $this->levelRequirement . '', classRequirement=' . $this->classRequirement . '', price=' . $this->price . '', skillRequirements=' . $this->skillRequirements . '', strRequirement=' . $this->strRequirement . '', intRequirement=' . $this->intRequirement . '', wisRequirement=' . $this->wisRequirement . '', agiRequirement=' . $this->agiRequirement . '', conRequirement=' . $this->conRequirement . '', chaRequirement=' . $this->chaRequirement . ')";
    }

}


