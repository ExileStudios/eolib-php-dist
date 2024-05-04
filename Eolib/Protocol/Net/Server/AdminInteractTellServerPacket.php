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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Server\BigCoords;
use Eolib\Protocol\Net\Server\CharacterStatsInfoLookup;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\SerializationError;

/**
 * Admin character info lookup
 */


class AdminInteractTellServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $usage;
    /** @var int */
    private int $exp;
    /** @var int */
    private int $level;
    /** @var int */
    private int $mapId;
    /** @var BigCoords */
    private BigCoords $mapCoords;
    /** @var CharacterStatsInfoLookup */
    private CharacterStatsInfoLookup $stats;
    /** @var Weight */
    private Weight $weight;

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
    public function getUsage(): int
    {
        return $this->usage;
    }

    /** @param int $usage */
    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }



    /** @return int */
    public function getExp(): int
    {
        return $this->exp;
    }

    /** @param int $exp */
    public function setExp(int $exp): void
    {
        $this->exp = $exp;
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
    public function getMapCoords(): BigCoords
    {
        return $this->mapCoords;
    }

    /** @param BigCoords $mapCoords */
    public function setMapCoords(BigCoords $mapCoords): void
    {
        $this->mapCoords = $mapCoords;
    }



    /** @return CharacterStatsInfoLookup */
    public function getStats(): CharacterStatsInfoLookup
    {
        return $this->stats;
    }

    /** @param CharacterStatsInfoLookup $stats */
    public function setStats(CharacterStatsInfoLookup $stats): void
    {
        $this->stats = $stats;
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



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::TELL;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AdminInteractTellServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AdminInteractTellServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AdminInteractTellServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AdminInteractTellServerPacket $data): void {
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getUsage() == null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->getUsage());

        $writer->addByte(0xFF);
        $writer->addByte(0xFF);
        if ($data->getExp() == null)
        {
            throw new SerializationError('exp must be provided.');
        }
        $writer->addInt($data->getExp());

        if ($data->getLevel() == null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->getLevel());

        if ($data->getMapId() == null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->getMapId());

        if ($data->getMapCoords() == null)
        {
            throw new SerializationError('mapCoords must be provided.');
        }
        BigCoords::serialize($writer, $data->getMapCoords());

        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsInfoLookup::serialize($writer, $data->getStats());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());


    }

    /**
     * Deserializes an instance of `AdminInteractTellServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AdminInteractTellServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AdminInteractTellServerPacket
    {
        $data = new AdminInteractTellServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setUsage($reader->getInt());
            $reader->nextChunk();
            $reader->nextChunk();
            $data->setExp($reader->getInt());
            $data->setLevel($reader->getChar());
            $data->setMapId($reader->getShort());
            $data->setMapCoords(BigCoords::deserialize($reader));
            $data->setStats(CharacterStatsInfoLookup::deserialize($reader));
            $data->setWeight(Weight::deserialize($reader));
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
        return "AdminInteractTellServerPacket(byteSize=$this->byteSize, name=$this->name, usage=".var_export($this->usage, true).", exp=".var_export($this->exp, true).", level=".var_export($this->level, true).", mapId=".var_export($this->mapId, true).", mapCoords=".var_export($this->mapCoords, true).", stats=".var_export($this->stats, true).", weight=".var_export($this->weight, true).")";
    }

}



