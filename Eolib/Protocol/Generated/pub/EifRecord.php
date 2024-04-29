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
use Eolib\Protocol\Generated\Pub\ItemSize;
use Eolib\Protocol\Generated\Pub\ItemSpecial;
use Eolib\Protocol\Generated\Pub\ItemSubtype;
use Eolib\Protocol\Generated\Pub\ItemType;
use Eolib\Protocol\SerializationError;


class EifRecord
{
    private $byteSize = 0;
    private int $nameLength;
    private string $name = "";
    private int $graphicId;
    private int $type;
    private int $subtype;
    private int $special;
    private int $hp;
    private int $tp;
    private int $minDamage;
    private int $maxDamage;
    private int $accuracy;
    private int $evade;
    private int $armor;
    private int $returnDamage;
    private int $str;
    private int $intl;
    private int $wis;
    private int $agi;
    private int $con;
    private int $cha;
    private int $lightResistance;
    private int $darkResistance;
    private int $earthResistance;
    private int $airResistance;
    private int $waterResistance;
    private int $fireResistance;
    private int $spec1;
    private int $spec2;
    private int $spec3;
    private int $levelRequirement;
    private int $classRequirement;
    private int $strRequirement;
    private int $intRequirement;
    private int $wisRequirement;
    private int $agiRequirement;
    private int $conRequirement;
    private int $chaRequirement;
    private int $element;
    private int $elementDamage;
    private int $weight;
    private int $size;

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

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getSubtype(): int
    {
        return $this->subtype;
    }

    public function setSubtype(int $subtype): void
    {
        $this->subtype = $subtype;
    }

    public function getSpecial(): int
    {
        return $this->special;
    }

    public function setSpecial(int $special): void
    {
        $this->special = $special;
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

    public function getLightResistance(): int
    {
        return $this->lightResistance;
    }

    public function setLightResistance(int $lightResistance): void
    {
        $this->lightResistance = $lightResistance;
    }

    public function getDarkResistance(): int
    {
        return $this->darkResistance;
    }

    public function setDarkResistance(int $darkResistance): void
    {
        $this->darkResistance = $darkResistance;
    }

    public function getEarthResistance(): int
    {
        return $this->earthResistance;
    }

    public function setEarthResistance(int $earthResistance): void
    {
        $this->earthResistance = $earthResistance;
    }

    public function getAirResistance(): int
    {
        return $this->airResistance;
    }

    public function setAirResistance(int $airResistance): void
    {
        $this->airResistance = $airResistance;
    }

    public function getWaterResistance(): int
    {
        return $this->waterResistance;
    }

    public function setWaterResistance(int $waterResistance): void
    {
        $this->waterResistance = $waterResistance;
    }

    public function getFireResistance(): int
    {
        return $this->fireResistance;
    }

    public function setFireResistance(int $fireResistance): void
    {
        $this->fireResistance = $fireResistance;
    }

    public function getSpec1(): int
    {
        return $this->spec1;
    }

    public function setSpec1(int $spec1): void
    {
        $this->spec1 = $spec1;
    }

    public function getSpec2(): int
    {
        return $this->spec2;
    }

    public function setSpec2(int $spec2): void
    {
        $this->spec2 = $spec2;
    }

    public function getSpec3(): int
    {
        return $this->spec3;
    }

    public function setSpec3(int $spec3): void
    {
        $this->spec3 = $spec3;
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

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getSize(): int
    {
        return $this->size;
    }

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

        if ($data->type === null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addChar((int) $data->type);

        if ($data->subtype === null)
        {
            throw new SerializationError('subtype must be provided.');
        }
        $writer->addChar((int) $data->subtype);

        if ($data->special === null)
        {
            throw new SerializationError('special must be provided.');
        }
        $writer->addChar((int) $data->special);

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->hp);

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

        if ($data->str === null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addChar($data->str);

        if ($data->intl === null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addChar($data->intl);

        if ($data->wis === null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addChar($data->wis);

        if ($data->agi === null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addChar($data->agi);

        if ($data->con === null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addChar($data->con);

        if ($data->cha === null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addChar($data->cha);

        if ($data->lightResistance === null)
        {
            throw new SerializationError('lightResistance must be provided.');
        }
        $writer->addChar($data->lightResistance);

        if ($data->darkResistance === null)
        {
            throw new SerializationError('darkResistance must be provided.');
        }
        $writer->addChar($data->darkResistance);

        if ($data->earthResistance === null)
        {
            throw new SerializationError('earthResistance must be provided.');
        }
        $writer->addChar($data->earthResistance);

        if ($data->airResistance === null)
        {
            throw new SerializationError('airResistance must be provided.');
        }
        $writer->addChar($data->airResistance);

        if ($data->waterResistance === null)
        {
            throw new SerializationError('waterResistance must be provided.');
        }
        $writer->addChar($data->waterResistance);

        if ($data->fireResistance === null)
        {
            throw new SerializationError('fireResistance must be provided.');
        }
        $writer->addChar($data->fireResistance);

        if ($data->spec1 === null)
        {
            throw new SerializationError('spec1 must be provided.');
        }
        $writer->addThree($data->spec1);

        if ($data->spec2 === null)
        {
            throw new SerializationError('spec2 must be provided.');
        }
        $writer->addChar($data->spec2);

        if ($data->spec3 === null)
        {
            throw new SerializationError('spec3 must be provided.');
        }
        $writer->addChar($data->spec3);

        if ($data->levelRequirement === null)
        {
            throw new SerializationError('levelRequirement must be provided.');
        }
        $writer->addShort($data->levelRequirement);

        if ($data->classRequirement === null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addShort($data->classRequirement);

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

        if ($data->element === null)
        {
            throw new SerializationError('element must be provided.');
        }
        $writer->addChar((int) $data->element);

        if ($data->elementDamage === null)
        {
            throw new SerializationError('elementDamage must be provided.');
        }
        $writer->addChar($data->elementDamage);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        $writer->addChar($data->weight);

        $writer->addChar(0);

        if ($data->size === null)
        {
            throw new SerializationError('size must be provided.');
        }
        $writer->addChar((int) $data->size);


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
            $data->nameLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->graphicId = $reader->getShort();
            $data->type = ItemType($reader->getChar());
            $data->subtype = ItemSubtype($reader->getChar());
            $data->special = ItemSpecial($reader->getChar());
            $data->hp = $reader->getShort();
            $data->tp = $reader->getShort();
            $data->minDamage = $reader->getShort();
            $data->maxDamage = $reader->getShort();
            $data->accuracy = $reader->getShort();
            $data->evade = $reader->getShort();
            $data->armor = $reader->getShort();
            $data->returnDamage = $reader->getChar();
            $data->str = $reader->getChar();
            $data->intl = $reader->getChar();
            $data->wis = $reader->getChar();
            $data->agi = $reader->getChar();
            $data->con = $reader->getChar();
            $data->cha = $reader->getChar();
            $data->lightResistance = $reader->getChar();
            $data->darkResistance = $reader->getChar();
            $data->earthResistance = $reader->getChar();
            $data->airResistance = $reader->getChar();
            $data->waterResistance = $reader->getChar();
            $data->fireResistance = $reader->getChar();
            $data->spec1 = $reader->getThree();
            $data->spec2 = $reader->getChar();
            $data->spec3 = $reader->getChar();
            $data->levelRequirement = $reader->getShort();
            $data->classRequirement = $reader->getShort();
            $data->strRequirement = $reader->getShort();
            $data->intRequirement = $reader->getShort();
            $data->wisRequirement = $reader->getShort();
            $data->agiRequirement = $reader->getShort();
            $data->conRequirement = $reader->getShort();
            $data->chaRequirement = $reader->getShort();
            $data->element = Element($reader->getChar());
            $data->elementDamage = $reader->getChar();
            $data->weight = $reader->getChar();
            $reader->getChar();
            $data->size = ItemSize($reader->getChar());

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
        return "EifRecord(byteSize=' . $this->byteSize . '', name=' . $this->name . '', graphicId=' . $this->graphicId . '', type=' . $this->type . '', subtype=' . $this->subtype . '', special=' . $this->special . '', hp=' . $this->hp . '', tp=' . $this->tp . '', minDamage=' . $this->minDamage . '', maxDamage=' . $this->maxDamage . '', accuracy=' . $this->accuracy . '', evade=' . $this->evade . '', armor=' . $this->armor . '', returnDamage=' . $this->returnDamage . '', str=' . $this->str . '', intl=' . $this->intl . '', wis=' . $this->wis . '', agi=' . $this->agi . '', con=' . $this->con . '', cha=' . $this->cha . '', lightResistance=' . $this->lightResistance . '', darkResistance=' . $this->darkResistance . '', earthResistance=' . $this->earthResistance . '', airResistance=' . $this->airResistance . '', waterResistance=' . $this->waterResistance . '', fireResistance=' . $this->fireResistance . '', spec1=' . $this->spec1 . '', spec2=' . $this->spec2 . '', spec3=' . $this->spec3 . '', levelRequirement=' . $this->levelRequirement . '', classRequirement=' . $this->classRequirement . '', strRequirement=' . $this->strRequirement . '', intRequirement=' . $this->intRequirement . '', wisRequirement=' . $this->wisRequirement . '', agiRequirement=' . $this->agiRequirement . '', conRequirement=' . $this->conRequirement . '', chaRequirement=' . $this->chaRequirement . '', element=' . $this->element . '', elementDamage=' . $this->elementDamage . '', weight=' . $this->weight . '', size=' . $this->size . ')";
    }

}


