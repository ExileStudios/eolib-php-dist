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
use Eolib\Protocol\Net\Server\GuildStaff;
use Eolib\Protocol\SerializationError;

/**
 * Get guild info reply
 */


class GuildReportServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $tag = "";
    /** @var string */
    private string $createDate = "";
    /** @var string */
    private string $description = "";
    /** @var string */
    private string $wealth = "";
    /** @var string[] */
    public array $ranks = [];
    /** @var int */
    private int $staffCount;
    /** @var GuildStaff[] */
    public array $staff = [];

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



    /** @return string */
    public function getTag(): string
    {
        return $this->tag;
    }

    /** @param string $tag */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }



    /** @return string */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /** @param string $createDate */
    public function setCreateDate(string $createDate): void
    {
        $this->createDate = $createDate;
    }



    /** @return string */
    public function getDescription(): string
    {
        return $this->description;
    }

    /** @param string $description */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



    /** @return string */
    public function getWealth(): string
    {
        return $this->wealth;
    }

    /** @param string $wealth */
    public function setWealth(string $wealth): void
    {
        $this->wealth = $wealth;
    }



    /** @return string[] */
    public function getRanks(): array
    {
        return $this->ranks;
    }

    /** @param string[] $ranks */
    public function setRanks(array $ranks): void
    {
        $this->ranks = $ranks;
    }



    /** @return GuildStaff[] */
    public function getStaff(): array
    {
        return $this->staff;
    }

    /** @param GuildStaff[] $staff */
    public function setStaff(array $staff): void
    {
        $this->staff = $staff;
        $this->staffCount = count($this->staff);
    }

    /** @return int */
    public function getStaffCount(): int
    {
        return $this->staffCount;
    }

    /** @param int $staffCount */
    public function setStaffCount(int $staffCount): void
    {
        $this->staffCount = $staffCount;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::GUILD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getTag() == null)
        {
            throw new SerializationError('tag must be provided.');
        }
        $writer->addString($data->getTag());

        $writer->addByte(0xFF);
        if ($data->getCreateDate() == null)
        {
            throw new SerializationError('createDate must be provided.');
        }
        $writer->addString($data->getCreateDate());

        $writer->addByte(0xFF);
        if ($data->getDescription() == null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->getDescription());

        $writer->addByte(0xFF);
        if ($data->getWealth() == null)
        {
            throw new SerializationError('wealth must be provided.');
        }
        $writer->addString($data->getWealth());

        $writer->addByte(0xFF);
        if ($data->getRanks() == null)
        {
            throw new SerializationError('ranks must be provided.');
        }
        if (count($data->ranks) != 9)
        {
            throw new SerializationError("Expected length of ranks to be exactly 9, got " . count($data->ranks) . ".");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getRanks()[$i]);

        }
        if ($data->getStaffCount() == null)
        {
            throw new SerializationError('staffCount must be provided.');
        }
        $writer->addShort($data->getStaffCount());

        $writer->addByte(0xFF);
        if ($data->getStaff() == null)
        {
            throw new SerializationError('staff must be provided.');
        }
        if (count($data->staff) > 64008)
        {
            throw new SerializationError("Expected length of staff to be 64008 or less, got " . count($data->staff) . ".");
        }
        for ($i = 0; $i < $data->getStaffCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            GuildStaff::serialize($writer, $data->getStaff()[$i]);

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
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setTag($reader->getString());
            $reader->nextChunk();
            $data->setCreateDate($reader->getString());
            $reader->nextChunk();
            $data->setDescription($reader->getString());
            $reader->nextChunk();
            $data->setWealth($reader->getString());
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
            $data->setStaffCount($reader->getShort());
            $reader->nextChunk();
            $data->staff = [];
            for ($i = 0; $i < $data->getStaffCount(); $i++)
            {
                $data->staff[] = GuildStaff::deserialize($reader);
                if ($i + 1 < $data->getStaffCount())
                {
                    $reader->nextChunk();
                }
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
        return "GuildReportServerPacket(byteSize=$this->byteSize, name=$this->name, tag=$this->tag, createDate=$this->createDate, description=$this->description, wealth=$this->wealth, ranks=".var_export($this->ranks, true).", staff=".var_export($this->staff, true).")";
    }

}



