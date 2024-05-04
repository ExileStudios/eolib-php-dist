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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Gender;
use Eolib\Protocol\Net\Server\BigCoords;
use Eolib\Protocol\Net\Server\EquipmentMapInfo;
use Eolib\Protocol\Net\Server\SitState;
use Eolib\Protocol\Net\Server\WarpEffect;
use Eolib\Protocol\SerializationError;
use typing\cast;


class CharacterMapInfo
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $mapId;
    /** @var BigCoords */
    private BigCoords $coords;
    /** @var int */
    private int $direction;
    /** @var int */
    private int $classId;
    /** @var string */
    private string $guildTag = "";
    /** @var int */
    private int $level;
    /** @var int */
    private int $gender;
    /** @var int */
    private int $hairStyle;
    /** @var int */
    private int $hairColor;
    /** @var int */
    private int $skin;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $maxTp;
    /** @var int */
    private int $tp;
    /** @var EquipmentMapInfo */
    private EquipmentMapInfo $equipment;
    /** @var int */
    private int $sitState;
    /** @var bool */
    private bool $invisible;
    /** @var int */
    private ?int $warpEffect;

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
    }



    /** @return int */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return int */
    public function getMapId(): int
    {
        return $this->mapId;
    }

    /** @param int $mapId */
    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }



    /** @return BigCoords */
    public function getCoords(): BigCoords
    {
        return $this->coords;
    }

    /** @param BigCoords $coords */
    public function setCoords(BigCoords $coords): void
    {
        $this->coords = $coords;
    }



    /** @return int */
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }



    /** @return int */
    public function getClassId(): int
    {
        return $this->classId;
    }

    /** @param int $classId */
    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }



    /** @return string */
    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    /** @param string $guildTag */
    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
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
    public function getGender(): int
    {
        return $this->gender;
    }

    /** @param int $gender */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }



    /** @return int */
    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    /** @param int $hairStyle */
    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }



    /** @return int */
    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    /** @param int $hairColor */
    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }



    /** @return int */
    public function getSkin(): int
    {
        return $this->skin;
    }

    /** @param int $skin */
    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }



    /** @return int */
    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    /** @param int $maxHp */
    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
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
    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    /** @param int $maxTp */
    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
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



    /** @return EquipmentMapInfo */
    public function getEquipment(): EquipmentMapInfo
    {
        return $this->equipment;
    }

    /** @param EquipmentMapInfo $equipment */
    public function setEquipment(EquipmentMapInfo $equipment): void
    {
        $this->equipment = $equipment;
    }



    /** @return int */
    public function getSitState(): int
    {
        return $this->sitState;
    }

    /** @param int $sitState */
    public function setSitState(int $sitState): void
    {
        $this->sitState = $sitState;
    }



    /** @return bool */
    public function getInvisible(): bool
    {
        return $this->invisible;
    }

    /** @param bool $invisible */
    public function setInvisible(bool $invisible): void
    {
        $this->invisible = $invisible;
    }



    /** @return int */
    public function getWarpEffect(): ?int
    {
        return $this->warpEffect;
    }

    /** @param int $warpEffect */
    public function setWarpEffect(?int $warpEffect): void
    {
        $this->warpEffect = $warpEffect;
    }




    /**
     * Serializes an instance of `CharacterMapInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterMapInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterMapInfo $data): void {
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getMapId() == null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->getMapId());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        BigCoords::serialize($writer, $data->getCoords());

        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

        if ($data->getClassId() == null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->getClassId());

        if ($data->getGuildTag() == null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        if (strlen($data->guildTag) != 3)
        {
            throw new SerializationError("Expected length of guildTag to be exactly 3, got " . strlen($data->guildTag) . ".");
        }
        $writer->addFixedString($data->getGuildTag(), 3, false);

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getGender() == null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->getGender());

        if ($data->getHairStyle() == null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->getHairStyle());

        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->getHairColor());

        if ($data->getSkin() == null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addChar($data->getSkin());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->getHp());

        if ($data->getMaxTp() == null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->getMaxTp());

        if ($data->getTp() == null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->getTp());

        if ($data->getEquipment() == null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentMapInfo::serialize($writer, $data->getEquipment());

        if ($data->getSitState() == null)
        {
            throw new SerializationError('sitState must be provided.');
        }
        $writer->addChar((int) $data->getSitState());

        if ($data->getInvisible() == null)
        {
            throw new SerializationError('invisible must be provided.');
        }
        $writer->addChar((int) $data->getInvisible());

        $reachedMissingOptional = $data->warpEffect === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->getWarpEffect());

        }

    }

    /**
     * Deserializes an instance of `CharacterMapInfo` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterMapInfo The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterMapInfo
    {
        $data = new CharacterMapInfo();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setPlayerId($reader->getShort());
            $data->setMapId($reader->getShort());
            $data->setCoords(BigCoords::deserialize($reader));
            $data->setDirection($reader->getChar());
            $data->setClassId($reader->getChar());
            $data->setGuildTag($reader->getFixedString(3, false));
            $data->setLevel($reader->getChar());
            $data->setGender($reader->getChar());
            $data->setHairStyle($reader->getChar());
            $data->setHairColor($reader->getChar());
            $data->setSkin($reader->getChar());
            $data->setMaxHp($reader->getShort());
            $data->setHp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setTp($reader->getShort());
            $data->setEquipment(EquipmentMapInfo::deserialize($reader));
            $data->setSitState($reader->getChar());
            $data->setInvisible($reader->getChar() !== 0);
            if ($reader->getRemaining() > 0)
            {
                $data->setWarpEffect($reader->getChar());
            }
            $reader->setChunkedReadingMode(false);

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
        return "CharacterMapInfo(byteSize=$this->byteSize, name=$this->name, playerId=".var_export($this->playerId, true).", mapId=".var_export($this->mapId, true).", coords=".var_export($this->coords, true).", direction=".var_export($this->direction, true).", classId=".var_export($this->classId, true).", guildTag=$this->guildTag, level=".var_export($this->level, true).", gender=".var_export($this->gender, true).", hairStyle=".var_export($this->hairStyle, true).", hairColor=".var_export($this->hairColor, true).", skin=".var_export($this->skin, true).", maxHp=".var_export($this->maxHp, true).", hp=".var_export($this->hp, true).", maxTp=".var_export($this->maxTp, true).", tp=".var_export($this->tp, true).", equipment=".var_export($this->equipment, true).", sitState=".var_export($this->sitState, true).", invisible=".var_export($this->invisible, true).", warpEffect=".var_export($this->warpEffect, true).")";
    }

}


