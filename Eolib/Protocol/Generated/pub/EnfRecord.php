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
use Eolib\Protocol\Generated\Pub\Element;
use Eolib\Protocol\Generated\Pub\NpcType;
use Eolib\Protocol\SerializationError;


class EnfRecord
{
    private $byteSize = 0;
    private int $nameLength;
    private string $name = "";
    private int $graphicId;
    private int $race;
    private bool $boss;
    private bool $child;
    private int $type;
    private int $behaviorId;
    private int $hp;
    private int $tp;
    private int $minDamage;
    private int $maxDamage;
    private int $accuracy;
    private int $evade;
    private int $armor;
    private int $returnDamage;
    private int $element;
    private int $elementDamage;
    private int $elementWeakness;
    private int $elementWeaknessDamage;
    private int $level;
    private int $experience;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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

    public function getGraphicId(): int
    {
        return $this->graphicId;
    }

    public function setGraphicId(int $graphicId): void
    {
        $this->graphicId = $graphicId;
    }

    public function getRace(): int
    {
        return $this->race;
    }

    public function setRace(int $race): void
    {
        $this->race = $race;
    }

    public function getBoss(): bool
    {
        return $this->boss;
    }

    public function setBoss(bool $boss): void
    {
        $this->boss = $boss;
    }

    public function getChild(): bool
    {
        return $this->child;
    }

    public function setChild(bool $child): void
    {
        $this->child = $child;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getTp(): int
    {
        return $this->tp;
    }

    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }

    public function getMinDamage(): int
    {
        return $this->minDamage;
    }

    public function setMinDamage(int $minDamage): void
    {
        $this->minDamage = $minDamage;
    }

    public function getMaxDamage(): int
    {
        return $this->maxDamage;
    }

    public function setMaxDamage(int $maxDamage): void
    {
        $this->maxDamage = $maxDamage;
    }

    public function getAccuracy(): int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): void
    {
        $this->accuracy = $accuracy;
    }

    public function getEvade(): int
    {
        return $this->evade;
    }

    public function setEvade(int $evade): void
    {
        $this->evade = $evade;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }

    public function getReturnDamage(): int
    {
        return $this->returnDamage;
    }

    public function setReturnDamage(int $returnDamage): void
    {
        $this->returnDamage = $returnDamage;
    }

    public function getElement(): int
    {
        return $this->element;
    }

    public function setElement(int $element): void
    {
        $this->element = $element;
    }

    public function getElementDamage(): int
    {
        return $this->elementDamage;
    }

    public function setElementDamage(int $elementDamage): void
    {
        $this->elementDamage = $elementDamage;
    }

    public function getElementWeakness(): int
    {
        return $this->elementWeakness;
    }

    public function setElementWeakness(int $elementWeakness): void
    {
        $this->elementWeakness = $elementWeakness;
    }

    public function getElementWeaknessDamage(): int
    {
        return $this->elementWeaknessDamage;
    }

    public function setElementWeaknessDamage(int $elementWeaknessDamage): void
    {
        $this->elementWeaknessDamage = $elementWeaknessDamage;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }


    /**
     * Serializes an instance of `EnfRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EnfRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EnfRecord $data): void {
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

        if ($data->graphicId === null)
        {
            throw new SerializationError('graphicId must be provided.');
        }
        $writer->addShort($data->graphicId);

        if ($data->race === null)
        {
            throw new SerializationError('race must be provided.');
        }
        $writer->addChar($data->race);

        if ($data->boss === null)
        {
            throw new SerializationError('boss must be provided.');
        }
        $writer->addShort($data->boss ? 1 : 0);

        if ($data->child === null)
        {
            throw new SerializationError('child must be provided.');
        }
        $writer->addShort($data->child ? 1 : 0);

        if ($data->type === null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addShort((int) $data->type);

        if ($data->behaviorId === null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->behaviorId);

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addThree($data->hp);

        if ($data->tp === null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->tp);

        if ($data->minDamage === null)
        {
            throw new SerializationError('minDamage must be provided.');
        }
        $writer->addShort($data->minDamage);

        if ($data->maxDamage === null)
        {
            throw new SerializationError('maxDamage must be provided.');
        }
        $writer->addShort($data->maxDamage);

        if ($data->accuracy === null)
        {
            throw new SerializationError('accuracy must be provided.');
        }
        $writer->addShort($data->accuracy);

        if ($data->evade === null)
        {
            throw new SerializationError('evade must be provided.');
        }
        $writer->addShort($data->evade);

        if ($data->armor === null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->armor);

        if ($data->returnDamage === null)
        {
            throw new SerializationError('returnDamage must be provided.');
        }
        $writer->addChar($data->returnDamage);

        if ($data->element === null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addShort((int) $data->element);

        if ($data->elementDamage === null)
        {
            throw new SerializationError('elementDamage must be provided.');
        }
        $writer->addShort($data->elementDamage);

        if ($data->elementWeakness === null)
        {
            throw new SerializationError('elementWeakness must be provided.');
        }
        $writer->addShort((int) $data->elementWeakness);

        if ($data->elementWeaknessDamage === null)
        {
            throw new SerializationError('elementWeaknessDamage must be provided.');
        }
        $writer->addShort($data->elementWeaknessDamage);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addThree($data->experience);


    }

    /**
     * Deserializes an instance of `EnfRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EnfRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): EnfRecord
    {
        $data = new EnfRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->nameLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->graphicId = $reader->getShort();
            $data->race = $reader->getChar();
            $data->boss = $reader->getShort() !== 0;
            $data->child = $reader->getShort() !== 0;
            $data->type = NpcType($reader->getShort());
            $data->behaviorId = $reader->getShort();
            $data->hp = $reader->getThree();
            $data->tp = $reader->getShort();
            $data->minDamage = $reader->getShort();
            $data->maxDamage = $reader->getShort();
            $data->accuracy = $reader->getShort();
            $data->evade = $reader->getShort();
            $data->armor = $reader->getShort();
            $data->returnDamage = $reader->getChar();
            $data->element = Element($reader->getShort());
            $data->elementDamage = $reader->getShort();
            $data->elementWeakness = Element($reader->getShort());
            $data->elementWeaknessDamage = $reader->getShort();
            $data->level = $reader->getChar();
            $data->experience = $reader->getThree();

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
        return "EnfRecord(byteSize=' . $this->byteSize . '', name=' . $this->name . '', graphicId=' . $this->graphicId . '', race=' . $this->race . '', boss=' . $this->boss . '', child=' . $this->child . '', type=' . $this->type . '', behaviorId=' . $this->behaviorId . '', hp=' . $this->hp . '', tp=' . $this->tp . '', minDamage=' . $this->minDamage . '', maxDamage=' . $this->maxDamage . '', accuracy=' . $this->accuracy . '', evade=' . $this->evade . '', armor=' . $this->armor . '', returnDamage=' . $this->returnDamage . '', element=' . $this->element . '', elementDamage=' . $this->elementDamage . '', elementWeakness=' . $this->elementWeakness . '', elementWeaknessDamage=' . $this->elementWeaknessDamage . '', level=' . $this->level . '', experience=' . $this->experience . ')";
    }

}


