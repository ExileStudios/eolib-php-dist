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
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\Generated\Gender;
use Eolib\Protocol\Generated\Net\server\BigCoords;
use Eolib\Protocol\Generated\Net\server\EquipmentMapInfo;
use Eolib\Protocol\Generated\Net\server\SitState;
use Eolib\Protocol\Generated\Net\server\WarpEffect;
use Eolib\Protocol\SerializationError;
use typing\cast;


class CharacterMapInfo
{
    private $byteSize = 0;
    private string $name = "";
    private int $playerId;
    private int $mapId;
    private BigCoords $coords;
    private int $direction;
    private int $classId;
    private string $guildTag = "";
    private int $level;
    private int $gender;
    private int $hairStyle;
    private int $hairColor;
    private int $skin;
    private int $maxHp;
    private int $hp;
    private int $maxTp;
    private int $tp;
    private EquipmentMapInfo $equipment;
    private int $sitState;
    private bool $invisible;
    private ?int $warpEffect;

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
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getCoords(): BigCoords
    {
        return $this->coords;
    }

    public function setCoords(BigCoords $coords): void
    {
        $this->coords = $coords;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }

    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }

    public function getSkin(): int
    {
        return $this->skin;
    }

    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }

    public function getTp(): int
    {
        return $this->tp;
    }

    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }

    public function getEquipment(): EquipmentMapInfo
    {
        return $this->equipment;
    }

    public function setEquipment(EquipmentMapInfo $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function getSitState(): int
    {
        return $this->sitState;
    }

    public function setSitState(int $sitState): void
    {
        $this->sitState = $sitState;
    }

    public function getInvisible(): bool
    {
        return $this->invisible;
    }

    public function setInvisible(bool $invisible): void
    {
        $this->invisible = $invisible;
    }

    public function getWarpEffect(): ?int
    {
        return $this->warpEffect;
    }

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
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        BigCoords::serialize($writer, $data->coords);

        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);

        if ($data->classId === null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addChar($data->classId);

        if ($data->guildTag === null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        if (strlen($data->guildTag) != 3)
        {
            throw new SerializationError("Expected length of guildTag to be exactly 3, got {strlen($data->guildTag)}.");
        }
        $writer->addFixedString($data->guildTag, 3, false);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->gender === null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addChar((int) $data->gender);

        if ($data->hairStyle === null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->hairStyle);

        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->hairColor);

        if ($data->skin === null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addChar($data->skin);

        if ($data->maxHp === null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->maxHp);

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->hp);

        if ($data->maxTp === null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->maxTp);

        if ($data->tp === null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->tp);

        if ($data->equipment === null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentMapInfo::serialize($writer, $data->equipment);

        if ($data->sitState === null)
        {
            throw new SerializationError('sitState must be provided.');
        }
        $writer->addChar((int) $data->sitState);

        if ($data->invisible === null)
        {
            throw new SerializationError('invisible must be provided.');
        }
        $writer->addChar($data->invisible ? 1 : 0);

        $reachedMissingOptional = $data->warpEffect === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->warpEffect);

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
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->playerId = $reader->getShort();
            $data->mapId = $reader->getShort();
            $data->coords = BigCoords::deserialize($reader);
            $data->direction = Direction($reader->getChar());
            $data->classId = $reader->getChar();
            $data->guildTag = $reader->getFixedString(3, false);
            $data->level = $reader->getChar();
            $data->gender = Gender($reader->getChar());
            $data->hairStyle = $reader->getChar();
            $data->hairColor = $reader->getChar();
            $data->skin = $reader->getChar();
            $data->maxHp = $reader->getShort();
            $data->hp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->tp = $reader->getShort();
            $data->equipment = EquipmentMapInfo::deserialize($reader);
            $data->sitState = SitState($reader->getChar());
            $data->invisible = $reader->getChar() !== 0;
            if ($reader->remaining() > 0)
            {
                $data->warpEffect = WarpEffect($reader->getChar());
            }
            $reader->setChunkedReadingMode(false);

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
        return "CharacterMapInfo(byteSize=' . $this->byteSize . '', name=' . $this->name . '', playerId=' . $this->playerId . '', mapId=' . $this->mapId . '', coords=' . $this->coords . '', direction=' . $this->direction . '', classId=' . $this->classId . '', guildTag=' . $this->guildTag . '', level=' . $this->level . '', gender=' . $this->gender . '', hairStyle=' . $this->hairStyle . '', hairColor=' . $this->hairColor . '', skin=' . $this->skin . '', maxHp=' . $this->maxHp . '', hp=' . $this->hp . '', maxTp=' . $this->maxTp . '', tp=' . $this->tp . '', equipment=' . $this->equipment . '', sitState=' . $this->sitState . '', invisible=' . $this->invisible . '', warpEffect=' . $this->warpEffect . ')";
    }

}


