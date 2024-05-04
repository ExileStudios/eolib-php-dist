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
use Eolib\Protocol\Pub\ItemSize;
use Eolib\Protocol\Pub\ItemSpecial;
use Eolib\Protocol\Pub\ItemSubtype;
use Eolib\Protocol\Pub\ItemType;
use Eolib\Protocol\SerializationError;


class EifRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $nameLength;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $graphicId;
    /** @var int */
    private int $type;
    /** @var int */
    private int $subtype;
    /** @var int */
    private int $special;
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
    /** @var int */
    private int $lightResistance;
    /** @var int */
    private int $darkResistance;
    /** @var int */
    private int $earthResistance;
    /** @var int */
    private int $airResistance;
    /** @var int */
    private int $waterResistance;
    /** @var int */
    private int $fireResistance;
    /** @var int */
    private int $spec1;
    /** @var int */
    private int $spec2;
    /** @var int */
    private int $spec3;
    /** @var int */
    private int $levelRequirement;
    /** @var int */
    private int $classRequirement;
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
    /** @var int */
    private int $element;
    /** @var int */
    private int $elementDamage;
    /** @var int */
    private int $weight;
    /** @var int */
    private int $size;

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
    public function getSubtype(): int
    {
        return $this->subtype;
    }

    /** @param int $subtype */
    public function setSubtype(int $subtype): void
    {
        $this->subtype = $subtype;
    }



    /** @return int */
    public function getSpecial(): int
    {
        return $this->special;
    }

    /** @param int $special */
    public function setSpecial(int $special): void
    {
        $this->special = $special;
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



    /** @return int */
    public function getLightResistance(): int
    {
        return $this->lightResistance;
    }

    /** @param int $lightResistance */
    public function setLightResistance(int $lightResistance): void
    {
        $this->lightResistance = $lightResistance;
    }



    /** @return int */
    public function getDarkResistance(): int
    {
        return $this->darkResistance;
    }

    /** @param int $darkResistance */
    public function setDarkResistance(int $darkResistance): void
    {
        $this->darkResistance = $darkResistance;
    }



    /** @return int */
    public function getEarthResistance(): int
    {
        return $this->earthResistance;
    }

    /** @param int $earthResistance */
    public function setEarthResistance(int $earthResistance): void
    {
        $this->earthResistance = $earthResistance;
    }



    /** @return int */
    public function getAirResistance(): int
    {
        return $this->airResistance;
    }

    /** @param int $airResistance */
    public function setAirResistance(int $airResistance): void
    {
        $this->airResistance = $airResistance;
    }



    /** @return int */
    public function getWaterResistance(): int
    {
        return $this->waterResistance;
    }

    /** @param int $waterResistance */
    public function setWaterResistance(int $waterResistance): void
    {
        $this->waterResistance = $waterResistance;
    }



    /** @return int */
    public function getFireResistance(): int
    {
        return $this->fireResistance;
    }

    /** @param int $fireResistance */
    public function setFireResistance(int $fireResistance): void
    {
        $this->fireResistance = $fireResistance;
    }



    /** @return int */
    public function getSpec1(): int
    {
        return $this->spec1;
    }

    /** @param int $spec1 */
    public function setSpec1(int $spec1): void
    {
        $this->spec1 = $spec1;
    }



    /** @return int */
    public function getSpec2(): int
    {
        return $this->spec2;
    }

    /** @param int $spec2 */
    public function setSpec2(int $spec2): void
    {
        $this->spec2 = $spec2;
    }



    /** @return int */
    public function getSpec3(): int
    {
        return $this->spec3;
    }

    /** @param int $spec3 */
    public function setSpec3(int $spec3): void
    {
        $this->spec3 = $spec3;
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
    public function getWeight(): int
    {
        return $this->weight;
    }

    /** @param int $weight */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }



    /** @return int */
    public function getSize(): int
    {
        return $this->size;
    }

    /** @param int $size */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }




    /**
     * Serializes an instance of `EifRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EifRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EifRecord $data): void {
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

        if ($data->getType() == null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addChar((int) $data->getType());

        if ($data->getSubtype() == null)
        {
            throw new SerializationError('subtype must be provided.');
        }
        $writer->addChar((int) $data->getSubtype());

        if ($data->getSpecial() == null)
        {
            throw new SerializationError('special must be provided.');
        }
        $writer->addChar((int) $data->getSpecial());

        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->getHp());

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

        if ($data->getStr() == null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addChar($data->getStr());

        if ($data->getIntl() == null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addChar($data->getIntl());

        if ($data->getWis() == null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addChar($data->getWis());

        if ($data->getAgi() == null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addChar($data->getAgi());

        if ($data->getCon() == null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addChar($data->getCon());

        if ($data->getCha() == null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addChar($data->getCha());

        if ($data->getLightResistance() == null)
        {
            throw new SerializationError('lightResistance must be provided.');
        }
        $writer->addChar($data->getLightResistance());

        if ($data->getDarkResistance() == null)
        {
            throw new SerializationError('darkResistance must be provided.');
        }
        $writer->addChar($data->getDarkResistance());

        if ($data->getEarthResistance() == null)
        {
            throw new SerializationError('earthResistance must be provided.');
        }
        $writer->addChar($data->getEarthResistance());

        if ($data->getAirResistance() == null)
        {
            throw new SerializationError('airResistance must be provided.');
        }
        $writer->addChar($data->getAirResistance());

        if ($data->getWaterResistance() == null)
        {
            throw new SerializationError('waterResistance must be provided.');
        }
        $writer->addChar($data->getWaterResistance());

        if ($data->getFireResistance() == null)
        {
            throw new SerializationError('fireResistance must be provided.');
        }
        $writer->addChar($data->getFireResistance());

        if ($data->getSpec1() == null)
        {
            throw new SerializationError('spec1 must be provided.');
        }
        $writer->addThree($data->getSpec1());

        if ($data->getSpec2() == null)
        {
            throw new SerializationError('spec2 must be provided.');
        }
        $writer->addChar($data->getSpec2());

        if ($data->getSpec3() == null)
        {
            throw new SerializationError('spec3 must be provided.');
        }
        $writer->addChar($data->getSpec3());

        if ($data->getLevelRequirement() == null)
        {
            throw new SerializationError('levelRequirement must be provided.');
        }
        $writer->addShort($data->getLevelRequirement());

        if ($data->getClassRequirement() == null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addShort($data->getClassRequirement());

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

        if ($data->getElement() == null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addChar((int) $data->getElement());

        if ($data->getElementDamage() == null)
        {
            throw new SerializationError('elementDamage must be provided.');
        }
        $writer->addChar($data->getElementDamage());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        $writer->addChar($data->getWeight());

        $writer->addChar(0);

        if ($data->getSize() == null)
        {
            throw new SerializationError('size must be provided.');
        }
        $writer->addChar((int) $data->getSize());


    }

    /**
     * Deserializes an instance of `EifRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EifRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): EifRecord
    {
        $data = new EifRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNameLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setGraphicId($reader->getShort());
            $data->setType($reader->getChar());
            $data->setSubtype($reader->getChar());
            $data->setSpecial($reader->getChar());
            $data->setHp($reader->getShort());
            $data->setTp($reader->getShort());
            $data->setMinDamage($reader->getShort());
            $data->setMaxDamage($reader->getShort());
            $data->setAccuracy($reader->getShort());
            $data->setEvade($reader->getShort());
            $data->setArmor($reader->getShort());
            $data->setReturnDamage($reader->getChar());
            $data->setStr($reader->getChar());
            $data->setIntl($reader->getChar());
            $data->setWis($reader->getChar());
            $data->setAgi($reader->getChar());
            $data->setCon($reader->getChar());
            $data->setCha($reader->getChar());
            $data->setLightResistance($reader->getChar());
            $data->setDarkResistance($reader->getChar());
            $data->setEarthResistance($reader->getChar());
            $data->setAirResistance($reader->getChar());
            $data->setWaterResistance($reader->getChar());
            $data->setFireResistance($reader->getChar());
            $data->setSpec1($reader->getThree());
            $data->setSpec2($reader->getChar());
            $data->setSpec3($reader->getChar());
            $data->setLevelRequirement($reader->getShort());
            $data->setClassRequirement($reader->getShort());
            $data->setStrRequirement($reader->getShort());
            $data->setIntRequirement($reader->getShort());
            $data->setWisRequirement($reader->getShort());
            $data->setAgiRequirement($reader->getShort());
            $data->setConRequirement($reader->getShort());
            $data->setChaRequirement($reader->getShort());
            $data->setElement($reader->getChar());
            $data->setElementDamage($reader->getChar());
            $data->setWeight($reader->getChar());
            $reader->getChar();
            $data->setSize($reader->getChar());

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
        return "EifRecord(byteSize=$this->byteSize, name=".var_export($this->name, true).", graphicId=".var_export($this->graphicId, true).", type=".var_export($this->type, true).", subtype=".var_export($this->subtype, true).", special=".var_export($this->special, true).", hp=".var_export($this->hp, true).", tp=".var_export($this->tp, true).", minDamage=".var_export($this->minDamage, true).", maxDamage=".var_export($this->maxDamage, true).", accuracy=".var_export($this->accuracy, true).", evade=".var_export($this->evade, true).", armor=".var_export($this->armor, true).", returnDamage=".var_export($this->returnDamage, true).", str=".var_export($this->str, true).", intl=".var_export($this->intl, true).", wis=".var_export($this->wis, true).", agi=".var_export($this->agi, true).", con=".var_export($this->con, true).", cha=".var_export($this->cha, true).", lightResistance=".var_export($this->lightResistance, true).", darkResistance=".var_export($this->darkResistance, true).", earthResistance=".var_export($this->earthResistance, true).", airResistance=".var_export($this->airResistance, true).", waterResistance=".var_export($this->waterResistance, true).", fireResistance=".var_export($this->fireResistance, true).", spec1=".var_export($this->spec1, true).", spec2=".var_export($this->spec2, true).", spec3=".var_export($this->spec3, true).", levelRequirement=".var_export($this->levelRequirement, true).", classRequirement=".var_export($this->classRequirement, true).", strRequirement=".var_export($this->strRequirement, true).", intRequirement=".var_export($this->intRequirement, true).", wisRequirement=".var_export($this->wisRequirement, true).", agiRequirement=".var_export($this->agiRequirement, true).", conRequirement=".var_export($this->conRequirement, true).", chaRequirement=".var_export($this->chaRequirement, true).", element=".var_export($this->element, true).", elementDamage=".var_export($this->elementDamage, true).", weight=".var_export($this->weight, true).", size=".var_export($this->size, true).")";
    }

}


