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
use Eolib\Protocol\Pub\Element;
use Eolib\Protocol\Pub\NpcType;
use Eolib\Protocol\SerializationError;


class EnfRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $nameLength;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $graphicId;
    /** @var int */
    private int $race;
    /** @var bool */
    private bool $boss;
    /** @var bool */
    private bool $child;
    /** @var int */
    private int $type;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $tp;
    /** @var int */
    private int $minDamage;
    /** @var int */
    private int $maxDamage;
    /** @var int */
    private int $accuracy;
    /** @var int */
    private int $evade;
    /** @var int */
    private int $armor;
    /** @var int */
    private int $returnDamage;
    /** @var int */
    private int $element;
    /** @var int */
    private int $elementDamage;
    /** @var int */
    private int $elementWeakness;
    /** @var int */
    private int $elementWeaknessDamage;
    /** @var int */
    private int $level;
    /** @var int */
    private int $experience;

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
    public function getGraphicId(): int
    {
        return $this->graphicId;
    }

    /** @param int $graphicId */
    public function setGraphicId(int $graphicId): void
    {
        $this->graphicId = $graphicId;
    }



    /** @return int */
    public function getRace(): int
    {
        return $this->race;
    }

    /** @param int $race */
    public function setRace(int $race): void
    {
        $this->race = $race;
    }



    /** @return bool */
    public function getBoss(): bool
    {
        return $this->boss;
    }

    /** @param bool $boss */
    public function setBoss(bool $boss): void
    {
        $this->boss = $boss;
    }



    /** @return bool */
    public function getChild(): bool
    {
        return $this->child;
    }

    /** @param bool $child */
    public function setChild(bool $child): void
    {
        $this->child = $child;
    }



    /** @return int */
    public function getType(): int
    {
        return $this->type;
    }

    /** @param int $type */
    public function setType(int $type): void
    {
        $this->type = $type;
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



    /** @return int */
    public function getHp(): int
    {
        return $this->hp;
    }

    /** @param int $hp */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }



    /** @return int */
    public function getTp(): int
    {
        return $this->tp;
    }

    /** @param int $tp */
    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }



    /** @return int */
    public function getMinDamage(): int
    {
        return $this->minDamage;
    }

    /** @param int $minDamage */
    public function setMinDamage(int $minDamage): void
    {
        $this->minDamage = $minDamage;
    }



    /** @return int */
    public function getMaxDamage(): int
    {
        return $this->maxDamage;
    }

    /** @param int $maxDamage */
    public function setMaxDamage(int $maxDamage): void
    {
        $this->maxDamage = $maxDamage;
    }



    /** @return int */
    public function getAccuracy(): int
    {
        return $this->accuracy;
    }

    /** @param int $accuracy */
    public function setAccuracy(int $accuracy): void
    {
        $this->accuracy = $accuracy;
    }



    /** @return int */
    public function getEvade(): int
    {
        return $this->evade;
    }

    /** @param int $evade */
    public function setEvade(int $evade): void
    {
        $this->evade = $evade;
    }



    /** @return int */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /** @param int $armor */
    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }



    /** @return int */
    public function getReturnDamage(): int
    {
        return $this->returnDamage;
    }

    /** @param int $returnDamage */
    public function setReturnDamage(int $returnDamage): void
    {
        $this->returnDamage = $returnDamage;
    }



    /** @return int */
    public function getElement(): int
    {
        return $this->element;
    }

    /** @param int $element */
    public function setElement(int $element): void
    {
        $this->element = $element;
    }



    /** @return int */
    public function getElementDamage(): int
    {
        return $this->elementDamage;
    }

    /** @param int $elementDamage */
    public function setElementDamage(int $elementDamage): void
    {
        $this->elementDamage = $elementDamage;
    }



    /** @return int */
    public function getElementWeakness(): int
    {
        return $this->elementWeakness;
    }

    /** @param int $elementWeakness */
    public function setElementWeakness(int $elementWeakness): void
    {
        $this->elementWeakness = $elementWeakness;
    }



    /** @return int */
    public function getElementWeaknessDamage(): int
    {
        return $this->elementWeaknessDamage;
    }

    /** @param int $elementWeaknessDamage */
    public function setElementWeaknessDamage(int $elementWeaknessDamage): void
    {
        $this->elementWeaknessDamage = $elementWeaknessDamage;
    }



    /** @return int */
    public function getLevel(): int
    {
        return $this->level;
    }

    /** @param int $level */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }



    /** @return int */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /** @param int $experience */
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

        if ($data->getGraphicId() == null)
        {
            throw new SerializationError('graphicId must be provided.');
        }
        $writer->addShort($data->getGraphicId());

        if ($data->getRace() == null)
        {
            throw new SerializationError('race must be provided.');
        }
        $writer->addChar($data->getRace());

        if ($data->getBoss() == null)
        {
            throw new SerializationError('boss must be provided.');
        }
        $writer->addShort((int) $data->getBoss());

        if ($data->getChild() == null)
        {
            throw new SerializationError('child must be provided.');
        }
        $writer->addShort((int) $data->getChild());

        if ($data->getType() == null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addShort((int) $data->getType());

        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->getBehaviorId());

        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addThree($data->getHp());

        if ($data->getTp() == null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->getTp());

        if ($data->getMinDamage() == null)
        {
            throw new SerializationError('minDamage must be provided.');
        }
        $writer->addShort($data->getMinDamage());

        if ($data->getMaxDamage() == null)
        {
            throw new SerializationError('maxDamage must be provided.');
        }
        $writer->addShort($data->getMaxDamage());

        if ($data->getAccuracy() == null)
        {
            throw new SerializationError('accuracy must be provided.');
        }
        $writer->addShort($data->getAccuracy());

        if ($data->getEvade() == null)
        {
            throw new SerializationError('evade must be provided.');
        }
        $writer->addShort($data->getEvade());

        if ($data->getArmor() == null)
        {
            throw new SerializationError('armor must be provided.');
        }
        $writer->addShort($data->getArmor());

        if ($data->getReturnDamage() == null)
        {
            throw new SerializationError('returnDamage must be provided.');
        }
        $writer->addChar($data->getReturnDamage());

        if ($data->getElement() == null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addShort((int) $data->getElement());

        if ($data->getElementDamage() == null)
        {
            throw new SerializationError('elementDamage must be provided.');
        }
        $writer->addShort($data->getElementDamage());

        if ($data->getElementWeakness() == null)
        {
            throw new SerializationError('elementWeakness must be provided.');
        }
        $writer->addShort((int) $data->getElementWeakness());

        if ($data->getElementWeaknessDamage() == null)
        {
            throw new SerializationError('elementWeaknessDamage must be provided.');
        }
        $writer->addShort($data->getElementWeaknessDamage());

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addThree($data->getExperience());


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
            $data->setNameLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setGraphicId($reader->getShort());
            $data->setRace($reader->getChar());
            $data->setBoss($reader->getShort() !== 0);
            $data->setChild($reader->getShort() !== 0);
            $data->setType($reader->getShort());
            $data->setBehaviorId($reader->getShort());
            $data->setHp($reader->getThree());
            $data->setTp($reader->getShort());
            $data->setMinDamage($reader->getShort());
            $data->setMaxDamage($reader->getShort());
            $data->setAccuracy($reader->getShort());
            $data->setEvade($reader->getShort());
            $data->setArmor($reader->getShort());
            $data->setReturnDamage($reader->getChar());
            $data->setElement($reader->getShort());
            $data->setElementDamage($reader->getShort());
            $data->setElementWeakness($reader->getShort());
            $data->setElementWeaknessDamage($reader->getShort());
            $data->setLevel($reader->getChar());
            $data->setExperience($reader->getThree());

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
        return "EnfRecord(byteSize=$this->byteSize, name=".var_export($this->name, true).", graphicId=".var_export($this->graphicId, true).", race=".var_export($this->race, true).", boss=".var_export($this->boss, true).", child=".var_export($this->child, true).", type=".var_export($this->type, true).", behaviorId=".var_export($this->behaviorId, true).", hp=".var_export($this->hp, true).", tp=".var_export($this->tp, true).", minDamage=".var_export($this->minDamage, true).", maxDamage=".var_export($this->maxDamage, true).", accuracy=".var_export($this->accuracy, true).", evade=".var_export($this->evade, true).", armor=".var_export($this->armor, true).", returnDamage=".var_export($this->returnDamage, true).", element=".var_export($this->element, true).", elementDamage=".var_export($this->elementDamage, true).", elementWeakness=".var_export($this->elementWeakness, true).", elementWeaknessDamage=".var_export($this->elementWeaknessDamage, true).", level=".var_export($this->level, true).", experience=".var_export($this->experience, true).")";
    }

}


