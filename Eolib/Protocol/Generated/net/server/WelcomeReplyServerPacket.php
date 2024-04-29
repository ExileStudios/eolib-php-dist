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
use Eolib\Protocol\Generated\AdminLevel;
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\Spell;
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\Generated\Net\server\CharacterStatsWelcome;
use Eolib\Protocol\Generated\Net\server\EquipmentWelcome;
use Eolib\Protocol\Generated\Net\server\LoginMessageCode;
use Eolib\Protocol\Generated\Net\server\NearbyInfo;
use Eolib\Protocol\Generated\Net\server\ServerSettings;
use Eolib\Protocol\Generated\Net\server\WelcomeCode;
use Eolib\Protocol\SerializationError;

/**
 * Reply to selecting a character / entering game
 */


class WelcomeReplyServerPacket
{
    private $byteSize = 0;
    private int $welcomeCode;
    private ?welcomeCodeData $welcomeCodeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getWelcomeCode(): int
    {
        return $this->welcomeCode;
    }

    public function setWelcomeCode(int $welcomeCode): void
    {
        $this->welcomeCode = $welcomeCode;
    }

    public function welcomeCodeData(): ?welcomeCodeData
    {
        /**
         * WelcomeReplyServerPacket::WelcomeCodeData: Gets or sets the data associated with the `welcomeCode` field.
         */
        return $this->welcomeCodeData;
    }

    public function setWelcomeCodeData($welcomeCodeData): void
    {
        $this->welcomeCodeData = $welcomeCodeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->welcomeCode === null)
        {
            throw new SerializationError('welcomeCode must be provided.');
        }
        $writer->addShort((int) $data->welcomeCode);

        if ($data->welcomeCode === WelcomeCode::SELECTCHARACTER)
        {
            if (!($data->welcomeCodeData instanceof WelcomeCodeDataSelectCharacter))
            {
                throw new \Eolib\Protocol\SerializationError("Expected welcomeCodeData to be of type WelcomeCodeDataSelectCharacter for welcomeCode " . WelcomeCode($data->welcomeCode)->name . ".");
            }
            WelcomeCodeDataSelectCharacter::serialize($writer, $data->welcomeCodeData);
        }
        elseif ($data->welcomeCode === WelcomeCode::ENTERGAME)
        {
            if (!($data->welcomeCodeData instanceof WelcomeCodeDataEnterGame))
            {
                throw new \Eolib\Protocol\SerializationError("Expected welcomeCodeData to be of type WelcomeCodeDataEnterGame for welcomeCode " . WelcomeCode($data->welcomeCode)->name . ".");
            }
            WelcomeCodeDataEnterGame::serialize($writer, $data->welcomeCodeData);
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
            $data->welcomeCode = WelcomeCode($reader->getShort());
            $reader->setChunkedReadingMode(true);
            if ($data->welcomeCode === WelcomeCode::SELECTCHARACTER)
            {
                $data->welcomeCodeData = WelcomeCodeDataSelectCharacter::deserialize($reader);
            }
            elseif ($data->welcomeCode === WelcomeCode::ENTERGAME)
            {
                $data->welcomeCodeData = WelcomeCodeDataEnterGame::deserialize($reader);
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
        return "WelcomeReplyServerPacket(byteSize=' . $this->byteSize . '', welcomeCode=' . $this->welcomeCode . '', welcomeCodeData=' . $this->welcomeCodeData . ')";
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
    private $byteSize = 0;
    private int $sessionId;
    private int $characterId;
    private int $mapId;
    private array $mapRid;
    private int $mapFileSize;
    private array $eifRid;
    private int $eifLength;
    private array $enfRid;
    private int $enfLength;
    private array $esfRid;
    private int $esfLength;
    private array $ecfRid;
    private int $ecfLength;
    private string $name = "";
    private string $title = "";
    private string $guildName = "";
    private string $guildRankName = "";
    private int $classId;
    private string $guildTag = "";
    private int $admin;
    private int $level;
    private int $experience;
    private int $usage;
    private CharacterStatsWelcome $stats;
    private EquipmentWelcome $equipment;
    private int $guildRank;
    private ServerSettings $settings;
    private int $loginMessageCode;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getCharacterId(): int
    {
        return $this->characterId;
    }

    public function setCharacterId(int $characterId): void
    {
        $this->characterId = $characterId;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getMapRid(): array
    {
        return $this->mapRid;
    }

    public function setMapRid(array $mapRid): void
    {
        $this->mapRid = $mapRid;
    }

    public function getMapFileSize(): int
    {
        return $this->mapFileSize;
    }

    public function setMapFileSize(int $mapFileSize): void
    {
        $this->mapFileSize = $mapFileSize;
    }

    public function getEifRid(): array
    {
        return $this->eifRid;
    }

    public function setEifRid(array $eifRid): void
    {
        $this->eifRid = $eifRid;
    }

    public function getEifLength(): int
    {
        return $this->eifLength;
    }

    public function setEifLength(int $eifLength): void
    {
        $this->eifLength = $eifLength;
    }

    public function getEnfRid(): array
    {
        return $this->enfRid;
    }

    public function setEnfRid(array $enfRid): void
    {
        $this->enfRid = $enfRid;
    }

    public function getEnfLength(): int
    {
        return $this->enfLength;
    }

    public function setEnfLength(int $enfLength): void
    {
        $this->enfLength = $enfLength;
    }

    public function getEsfRid(): array
    {
        return $this->esfRid;
    }

    public function setEsfRid(array $esfRid): void
    {
        $this->esfRid = $esfRid;
    }

    public function getEsfLength(): int
    {
        return $this->esfLength;
    }

    public function setEsfLength(int $esfLength): void
    {
        $this->esfLength = $esfLength;
    }

    public function getEcfRid(): array
    {
        return $this->ecfRid;
    }

    public function setEcfRid(array $ecfRid): void
    {
        $this->ecfRid = $ecfRid;
    }

    public function getEcfLength(): int
    {
        return $this->ecfLength;
    }

    public function setEcfLength(int $ecfLength): void
    {
        $this->ecfLength = $ecfLength;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getGuildName(): string
    {
        return $this->guildName;
    }

    public function setGuildName(string $guildName): void
    {
        $this->guildName = $guildName;
    }

    public function getGuildRankName(): string
    {
        return $this->guildRankName;
    }

    public function setGuildRankName(string $guildRankName): void
    {
        $this->guildRankName = $guildRankName;
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

    public function getAdmin(): int
    {
        return $this->admin;
    }

    public function setAdmin(int $admin): void
    {
        $this->admin = $admin;
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

    public function getUsage(): int
    {
        return $this->usage;
    }

    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }

    public function getStats(): CharacterStatsWelcome
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsWelcome $stats): void
    {
        $this->stats = $stats;
    }

    public function getEquipment(): EquipmentWelcome
    {
        return $this->equipment;
    }

    public function setEquipment(EquipmentWelcome $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function getGuildRank(): int
    {
        return $this->guildRank;
    }

    public function setGuildRank(int $guildRank): void
    {
        $this->guildRank = $guildRank;
    }

    public function getSettings(): ServerSettings
    {
        return $this->settings;
    }

    public function setSettings(ServerSettings $settings): void
    {
        $this->settings = $settings;
    }

    public function getLoginMessageCode(): int
    {
        return $this->loginMessageCode;
    }

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
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        if ($data->characterId === null)
        {
            throw new SerializationError('characterId must be provided.');
        }
        $writer->addInt($data->characterId);

        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->mapRid === null)
        {
            throw new SerializationError('mapRid must be provided.');
        }
        if (strlen($data->mapRid) != 2)
        {
            throw new SerializationError("Expected length of mapRid to be exactly 2, got {strlen($data->mapRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->mapRid[$i]);

        }
        if ($data->mapFileSize === null)
        {
            throw new SerializationError('mapFileSize must be provided.');
        }
        $writer->addThree($data->mapFileSize);

        if ($data->eifRid === null)
        {
            throw new SerializationError('eifRid must be provided.');
        }
        if (strlen($data->eifRid) != 2)
        {
            throw new SerializationError("Expected length of eifRid to be exactly 2, got {strlen($data->eifRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->eifRid[$i]);

        }
        if ($data->eifLength === null)
        {
            throw new SerializationError('eifLength must be provided.');
        }
        $writer->addShort($data->eifLength);

        if ($data->enfRid === null)
        {
            throw new SerializationError('enfRid must be provided.');
        }
        if (strlen($data->enfRid) != 2)
        {
            throw new SerializationError("Expected length of enfRid to be exactly 2, got {strlen($data->enfRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->enfRid[$i]);

        }
        if ($data->enfLength === null)
        {
            throw new SerializationError('enfLength must be provided.');
        }
        $writer->addShort($data->enfLength);

        if ($data->esfRid === null)
        {
            throw new SerializationError('esfRid must be provided.');
        }
        if (strlen($data->esfRid) != 2)
        {
            throw new SerializationError("Expected length of esfRid to be exactly 2, got {strlen($data->esfRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->esfRid[$i]);

        }
        if ($data->esfLength === null)
        {
            throw new SerializationError('esfLength must be provided.');
        }
        $writer->addShort($data->esfLength);

        if ($data->ecfRid === null)
        {
            throw new SerializationError('ecfRid must be provided.');
        }
        if (strlen($data->ecfRid) != 2)
        {
            throw new SerializationError("Expected length of ecfRid to be exactly 2, got {strlen($data->ecfRid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->ecfRid[$i]);

        }
        if ($data->ecfLength === null)
        {
            throw new SerializationError('ecfLength must be provided.');
        }
        $writer->addShort($data->ecfLength);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->title === null)
        {
            throw new SerializationError('title must be provided.');
        }
        $writer->addString($data->title);

        $writer->addByte(0xFF);
        if ($data->guildName === null)
        {
            throw new SerializationError('guildName must be provided.');
        }
        $writer->addString($data->guildName);

        $writer->addByte(0xFF);
        if ($data->guildRankName === null)
        {
            throw new SerializationError('guildRankName must be provided.');
        }
        $writer->addString($data->guildRankName);

        $writer->addByte(0xFF);
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

        if ($data->admin === null)
        {
            throw new SerializationError('admin must be provided.');
        }
        $writer->addChar((int) $data->admin);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->experience);

        if ($data->usage === null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->usage);

        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsWelcome::serialize($writer, $data->stats);

        if ($data->equipment === null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentWelcome::serialize($writer, $data->equipment);

        if ($data->guildRank === null)
        {
            throw new SerializationError('guildRank must be provided.');
        }
        $writer->addChar($data->guildRank);

        if ($data->settings === null)
        {
            throw new SerializationError('settings must be provided.');
        }
        ServerSettings::serialize($writer, $data->settings);

        if ($data->loginMessageCode === null)
        {
            throw new SerializationError('loginMessageCode must be provided.');
        }
        $writer->addChar((int) $data->loginMessageCode);

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
            $data->sessionId = $reader->getShort();
            $data->characterId = $reader->getInt();
            $data->mapId = $reader->getShort();
            $data->mapRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->mapRid[] = $reader->getShort();
            }
            $data->mapFileSize = $reader->getThree();
            $data->eifRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->eifRid[] = $reader->getShort();
            }
            $data->eifLength = $reader->getShort();
            $data->enfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->enfRid[] = $reader->getShort();
            }
            $data->enfLength = $reader->getShort();
            $data->esfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->esfRid[] = $reader->getShort();
            }
            $data->esfLength = $reader->getShort();
            $data->ecfRid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->ecfRid[] = $reader->getShort();
            }
            $data->ecfLength = $reader->getShort();
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->title = $reader->getString();
            $reader->nextChunk();
            $data->guildName = $reader->getString();
            $reader->nextChunk();
            $data->guildRankName = $reader->getString();
            $reader->nextChunk();
            $data->classId = $reader->getChar();
            $data->guildTag = $reader->getFixedString(3, false);
            $data->admin = AdminLevel($reader->getChar());
            $data->level = $reader->getChar();
            $data->experience = $reader->getInt();
            $data->usage = $reader->getInt();
            $data->stats = CharacterStatsWelcome::deserialize($reader);
            $data->equipment = EquipmentWelcome::deserialize($reader);
            $data->guildRank = $reader->getChar();
            $data->settings = ServerSettings::deserialize($reader);
            $data->loginMessageCode = LoginMessageCode($reader->getChar());
            $reader->nextChunk();

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
        return "WelcomeCodeDataSelectCharacter(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', characterId=' . $this->characterId . '', mapId=' . $this->mapId . '', mapRid=' . $this->mapRid . '', mapFileSize=' . $this->mapFileSize . '', eifRid=' . $this->eifRid . '', eifLength=' . $this->eifLength . '', enfRid=' . $this->enfRid . '', enfLength=' . $this->enfLength . '', esfRid=' . $this->esfRid . '', esfLength=' . $this->esfLength . '', ecfRid=' . $this->ecfRid . '', ecfLength=' . $this->ecfLength . '', name=' . $this->name . '', title=' . $this->title . '', guildName=' . $this->guildName . '', guildRankName=' . $this->guildRankName . '', classId=' . $this->classId . '', guildTag=' . $this->guildTag . '', admin=' . $this->admin . '', level=' . $this->level . '', experience=' . $this->experience . '', usage=' . $this->usage . '', stats=' . $this->stats . '', equipment=' . $this->equipment . '', guildRank=' . $this->guildRank . '', settings=' . $this->settings . '', loginMessageCode=' . $this->loginMessageCode . ')";
    }

}



/**
 * Data associated with welcomeCode value WelcomeCode::ENTERGAME
 */

class WelcomeCodeDataEnterGame implements WelcomeCodeData
{
    private $byteSize = 0;
    private array $news = "";
    private Weight $weight;
    private array $items;
    private array $spells;
    private NearbyInfo $nearby;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNews(): array
    {
        return $this->news;
    }

    public function setNews(array $news): void
    {
        $this->news = $news;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getSpells(): array
    {
        return $this->spells;
    }

    public function setSpells(array $spells): void
    {
        $this->spells = $spells;
    }

    public function getNearby(): NearbyInfo
    {
        return $this->nearby;
    }

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
        if ($data->news === null)
        {
            throw new SerializationError('news must be provided.');
        }
        if (strlen($data->news) != 9)
        {
            throw new SerializationError("Expected length of news to be exactly 9, got {strlen($data->news)}.");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->news[$i]);

        }
        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);

        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            Item::serialize($writer, $data->items[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->spells === null)
        {
            throw new SerializationError('spells must be provided.');
        }
        for ($i = 0; $i < count($data->spells); $i++)
        {
            Spell::serialize($writer, $data->spells[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->nearby === null)
        {
            throw new SerializationError('nearby must be provided.');
        }
        NearbyInfo::serialize($writer, $data->nearby);


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
            $data->weight = Weight::deserialize($reader);
            $items_length = (int) $reader->remaining() / 6;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $spells_length = (int) $reader->remaining() / 4;
            $data->spells = [];
            for ($i = 0; $i < $spells_length; $i++)
            {
                $data->spells[] = Spell::deserialize($reader);
            }
            $reader->nextChunk();
            $data->nearby = NearbyInfo::deserialize($reader);

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
        return "WelcomeCodeDataEnterGame(byteSize=' . $this->byteSize . '', news=' . $this->news . '', weight=' . $this->weight . '', items=' . $this->items . '', spells=' . $this->spells . '', nearby=' . $this->nearby . ')";
    }

}





