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
use Eolib\Protocol\Net\Server\GuildMember;
use Eolib\Protocol\SerializationError;

/**
 * Get guild member list reply
 */


class GuildTellServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $membersCount;
    /** @var GuildMember[] */
    public array $members = [];

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

    /** @return GuildMember[] */
    public function getMembers(): array
    {
        return $this->members;
    }

    /** @param GuildMember[] $members */
    public function setMembers(array $members): void
    {
        $this->members = $members;
        $this->membersCount = count($this->members);
    }

    /** @return int */
    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    /** @param int $membersCount */
    public function setMembersCount(int $membersCount): void
    {
        $this->membersCount = $membersCount;
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
        return PacketAction::TELL;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildTellServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildTellServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildTellServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildTellServerPacket $data): void {
        if ($data->getMembersCount() == null)
        {
            throw new SerializationError('membersCount must be provided.');
        }
        $writer->addShort($data->getMembersCount());

        $writer->addByte(0xFF);
        if ($data->getMembers() == null)
        {
            throw new SerializationError('members must be provided.');
        }
        if (count($data->members) > 64008)
        {
            throw new SerializationError("Expected length of members to be 64008 or less, got " . count($data->members) . ".");
        }
        for ($i = 0; $i < $data->getMembersCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            GuildMember::serialize($writer, $data->getMembers()[$i]);

        }

    }

    /**
     * Deserializes an instance of `GuildTellServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildTellServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildTellServerPacket
    {
        $data = new GuildTellServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setMembersCount($reader->getShort());
            $reader->nextChunk();
            $data->members = [];
            for ($i = 0; $i < $data->getMembersCount(); $i++)
            {
                $data->members[] = GuildMember::deserialize($reader);
                if ($i + 1 < $data->getMembersCount())
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
        return "GuildTellServerPacket(byteSize=$this->byteSize, members=".var_export($this->members, true).")";
    }

}



