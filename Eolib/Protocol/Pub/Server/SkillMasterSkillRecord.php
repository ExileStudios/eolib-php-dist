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
use Eolib\Protocol\SerializationError;


class SkillMasterSkillRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $skillId;
    /** @var int */
    private int $levelRequirement;
    /** @var int */
    private int $classRequirement;
    /** @var int */
    private int $price;
    /** @var int[] */
    public array $skillRequirements = [];
    /** @var int */
    private int $strRequirement;
    /** @var int */
    private int $intRequirement;
    /** @var int */
    private int $wisRequirement;
    /** @var int */
    private int $agiRequirement;
    /** @var int */
    private int $conRequirement;
    /** @var int */
    private int $chaRequirement;

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
    public function getSkillId(): int
    {
        return $this->skillId;
    }

    /** @param int $skillId */
    public function setSkillId(int $skillId): void
    {
        $this->skillId = $skillId;
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
    public function getPrice(): int
    {
        return $this->price;
    }

    /** @param int $price */
    public function setPrice(int $price): void
    {
        $this->price = $price;
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



    /** @return int */
    public function getStrRequirement(): int
    {
        return $this->strRequirement;
    }

    /** @param int $strRequirement */
    public function setStrRequirement(int $strRequirement): void
    {
        $this->strRequirement = $strRequirement;
    }



    /** @return int */
    public function getIntRequirement(): int
    {
        return $this->intRequirement;
    }

    /** @param int $intRequirement */
    public function setIntRequirement(int $intRequirement): void
    {
        $this->intRequirement = $intRequirement;
    }



    /** @return int */
    public function getWisRequirement(): int
    {
        return $this->wisRequirement;
    }

    /** @param int $wisRequirement */
    public function setWisRequirement(int $wisRequirement): void
    {
        $this->wisRequirement = $wisRequirement;
    }



    /** @return int */
    public function getAgiRequirement(): int
    {
        return $this->agiRequirement;
    }

    /** @param int $agiRequirement */
    public function setAgiRequirement(int $agiRequirement): void
    {
        $this->agiRequirement = $agiRequirement;
    }



    /** @return int */
    public function getConRequirement(): int
    {
        return $this->conRequirement;
    }

    /** @param int $conRequirement */
    public function setConRequirement(int $conRequirement): void
    {
        $this->conRequirement = $conRequirement;
    }



    /** @return int */
    public function getChaRequirement(): int
    {
        return $this->chaRequirement;
    }

    /** @param int $chaRequirement */
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
        if ($data->getSkillId() == null)
        {
            throw new SerializationError('skillId must be provided.');
        }
        $writer->addShort($data->getSkillId());

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

        if ($data->getPrice() == null)
        {
            throw new SerializationError('price must be provided.');
        }
        $writer->addInt($data->getPrice());

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
        if ($data->getStrRequirement() == null)
        {
            throw new SerializationError('strRequirement must be provided.');
        }
        $writer->addShort($data->getStrRequirement());

        if ($data->getIntRequirement() == null)
        {
            throw new SerializationError('intRequirement must be provided.');
        }
        $writer->addShort($data->getIntRequirement());

        if ($data->getWisRequirement() == null)
        {
            throw new SerializationError('wisRequirement must be provided.');
        }
        $writer->addShort($data->getWisRequirement());

        if ($data->getAgiRequirement() == null)
        {
            throw new SerializationError('agiRequirement must be provided.');
        }
        $writer->addShort($data->getAgiRequirement());

        if ($data->getConRequirement() == null)
        {
            throw new SerializationError('conRequirement must be provided.');
        }
        $writer->addShort($data->getConRequirement());

        if ($data->getChaRequirement() == null)
        {
            throw new SerializationError('chaRequirement must be provided.');
        }
        $writer->addShort($data->getChaRequirement());


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
            $data->setSkillId($reader->getShort());
            $data->setLevelRequirement($reader->getChar());
            $data->setClassRequirement($reader->getChar());
            $data->setPrice($reader->getInt());
            $data->skillRequirements = [];
            for ($i = 0; $i < 4; $i++)
            {
                $data->skillRequirements[] = $reader->getShort();
            }
            $data->setStrRequirement($reader->getShort());
            $data->setIntRequirement($reader->getShort());
            $data->setWisRequirement($reader->getShort());
            $data->setAgiRequirement($reader->getShort());
            $data->setConRequirement($reader->getShort());
            $data->setChaRequirement($reader->getShort());

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
        return "SkillMasterSkillRecord(byteSize=$this->byteSize, skillId=".var_export($this->skillId, true).", levelRequirement=".var_export($this->levelRequirement, true).", classRequirement=".var_export($this->classRequirement, true).", price=".var_export($this->price, true).", skillRequirements=".var_export($this->skillRequirements, true).", strRequirement=".var_export($this->strRequirement, true).", intRequirement=".var_export($this->intRequirement, true).", wisRequirement=".var_export($this->wisRequirement, true).", agiRequirement=".var_export($this->agiRequirement, true).", conRequirement=".var_export($this->conRequirement, true).", chaRequirement=".var_export($this->chaRequirement, true).")";
    }

}


