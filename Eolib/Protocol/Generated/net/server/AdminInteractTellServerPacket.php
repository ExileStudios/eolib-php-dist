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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\Generated\Net\server\BigCoords;
use Eolib\Protocol\Generated\Net\server\CharacterStatsInfoLookup;
use Eolib\Protocol\SerializationError;

/**
 * Admin character info lookup
 */


class AdminInteractTellServerPacket
{
    private $byteSize = 0;
    private string $name = "";
    private int $usage;
    private int $exp;
    private int $level;
    private int $mapId;
    private BigCoords $mapCoords;
    private CharacterStatsInfoLookup $stats;
    private Weight $weight;

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

    public function getUsage(): int
    {
        return $this->usage;
    }

    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }

    public function getExp(): int
    {
        return $this->exp;
    }

    public function setExp(int $exp): void
    {
        $this->exp = $exp;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getMapCoords(): BigCoords
    {
        return $this->mapCoords;
    }

    public function setMapCoords(BigCoords $mapCoords): void
    {
        $this->mapCoords = $mapCoords;
    }

    public function getStats(): CharacterStatsInfoLookup
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsInfoLookup $stats): void
    {
        $this->stats = $stats;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->usage === null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->usage);

        $writer->addByte(0xFF);
        $writer->addByte(0xFF);
        if ($data->exp === null)
        {
            throw new SerializationError('exp must be provided.');
        }
        $writer->addInt($data->exp);

        if ($data->level === null)
        {
            throw new SerializationError('level must be provided.');
        }
        $writer->addChar($data->level);

        if ($data->mapId === null)
        {
            throw new SerializationError('mapId must be provided.');
        }
        $writer->addShort($data->mapId);

        if ($data->mapCoords === null)
        {
            throw new SerializationError('mapCoords must be provided.');
        }
        BigCoords::serialize($writer, $data->mapCoords);

        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsInfoLookup::serialize($writer, $data->stats);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);


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
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->usage = $reader->getInt();
            $reader->nextChunk();
            $reader->nextChunk();
            $data->exp = $reader->getInt();
            $data->level = $reader->getChar();
            $data->mapId = $reader->getShort();
            $data->mapCoords = BigCoords::deserialize($reader);
            $data->stats = CharacterStatsInfoLookup::deserialize($reader);
            $data->weight = Weight::deserialize($reader);
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
        return "AdminInteractTellServerPacket(byteSize=' . $this->byteSize . '', name=' . $this->name . '', usage=' . $this->usage . '', exp=' . $this->exp . '', level=' . $this->level . '', mapId=' . $this->mapId . '', mapCoords=' . $this->mapCoords . '', stats=' . $this->stats . '', weight=' . $this->weight . ')";
    }

}



