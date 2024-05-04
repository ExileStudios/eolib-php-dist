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
use Eolib\Protocol\AdminLevel;
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Server\CharacterStatsWelcome;
use Eolib\Protocol\Net\Server\EquipmentWelcome;
use Eolib\Protocol\Net\Server\LoginMessageCode;
use Eolib\Protocol\Net\Server\NearbyInfo;
use Eolib\Protocol\Net\Server\ServerSettings;
use Eolib\Protocol\Net\Server\WelcomeCode;
use Eolib\Protocol\Net\Spell;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Reply to selecting a character / entering game
 */


class WelcomeReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $welcomeCode;
    private ?WelcomeCodeData $welcomeCodeData = null;

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
    public function getWelcomeCode(): int
    {
        return $this->welcomeCode;
    }

    /** @param int $welcomeCode */
    public function setWelcomeCode(int $welcomeCode): void
    {
        $this->welcomeCode = $welcomeCode;
    }



    public function getWelcomeCodeData(): ?WelcomeCodeData
    {
        /**
         * WelcomeReplyServerPacket::WelcomeCodeData: Gets or sets the data associated with the `welcomeCode` field.
         */
        return $this->welcomeCodeData;
    }

    public function setWelcomeCodeData(?WelcomeCodeData $welcomeCodeData): void
    {
        $this->welcomeCodeData = $welcomeCodeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeReplyServerPacket $data): void {
        if ($data->getWelcomeCode() == null)
        {
            throw new SerializationError('welcomeCode must be provided.');
        }
        $writer->addShort((int) $data->getWelcomeCode());

        if ($data->welcomeCode === WelcomeCode::SELECTCHARACTER)
        {
            if (!($data->welcomeCodeData instanceof WelcomeCodeDataSelectCharacter))
            {
                throw new \Eolib\Protocol\SerializationError("Expected welcomeCodeData to be of type WelcomeCodeDataSelectCharacter for welcomeCode " . $data->welcomeCode . ".");
            }
            WelcomeCodeDataSelectCharacter::serialize($writer, $data->getWelcomeCodeData());
        }
        elseif ($data->welcomeCode === WelcomeCode::ENTERGAME)
        {
            if (!($data->welcomeCodeData instanceof WelcomeCodeDataEnterGame))
            {
                throw new \Eolib\Protocol\SerializationError("Expected welcomeCodeData to be of type WelcomeCodeDataEnterGame for welcomeCode " . $data->welcomeCode . ".");
            }
            WelcomeCodeDataEnterGame::serialize($writer, $data->getWelcomeCodeData());
        }

    }

    /**
     * Deserializes an instance of `WelcomeReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeReplyServerPacket
    {
        $data = new WelcomeReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setWelcomeCode($reader->getShort());
            $reader->setChunkedReadingMode(true);
            if ($data->welcomeCode === WelcomeCode::SELECTCHARACTER)
            {
                $data->setWelcomeCodeData(WelcomeCodeDataSelectCharacter::deserialize($reader));
            }
            elseif ($data->welcomeCode === WelcomeCode::ENTERGAME)
            {
                $data->setWelcomeCodeData(WelcomeCodeDataEnterGame::deserialize($reader));
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
        return "WelcomeReplyServerPacket(byteSize=$this->byteSize, welcomeCode=".var_export($this->welcomeCode, true).", welcomeCodeData=".var_export($this->welcomeCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `welcomeCode` field.
 */
interface WelcomeCodeData {}

/**
 * Data associated with welcomeCode value WelcomeCode::SELECTCHARACTER
 */

class WelcomeCodeDataSelectCharacter implements WelcomeCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $characterId;
    /** @var int */
    private int $mapId;
    /** @var int[] */
    public array $mapRid = [];
    /** @var int */
    private int $mapFileSize;
    /** @var int[] */
    public array $eifRid = [];
    /** @var int */
    private int $eifLength;
    /** @var int[] */
    public array $enfRid = [];
    /** @var int */
    private int $enfLength;
    /** @var int[] */
    public array $esfRid = [];
    /** @var int */
    private int $esfLength;
    /** @var int[] */
    public array $ecfRid = [];
    /** @var int */
    private int $ecfLength;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $title = "";
    /** @var string */
    private string $guildName = "";
    /** @var string */
    private string $guildRankName = "";
    /** @var int */
    private int $classId;
    /** @var string */
    private string $guildTag = "";
    /** @var int */
    private int $admin;
    /** @var int */
    private int $level;
    /** @var int */
    private int $experience;
    /** @var int */
    private int $usage;
    /** @var CharacterStatsWelcome */
    private CharacterStatsWelcome $stats;
    /** @var EquipmentWelcome */
    private EquipmentWelcome $equipment;
    /** @var int */
    private int $guildRank;
    /** @var ServerSettings */
    private ServerSettings $settings;
    /** @var int */
    private int $loginMessageCode;

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /** @return int */
    public function getCharacterId(): int
    {
        return $this->characterId;
    }

    /** @param int $characterId */
    public function setCharacterId(int $characterId): void
    {
        $this->characterId = $characterId;
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



    /** @return int[] */
    public function getMapRid(): array
    {
        return $this->mapRid;
    }

    /** @param int[] $mapRid */
    public function setMapRid(array $mapRid): void
    {
        $this->mapRid = $mapRid;
    }



    /** @return int */
    public function getMapFileSize(): int
    {
        return $this->mapFileSize;
    }

    /** @param int $mapFileSize */
    public function setMapFileSize(int $mapFileSize): void
    {
        $this->mapFileSize = $mapFileSize;
    }



    /** @return int[] */
    public function getEifRid(): array
    {
        return $this->eifRid;
    }

    /** @param int[] $eifRid */
    public function setEifRid(array $eifRid): void
    {
        $this->eifRid = $eifRid;
    }



    /** @return int */
    public function getEifLength(): int
    {
        return $this->eifLength;
    }

    /** @param int $eifLength */
    public function setEifLength(int $eifLength): void
    {
        $this->eifLength = $eifLength;
    }



    /** @return int[] */
    public function getEnfRid(): array
    {
        return $this->enfRid;
    }

    /** @param int[] $enfRid */
    public function setEnfRid(array $enfRid): void
    {
        $this->enfRid = $enfRid;
    }



    /** @return int */
    public function getEnfLength(): int
    {
        return $this->enfLength;
    }

    /** @param int $enfLength */
    public function setEnfLength(int $enfLength): void
    {
        $this->enfLength = $enfLength;
    }



    /** @return int[] */
    public function getEsfRid(): array
    {
        return $this->esfRid;
    }

    /** @param int[] $esfRid */
    public function setEsfRid(array $esfRid): void
    {
        $this->esfRid = $esfRid;
    }



    /** @return int */
    public function getEsfLength(): int
    {
        return $this->esfLength;
    }

    /** @param int $esfLength */
    public function setEsfLength(int $esfLength): void
    {
        $this->esfLength = $esfLength;
    }



    /** @return int[] */
    public function getEcfRid(): array
    {
        return $this->ecfRid;
    }

    /** @param int[] $ecfRid */
    public function setEcfRid(array $ecfRid): void
    {
        $this->ecfRid = $ecfRid;
    }



    /** @return int */
    public function getEcfLength(): int
    {
        return $this->ecfLength;
    }

    /** @param int $ecfLength */
    public function setEcfLength(int $ecfLength): void
    {
        $this->ecfLength = $ecfLength;
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



    /** @return string */
    public function getTitle(): string
    {
        return $this->title;
    }

    /** @param string $title */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }



    /** @return string */
    public function getGuildName(): string
    {
        return $this->guildName;
    }

    /** @param string $guildName */
    public function setGuildName(string $guildName): void
    {
        $this->guildName = $guildName;
    }



    /** @return string */
    public function getGuildRankName(): string
    {
        return $this->guildRankName;
    }

    /** @param string $guildRankName */
    public function setGuildRankName(string $guildRankName): void
    {
        $this->guildRankName = $guildRankName;
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
    public function getAdmin(): int
    {
        return $this->admin;
    }

    /** @param int $admin */
    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
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



    /** @return int */
    public function getUsage(): int
    {
        return $this->usage;
    }

    /** @param int $usage */
    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }



    /** @return CharacterStatsWelcome */
    public function getStats(): CharacterStatsWelcome
    {
        return $this->stats;
    }

    /** @param CharacterStatsWelcome $stats */
    public function setStats(CharacterStatsWelcome $stats): void
    {
        $this->stats = $stats;
    }



    /** @return EquipmentWelcome */
    public function getEquipment(): EquipmentWelcome
    {
        return $this->equipment;
    }

    /** @param EquipmentWelcome $equipment */
    public function setEquipment(EquipmentWelcome $equipment): void
    {
        $this->equipment = $equipment;
    }



    /** @return int */
    public function getGuildRank(): int
    {
        return $this->guildRank;
    }

    /** @param int $guildRank */
    public function setGuildRank(int $guildRank): void
    {
        $this->guildRank = $guildRank;
    }



    /** @return ServerSettings */
    public function getSettings(): ServerSettings
    {
        return $this->settings;
    }

    /** @param ServerSettings $settings */
    public function setSettings(ServerSettings $settings): void
    {
        $this->settings = $settings;
    }



    /** @return int */
    public function getLoginMessageCode(): int
    {
        return $this->loginMessageCode;
    }

    /** @param int $loginMessageCode */
    public function setLoginMessageCode(int $loginMessageCode): void
    {
        $this->loginMessageCode = $loginMessageCode;
    }




    /**
     * Serializes an instance of `WelcomeCodeDataSelectCharacter` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeCodeDataSelectCharacter $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeCodeDataSelectCharacter $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->getCharacterId() == null)
        {
            throw new SerializationError('characterId must be provided.');
        }
        $writer->addInt($data->getCharacterId());

        if ($data->getMapId() == null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->getMapId());

        if ($data->getMapRid() == null)
        {
            throw new SerializationError('mapRid must be provided.');
        }
        if (count($data->mapRid) != 2)
        {
            throw new SerializationError("Expected length of mapRid to be exactly 2, got " . count($data->mapRid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getMapRid()[$i]);

        }
        if ($data->getMapFileSize() == null)
        {
            throw new SerializationError('mapFileSize must be provided.');
        }
        $writer->addThree($data->getMapFileSize());

        if ($data->getEifRid() == null)
        {
            throw new SerializationError('eifRid must be provided.');
        }
        if (count($data->eifRid) != 2)
        {
            throw new SerializationError("Expected length of eifRid to be exactly 2, got " . count($data->eifRid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getEifRid()[$i]);

        }
        if ($data->getEifLength() == null)
        {
            throw new SerializationError('eifLength must be provided.');
        }
        $writer->addShort($data->getEifLength());

        if ($data->getEnfRid() == null)
        {
            throw new SerializationError('enfRid must be provided.');
        }
        if (count($data->enfRid) != 2)
        {
            throw new SerializationError("Expected length of enfRid to be exactly 2, got " . count($data->enfRid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getEnfRid()[$i]);

        }
        if ($data->getEnfLength() == null)
        {
            throw new SerializationError('enfLength must be provided.');
        }
        $writer->addShort($data->getEnfLength());

        if ($data->getEsfRid() == null)
        {
            throw new SerializationError('esfRid must be provided.');
        }
        if (count($data->esfRid) != 2)
        {
            throw new SerializationError("Expected length of esfRid to be exactly 2, got " . count($data->esfRid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getEsfRid()[$i]);

        }
        if ($data->getEsfLength() == null)
        {
            throw new SerializationError('esfLength must be provided.');
        }
        $writer->addShort($data->getEsfLength());

        if ($data->getEcfRid() == null)
        {
            throw new SerializationError('ecfRid must be provided.');
        }
        if (count($data->ecfRid) != 2)
        {
            throw new SerializationError("Expected length of ecfRid to be exactly 2, got " . count($data->ecfRid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getEcfRid()[$i]);

        }
        if ($data->getEcfLength() == null)
        {
            throw new SerializationError('ecfLength must be provided.');
        }
        $writer->addShort($data->getEcfLength());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getTitle() == null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->getTitle());

        $writer->addByte(0xFF);
        if ($data->getGuildName() == null)
        {
            throw new SerializationError('guildName must be provided.');
        }
        $writer->addString($data->getGuildName());

        $writer->addByte(0xFF);
        if ($data->getGuildRankName() == null)
        {
            throw new SerializationError('guildRankName must be provided.');
        }
        $writer->addString($data->getGuildRankName());

        $writer->addByte(0xFF);
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

        if ($data->getAdmin() == null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->getAdmin());

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->getExperience());

        if ($data->getUsage() == null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->getUsage());

        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsWelcome::serialize($writer, $data->getStats());

        if ($data->getEquipment() == null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentWelcome::serialize($writer, $data->getEquipment());

        if ($data->getGuildRank() == null)
        {
            throw new SerializationError('guildRank must be provided.');
        }
        $writer->addChar($data->getGuildRank());

        if ($data->getSettings() == null)
        {
            throw new SerializationError('settings must be provided.');
        }
        ServerSettings::serialize($writer, $data->getSettings());

        if ($data->getLoginMessageCode() == null)
        {
            throw new SerializationError('loginMessageCode must be provided.');
        }
        $writer->addChar((int) $data->getLoginMessageCode());

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `WelcomeCodeDataSelectCharacter` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeCodeDataSelectCharacter The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeCodeDataSelectCharacter
    {
        $data = new WelcomeCodeDataSelectCharacter();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSessionId($reader->getShort());
            $data->setCharacterId($reader->getInt());
            $data->setMapId($reader->getShort());
            $data->mapRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->mapRid[] = $reader->getShort();
            }
            $data->setMapFileSize($reader->getThree());
            $data->eifRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->eifRid[] = $reader->getShort();
            }
            $data->setEifLength($reader->getShort());
            $data->enfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->enfRid[] = $reader->getShort();
            }
            $data->setEnfLength($reader->getShort());
            $data->esfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->esfRid[] = $reader->getShort();
            }
            $data->setEsfLength($reader->getShort());
            $data->ecfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->ecfRid[] = $reader->getShort();
            }
            $data->setEcfLength($reader->getShort());
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setTitle($reader->getString());
            $reader->nextChunk();
            $data->setGuildName($reader->getString());
            $reader->nextChunk();
            $data->setGuildRankName($reader->getString());
            $reader->nextChunk();
            $data->setClassId($reader->getChar());
            $data->setGuildTag($reader->getFixedString(3, false));
            $data->setAdmin($reader->getChar());
            $data->setLevel($reader->getChar());
            $data->setExperience($reader->getInt());
            $data->setUsage($reader->getInt());
            $data->setStats(CharacterStatsWelcome::deserialize($reader));
            $data->setEquipment(EquipmentWelcome::deserialize($reader));
            $data->setGuildRank($reader->getChar());
            $data->setSettings(ServerSettings::deserialize($reader));
            $data->setLoginMessageCode($reader->getChar());
            $reader->nextChunk();

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
        return "WelcomeCodeDataSelectCharacter(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", characterId=".var_export($this->characterId, true).", mapId=".var_export($this->mapId, true).", mapRid=".var_export($this->mapRid, true).", mapFileSize=".var_export($this->mapFileSize, true).", eifRid=".var_export($this->eifRid, true).", eifLength=".var_export($this->eifLength, true).", enfRid=".var_export($this->enfRid, true).", enfLength=".var_export($this->enfLength, true).", esfRid=".var_export($this->esfRid, true).", esfLength=".var_export($this->esfLength, true).", ecfRid=".var_export($this->ecfRid, true).", ecfLength=".var_export($this->ecfLength, true).", name=$this->name, title=$this->title, guildName=$this->guildName, guildRankName=$this->guildRankName, classId=".var_export($this->classId, true).", guildTag=$this->guildTag, admin=".var_export($this->admin, true).", level=".var_export($this->level, true).", experience=".var_export($this->experience, true).", usage=".var_export($this->usage, true).", stats=".var_export($this->stats, true).", equipment=".var_export($this->equipment, true).", guildRank=".var_export($this->guildRank, true).", settings=".var_export($this->settings, true).", loginMessageCode=".var_export($this->loginMessageCode, true).")";
    }

}



/**
 * Data associated with welcomeCode value WelcomeCode::ENTERGAME
 */

class WelcomeCodeDataEnterGame implements WelcomeCodeData
{
    private int $byteSize = 0;
    /** @var string[] */
    public array $news = [];
    /** @var Weight */
    private Weight $weight;
    /** @var Item[] */
    public array $items = [];
    /** @var Spell[] */
    public array $spells = [];
    /** @var NearbyInfo */
    private NearbyInfo $nearby;

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

    /** @return string[] */
    public function getNews(): array
    {
        return $this->news;
    }

    /** @param string[] $news */
    public function setNews(array $news): void
    {
        $this->news = $news;
    }



    /** @return Weight */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /** @param Weight $weight */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }



    /** @return Item[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param Item[] $items */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }



    /** @return Spell[] */
    public function getSpells(): array
    {
        return $this->spells;
    }

    /** @param Spell[] $spells */
    public function setSpells(array $spells): void
    {
        $this->spells = $spells;
    }



    /** @return NearbyInfo */
    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

    /** @param NearbyInfo $nearby */
    public function setNearby(NearbyInfo $nearby): void
    {
        $this->nearby = $nearby;
    }




    /**
     * Serializes an instance of `WelcomeCodeDataEnterGame` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeCodeDataEnterGame $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeCodeDataEnterGame $data): void {
        $writer->addByte(0xFF);
        if ($data->getNews() == null)
        {
            throw new SerializationError('news must be provided.');
        }
        if (count($data->news) != 9)
        {
            throw new SerializationError("Expected length of news to be exactly 9, got " . count($data->news) . ".");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getNews()[$i]);

        }
        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());

        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            Item::serialize($writer, $data->getItems()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getSpells() == null)
        {
            throw new SerializationError('spells must be provided.');
        }
        for ($i = 0; $i < count($data->spells); $i++)
        {
            Spell::serialize($writer, $data->getSpells()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getNearby() == null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->getNearby());


    }

    /**
     * Deserializes an instance of `WelcomeCodeDataEnterGame` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeCodeDataEnterGame The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeCodeDataEnterGame
    {
        $data = new WelcomeCodeDataEnterGame();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->nextChunk();
            $data->news = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->news[] = $reader->getString();
                if ($i + 1 < 9)
                {
                    $reader->nextChunk();
                }
            }
            $data->setWeight(Weight::deserialize($reader));
            $items_length = (int) $reader->getRemaining() / 6;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $spells_length = (int) $reader->getRemaining() / 4;
            $data->spells = [];
            for ($i = 0; $i < $spells_length; $i++)
            {
                $data->spells[] = Spell::deserialize($reader);
            }
            $reader->nextChunk();
            $data->setNearby(NearbyInfo::deserialize($reader));

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
        return "WelcomeCodeDataEnterGame(byteSize=$this->byteSize, news=".var_export($this->news, true).", weight=".var_export($this->weight, true).", items=".var_export($this->items, true).", spells=".var_export($this->spells, true).", nearby=".var_export($this->nearby, true).")";
    }

}





