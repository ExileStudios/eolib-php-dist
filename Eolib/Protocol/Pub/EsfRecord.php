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
use Eolib\Protocol\Pub\SkillNature;
use Eolib\Protocol\Pub\SkillTargetRestrict;
use Eolib\Protocol\Pub\SkillTargetType;
use Eolib\Protocol\Pub\SkillType;
use Eolib\Protocol\SerializationError;


class EsfRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $nameLength;
    /** @var int */
    private int $chantLength;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $chant = "";
    /** @var int */
    private int $iconId;
    /** @var int */
    private int $graphicId;
    /** @var int */
    private int $tpCost;
    /** @var int */
    private int $spCost;
    /** @var int */
    private int $castTime;
    /** @var int */
    private int $nature;
    /** @var int */
    private int $type;
    /** @var int */
    private int $element;
    /** @var int */
    private int $elementPower;
    /** @var int */
    private int $targetRestrict;
    /** @var int */
    private int $targetType;
    /** @var int */
    private int $targetTime;
    /** @var int */
    private int $maxSkillLevel;
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
    private int $hpHeal;
    /** @var int */
    private int $tpHeal;
    /** @var int */
    private int $spHeal;
    /** @var int */
    private int $str;
    /** @var int */
    private int $intl;
    /** @var int */
    private int $wis;
    /** @var int */
    private int $agi;
    /** @var int */
    private int $con;
    /** @var int */
    private int $cha;

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

    /** @return string */
    public function getChant(): string
    {
        return $this->chant;
    }

    /** @param string $chant */
    public function setChant(string $chant): void
    {
        $this->chant = $chant;
        $this->chantLength = mb_strlen($this->chant);
    }

    /** @return int */
    public function getChantLength(): int
    {
        return $this->chantLength;
    }

    /** @param int $chantLength */
    public function setChantLength(int $chantLength): void
    {
        $this->chantLength = $chantLength;
    }

    /** @return int */
    public function getIconId(): int
    {
        return $this->iconId;
    }

    /** @param int $iconId */
    public function setIconId(int $iconId): void
    {
        $this->iconId = $iconId;
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
    public function getTpCost(): int
    {
        return $this->tpCost;
    }

    /** @param int $tpCost */
    public function setTpCost(int $tpCost): void
    {
        $this->tpCost = $tpCost;
    }



    /** @return int */
    public function getSpCost(): int
    {
        return $this->spCost;
    }

    /** @param int $spCost */
    public function setSpCost(int $spCost): void
    {
        $this->spCost = $spCost;
    }



    /** @return int */
    public function getCastTime(): int
    {
        return $this->castTime;
    }

    /** @param int $castTime */
    public function setCastTime(int $castTime): void
    {
        $this->castTime = $castTime;
    }



    /** @return int */
    public function getNature(): int
    {
        return $this->nature;
    }

    /** @param int $nature */
    public function setNature(int $nature): void
    {
        $this->nature = $nature;
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
    public function getElementPower(): int
    {
        return $this->elementPower;
    }

    /** @param int $elementPower */
    public function setElementPower(int $elementPower): void
    {
        $this->elementPower = $elementPower;
    }



    /** @return int */
    public function getTargetRestrict(): int
    {
        return $this->targetRestrict;
    }

    /** @param int $targetRestrict */
    public function setTargetRestrict(int $targetRestrict): void
    {
        $this->targetRestrict = $targetRestrict;
    }



    /** @return int */
    public function getTargetType(): int
    {
        return $this->targetType;
    }

    /** @param int $targetType */
    public function setTargetType(int $targetType): void
    {
        $this->targetType = $targetType;
    }



    /** @return int */
    public function getTargetTime(): int
    {
        return $this->targetTime;
    }

    /** @param int $targetTime */
    public function setTargetTime(int $targetTime): void
    {
        $this->targetTime = $targetTime;
    }



    /** @return int */
    public function getMaxSkillLevel(): int
    {
        return $this->maxSkillLevel;
    }

    /** @param int $maxSkillLevel */
    public function setMaxSkillLevel(int $maxSkillLevel): void
    {
        $this->maxSkillLevel = $maxSkillLevel;
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
    public function getHpHeal(): int
    {
        return $this->hpHeal;
    }

    /** @param int $hpHeal */
    public function setHpHeal(int $hpHeal): void
    {
        $this->hpHeal = $hpHeal;
    }



    /** @return int */
    public function getTpHeal(): int
    {
        return $this->tpHeal;
    }

    /** @param int $tpHeal */
    public function setTpHeal(int $tpHeal): void
    {
        $this->tpHeal = $tpHeal;
    }



    /** @return int */
    public function getSpHeal(): int
    {
        return $this->spHeal;
    }

    /** @param int $spHeal */
    public function setSpHeal(int $spHeal): void
    {
        $this->spHeal = $spHeal;
    }



    /** @return int */
    public function getStr(): int
    {
        return $this->str;
    }

    /** @param int $str */
    public function setStr(int $str): void
    {
        $this->str = $str;
    }



    /** @return int */
    public function getIntl(): int
    {
        return $this->intl;
    }

    /** @param int $intl */
    public function setIntl(int $intl): void
    {
        $this->intl = $intl;
    }



    /** @return int */
    public function getWis(): int
    {
        return $this->wis;
    }

    /** @param int $wis */
    public function setWis(int $wis): void
    {
        $this->wis = $wis;
    }



    /** @return int */
    public function getAgi(): int
    {
        return $this->agi;
    }

    /** @param int $agi */
    public function setAgi(int $agi): void
    {
        $this->agi = $agi;
    }



    /** @return int */
    public function getCon(): int
    {
        return $this->con;
    }

    /** @param int $con */
    public function setCon(int $con): void
    {
        $this->con = $con;
    }



    /** @return int */
    public function getCha(): int
    {
        return $this->cha;
    }

    /** @param int $cha */
    public function setCha(int $cha): void
    {
        $this->cha = $cha;
    }




    /**
     * Serializes an instance of `EsfRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EsfRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EsfRecord $data): void {
        if ($data->getNameLength() == null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->getNameLength());

        if ($data->getChantLength() == null)
        {
            throw new SerializationError('chantLength must be provided.');
        }
        $writer->addChar($data->getChantLength());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got " . strlen($data->name) . ".");
        }
        $writer->addFixedString($data->getName(), $data->getNameLength(), false);

        if ($data->getChant() == null)
        {
            throw new SerializationError('chant must be provided.');
        }
        if (strlen($data->chant) > 252)
        {
            throw new SerializationError("Expected length of chant to be 252 or less, got " . strlen($data->chant) . ".");
        }
        $writer->addFixedString($data->getChant(), $data->getChantLength(), false);

        if ($data->getIconId() == null)
        {
            throw new SerializationError('iconId must be provided.');
        }
        $writer->addShort($data->getIconId());

        if ($data->getGraphicId() == null)
        {
            throw new SerializationError('graphicId must be provided.');
        }
        $writer->addShort($data->getGraphicId());

        if ($data->getTpCost() == null)
        {
            throw new SerializationError('tpCost must be provided.');
        }
        $writer->addShort($data->getTpCost());

        if ($data->getSpCost() == null)
        {
            throw new SerializationError('spCost must be provided.');
        }
        $writer->addShort($data->getSpCost());

        if ($data->getCastTime() == null)
        {
            throw new SerializationError('castTime must be provided.');
        }
        $writer->addChar($data->getCastTime());

        if ($data->getNature() == null)
        {
            throw new SerializationError('nature must be provided.');
        }
        $writer->addChar((int) $data->getNature());

        $writer->addChar(1);

        if ($data->getType() == null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addThree((int) $data->getType());

        if ($data->getElement() == null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addChar((int) $data->getElement());

        if ($data->getElementPower() == null)
        {
            throw new SerializationError('elementPower must be provided.');
        }
        $writer->addShort($data->getElementPower());

        if ($data->getTargetRestrict() == null)
        {
            throw new SerializationError('targetRestrict must be provided.');
        }
        $writer->addChar((int) $data->getTargetRestrict());

        if ($data->getTargetType() == null)
        {
            throw new SerializationError('targetType must be provided.');
        }
        $writer->addChar((int) $data->getTargetType());

        if ($data->getTargetTime() == null)
        {
            throw new SerializationError('targetTime must be provided.');
        }
        $writer->addChar($data->getTargetTime());

        $writer->addChar(0);

        if ($data->getMaxSkillLevel() == null)
        {
            throw new SerializationError('maxSkillLevel must be provided.');
        }
        $writer->addShort($data->getMaxSkillLevel());

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

        if ($data->getHpHeal() == null)
        {
            throw new SerializationError('hpHeal must be provided.');
        }
        $writer->addShort($data->getHpHeal());

        if ($data->getTpHeal() == null)
        {
            throw new SerializationError('tpHeal must be provided.');
        }
        $writer->addShort($data->getTpHeal());

        if ($data->getSpHeal() == null)
        {
            throw new SerializationError('spHeal must be provided.');
        }
        $writer->addChar($data->getSpHeal());

        if ($data->getStr() == null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addShort($data->getStr());

        if ($data->getIntl() == null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addShort($data->getIntl());

        if ($data->getWis() == null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addShort($data->getWis());

        if ($data->getAgi() == null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addShort($data->getAgi());

        if ($data->getCon() == null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addShort($data->getCon());

        if ($data->getCha() == null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addShort($data->getCha());


    }

    /**
     * Deserializes an instance of `EsfRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EsfRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): EsfRecord
    {
        $data = new EsfRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNameLength($reader->getChar());
            $data->setChantLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setChant($reader->getFixedString($data->getChantLength(), false));
            $data->setIconId($reader->getShort());
            $data->setGraphicId($reader->getShort());
            $data->setTpCost($reader->getShort());
            $data->setSpCost($reader->getShort());
            $data->setCastTime($reader->getChar());
            $data->setNature($reader->getChar());
            $reader->getChar();
            $data->setType($reader->getThree());
            $data->setElement($reader->getChar());
            $data->setElementPower($reader->getShort());
            $data->setTargetRestrict($reader->getChar());
            $data->setTargetType($reader->getChar());
            $data->setTargetTime($reader->getChar());
            $reader->getChar();
            $data->setMaxSkillLevel($reader->getShort());
            $data->setMinDamage($reader->getShort());
            $data->setMaxDamage($reader->getShort());
            $data->setAccuracy($reader->getShort());
            $data->setEvade($reader->getShort());
            $data->setArmor($reader->getShort());
            $data->setReturnDamage($reader->getChar());
            $data->setHpHeal($reader->getShort());
            $data->setTpHeal($reader->getShort());
            $data->setSpHeal($reader->getChar());
            $data->setStr($reader->getShort());
            $data->setIntl($reader->getShort());
            $data->setWis($reader->getShort());
            $data->setAgi($reader->getShort());
            $data->setCon($reader->getShort());
            $data->setCha($reader->getShort());

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
        return "EsfRecord(byteSize=$this->byteSize, name=".var_export($this->name, true).", chant=".var_export($this->chant, true).", iconId=".var_export($this->iconId, true).", graphicId=".var_export($this->graphicId, true).", tpCost=".var_export($this->tpCost, true).", spCost=".var_export($this->spCost, true).", castTime=".var_export($this->castTime, true).", nature=".var_export($this->nature, true).", type=".var_export($this->type, true).", element=".var_export($this->element, true).", elementPower=".var_export($this->elementPower, true).", targetRestrict=".var_export($this->targetRestrict, true).", targetType=".var_export($this->targetType, true).", targetTime=".var_export($this->targetTime, true).", maxSkillLevel=".var_export($this->maxSkillLevel, true).", minDamage=".var_export($this->minDamage, true).", maxDamage=".var_export($this->maxDamage, true).", accuracy=".var_export($this->accuracy, true).", evade=".var_export($this->evade, true).", armor=".var_export($this->armor, true).", returnDamage=".var_export($this->returnDamage, true).", hpHeal=".var_export($this->hpHeal, true).", tpHeal=".var_export($this->tpHeal, true).", spHeal=".var_export($this->spHeal, true).", str=".var_export($this->str, true).", intl=".var_export($this->intl, true).", wis=".var_export($this->wis, true).", agi=".var_export($this->agi, true).", con=".var_export($this->con, true).", cha=".var_export($this->cha, true).")";
    }

}


