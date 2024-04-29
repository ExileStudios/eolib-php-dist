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
use Eolib\Protocol\Generated\Net\server\GuildStaff;
use Eolib\Protocol\SerializationError;

/**
 * Get guild info reply
 */


class GuildReportServerPacket
{
    private $byteSize = 0;
    private string $name = "";
    private string $tag = "";
    private string $createDate = "";
    private string $description = "";
    private string $wealth = "";
    private array $ranks = "";
    private int $staffCount;
    private array $staff;

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

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    public function setCreateDate(string $createDate): void
    {
        $this->createDate = $createDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getWealth(): string
    {
        return $this->wealth;
    }

    public function setWealth(string $wealth): void
    {
        $this->wealth = $wealth;
    }

    public function getRanks(): array
    {
        return $this->ranks;
    }

    public function setRanks(array $ranks): void
    {
        $this->ranks = $ranks;
    }

    public function getStaff(): array
    {
        return $this->staff;
    }

    public function setStaff(array $staff): void
    {
        $this->staff = $staff;
        $this->staffCount = strlen($this->staff);
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::GUILD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPORT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildReportServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildReportServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildReportServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildReportServerPacket $data): void {
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->tag === null)
        {
            throw new SerializationError('tag must be provided.');
        }
        $writer->addString($data->tag);

        $writer->addByte(0xFF);
        if ($data->createDate === null)
        {
            throw new SerializationError('createDate must be provided.');
        }
        $writer->addString($data->createDate);

        $writer->addByte(0xFF);
        if ($data->description === null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->description);

        $writer->addByte(0xFF);
        if ($data->wealth === null)
        {
            throw new SerializationError('wealth must be provided.');
        }
        $writer->addString($data->wealth);

        $writer->addByte(0xFF);
        if ($data->ranks === null)
        {
            throw new SerializationError('ranks must be provided.');
        }
        if (strlen($data->ranks) != 9)
        {
            throw new SerializationError("Expected length of ranks to be exactly 9, got {strlen($data->ranks)}.");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->ranks[$i]);

        }
        if ($data->staffCount === null)
        {
            throw new SerializationError('staffCount must be provided.');
        }
        $writer->addShort($data->staffCount);

        $writer->addByte(0xFF);
        if ($data->staff === null)
        {
            throw new SerializationError('staff must be provided.');
        }
        if (strlen($data->staff) > 64008)
        {
            throw new SerializationError("Expected length of staff to be 64008 or less, got {strlen($data->staff)}.");
        }
        for ($i = 0; $i < $data->staffCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            GuildStaff::serialize($writer, $data->staff[$i]);

        }

    }

    /**
     * Deserializes an instance of `GuildReportServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildReportServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildReportServerPacket
    {
        $data = new GuildReportServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->tag = $reader->getString();
            $reader->nextChunk();
            $data->createDate = $reader->getString();
            $reader->nextChunk();
            $data->description = $reader->getString();
            $reader->nextChunk();
            $data->wealth = $reader->getString();
            $reader->nextChunk();
            $data->ranks = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->ranks[] = $reader->getString();
                if ($i + 1 < 9)
                {
                    $reader->nextChunk();
                }
            }
            $data->staffCount = $reader->getShort();
            $reader->nextChunk();
            $data->staff = [];
            for ($i = 0; $i < $data->staffCount; $i++)
            {
                $data->staff[] = GuildStaff::deserialize($reader);
                if ($i + 1 < $data->staffCount)
                {
                    $reader->nextChunk();
                }
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
        return "GuildReportServerPacket(byteSize=' . $this->byteSize . '', name=' . $this->name . '', tag=' . $this->tag . '', createDate=' . $this->createDate . '', description=' . $this->description . '', wealth=' . $this->wealth . '', ranks=' . $this->ranks . '', staff=' . $this->staff . ')";
    }

}



