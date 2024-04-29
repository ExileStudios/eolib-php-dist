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
use Eolib\Protocol\Generated\Pub\SkillNature;
use Eolib\Protocol\Generated\Pub\SkillTargetRestrict;
use Eolib\Protocol\Generated\Pub\SkillTargetType;
use Eolib\Protocol\Generated\Pub\SkillType;
use Eolib\Protocol\SerializationError;


class EsfRecord
{
    private $byteSize = 0;
    private int $nameLength;
    private int $chantLength;
    private string $name = "";
    private string $chant = "";
    private int $iconId;
    private int $graphicId;
    private int $tpCost;
    private int $spCost;
    private int $castTime;
    private int $nature;
    private int $type;
    private int $element;
    private int $elementPower;
    private int $targetRestrict;
    private int $targetType;
    private int $targetTime;
    private int $maxSkillLevel;
    private int $minDamage;
    private int $maxDamage;
    private int $accuracy;
    private int $evade;
    private int $armor;
    private int $returnDamage;
    private int $hpHeal;
    private int $tpHeal;
    private int $spHeal;
    private int $str;
    private int $intl;
    private int $wis;
    private int $agi;
    private int $con;
    private int $cha;

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

    public function getChant(): string
    {
        return $this->chant;
    }

    public function setChant(string $chant): void
    {
        $this->chant = $chant;
        $this->chantLength = strlen($this->chant);
    }

    public function getIconId(): int
    {
        return $this->iconId;
    }

    public function setIconId(int $iconId): void
    {
        $this->iconId = $iconId;
    }

    public function getGraphicId(): int
    {
        return $this->graphicId;
    }

    public function setGraphicId(int $graphicId): void
    {
        $this->graphicId = $graphicId;
    }

    public function getTpCost(): int
    {
        return $this->tpCost;
    }

    public function setTpCost(int $tpCost): void
    {
        $this->tpCost = $tpCost;
    }

    public function getSpCost(): int
    {
        return $this->spCost;
    }

    public function setSpCost(int $spCost): void
    {
        $this->spCost = $spCost;
    }

    public function getCastTime(): int
    {
        return $this->castTime;
    }

    public function setCastTime(int $castTime): void
    {
        $this->castTime = $castTime;
    }

    public function getNature(): int
    {
        return $this->nature;
    }

    public function setNature(int $nature): void
    {
        $this->nature = $nature;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getElement(): int
    {
        return $this->element;
    }

    public function setElement(int $element): void
    {
        $this->element = $element;
    }

    public function getElementPower(): int
    {
        return $this->elementPower;
    }

    public function setElementPower(int $elementPower): void
    {
        $this->elementPower = $elementPower;
    }

    public function getTargetRestrict(): int
    {
        return $this->targetRestrict;
    }

    public function setTargetRestrict(int $targetRestrict): void
    {
        $this->targetRestrict = $targetRestrict;
    }

    public function getTargetType(): int
    {
        return $this->targetType;
    }

    public function setTargetType(int $targetType): void
    {
        $this->targetType = $targetType;
    }

    public function getTargetTime(): int
    {
        return $this->targetTime;
    }

    public function setTargetTime(int $targetTime): void
    {
        $this->targetTime = $targetTime;
    }

    public function getMaxSkillLevel(): int
    {
        return $this->maxSkillLevel;
    }

    public function setMaxSkillLevel(int $maxSkillLevel): void
    {
        $this->maxSkillLevel = $maxSkillLevel;
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

    public function getHpHeal(): int
    {
        return $this->hpHeal;
    }

    public function setHpHeal(int $hpHeal): void
    {
        $this->hpHeal = $hpHeal;
    }

    public function getTpHeal(): int
    {
        return $this->tpHeal;
    }

    public function setTpHeal(int $tpHeal): void
    {
        $this->tpHeal = $tpHeal;
    }

    public function getSpHeal(): int
    {
        return $this->spHeal;
    }

    public function setSpHeal(int $spHeal): void
    {
        $this->spHeal = $spHeal;
    }

    public function getStr(): int
    {
        return $this->str;
    }

    public function setStr(int $str): void
    {
        $this->str = $str;
    }

    public function getIntl(): int
    {
        return $this->intl;
    }

    public function setIntl(int $intl): void
    {
        $this->intl = $intl;
    }

    public function getWis(): int
    {
        return $this->wis;
    }

    public function setWis(int $wis): void
    {
        $this->wis = $wis;
    }

    public function getAgi(): int
    {
        return $this->agi;
    }

    public function setAgi(int $agi): void
    {
        $this->agi = $agi;
    }

    public function getCon(): int
    {
        return $this->con;
    }

    public function setCon(int $con): void
    {
        $this->con = $con;
    }

    public function getCha(): int
    {
        return $this->cha;
    }

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
        if ($data->nameLength === null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->nameLength);

        if ($data->chantLength === null)
        {
            throw new SerializationError('chantLength must be provided.');
        }
        $writer->addChar($data->chantLength);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got {strlen($data->name)}.");
        }
        $writer->addFixedString($data->name, $data->nameLength, false);

        if ($data->chant === null)
        {
            throw new SerializationError('chant must be provided.');
        }
        if (strlen($data->chant) > 252)
        {
            throw new SerializationError("Expected length of chant to be 252 or less, got {strlen($data->chant)}.");
        }
        $writer->addFixedString($data->chant, $data->chantLength, false);

        if ($data->iconId === null)
        {
            throw new SerializationError('iconId must be provided.');
        }
        $writer->addShort($data->iconId);

        if ($data->graphicId === null)
        {
            throw new SerializationError('graphicId must be provided.');
        }
        $writer->addShort($data->graphicId);

        if ($data->tpCost === null)
        {
            throw new SerializationError('tpCost must be provided.');
        }
        $writer->addShort($data->tpCost);

        if ($data->spCost === null)
        {
            throw new SerializationError('spCost must be provided.');
        }
        $writer->addShort($data->spCost);

        if ($data->castTime === null)
        {
            throw new SerializationError('castTime must be provided.');
        }
        $writer->addChar($data->castTime);

        if ($data->nature === null)
        {
            throw new SerializationError('nature must be provided.');
        }
        $writer->addChar((int) $data->nature);

        $writer->addChar(1);

        if ($data->type === null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addThree((int) $data->type);

        if ($data->element === null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addChar((int) $data->element);

        if ($data->elementPower === null)
        {
            throw new SerializationError('elementPower must be provided.');
        }
        $writer->addShort($data->elementPower);

        if ($data->targetRestrict === null)
        {
            throw new SerializationError('targetRestrict must be provided.');
        }
        $writer->addChar((int) $data->targetRestrict);

        if ($data->targetType === null)
        {
            throw new SerializationError('targetType must be provided.');
        }
        $writer->addChar((int) $data->targetType);

        if ($data->targetTime === null)
        {
            throw new SerializationError('targetTime must be provided.');
        }
        $writer->addChar($data->targetTime);

        $writer->addChar(0);

        if ($data->maxSkillLevel === null)
        {
            throw new SerializationError('maxSkillLevel must be provided.');
        }
        $writer->addShort($data->maxSkillLevel);

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

        if ($data->hpHeal === null)
        {
            throw new SerializationError('hpHeal must be provided.');
        }
        $writer->addShort($data->hpHeal);

        if ($data->tpHeal === null)
        {
            throw new SerializationError('tpHeal must be provided.');
        }
        $writer->addShort($data->tpHeal);

        if ($data->spHeal === null)
        {
            throw new SerializationError('spHeal must be provided.');
        }
        $writer->addChar($data->spHeal);

        if ($data->str === null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addShort($data->str);

        if ($data->intl === null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addShort($data->intl);

        if ($data->wis === null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addShort($data->wis);

        if ($data->agi === null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addShort($data->agi);

        if ($data->con === null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addShort($data->con);

        if ($data->cha === null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addShort($data->cha);


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
            $data->nameLength = $reader->getChar();
            $data->chantLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->chant = $reader->getFixedString($data->chantLength, false);
            $data->iconId = $reader->getShort();
            $data->graphicId = $reader->getShort();
            $data->tpCost = $reader->getShort();
            $data->spCost = $reader->getShort();
            $data->castTime = $reader->getChar();
            $data->nature = SkillNature($reader->getChar());
            $reader->getChar();
            $data->type = SkillType($reader->getThree());
            $data->element = Element($reader->getChar());
            $data->elementPower = $reader->getShort();
            $data->targetRestrict = SkillTargetRestrict($reader->getChar());
            $data->targetType = SkillTargetType($reader->getChar());
            $data->targetTime = $reader->getChar();
            $reader->getChar();
            $data->maxSkillLevel = $reader->getShort();
            $data->minDamage = $reader->getShort();
            $data->maxDamage = $reader->getShort();
            $data->accuracy = $reader->getShort();
            $data->evade = $reader->getShort();
            $data->armor = $reader->getShort();
            $data->returnDamage = $reader->getChar();
            $data->hpHeal = $reader->getShort();
            $data->tpHeal = $reader->getShort();
            $data->spHeal = $reader->getChar();
            $data->str = $reader->getShort();
            $data->intl = $reader->getShort();
            $data->wis = $reader->getShort();
            $data->agi = $reader->getShort();
            $data->con = $reader->getShort();
            $data->cha = $reader->getShort();

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
        return "EsfRecord(byteSize=' . $this->byteSize . '', name=' . $this->name . '', chant=' . $this->chant . '', iconId=' . $this->iconId . '', graphicId=' . $this->graphicId . '', tpCost=' . $this->tpCost . '', spCost=' . $this->spCost . '', castTime=' . $this->castTime . '', nature=' . $this->nature . '', type=' . $this->type . '', element=' . $this->element . '', elementPower=' . $this->elementPower . '', targetRestrict=' . $this->targetRestrict . '', targetType=' . $this->targetType . '', targetTime=' . $this->targetTime . '', maxSkillLevel=' . $this->maxSkillLevel . '', minDamage=' . $this->minDamage . '', maxDamage=' . $this->maxDamage . '', accuracy=' . $this->accuracy . '', evade=' . $this->evade . '', armor=' . $this->armor . '', returnDamage=' . $this->returnDamage . '', hpHeal=' . $this->hpHeal . '', tpHeal=' . $this->tpHeal . '', spHeal=' . $this->spHeal . '', str=' . $this->str . '', intl=' . $this->intl . '', wis=' . $this->wis . '', agi=' . $this->agi . '', con=' . $this->con . '', cha=' . $this->cha . ')";
    }

}


