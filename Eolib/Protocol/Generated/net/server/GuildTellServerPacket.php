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
use Eolib\Protocol\Generated\Net\server\GuildMember;
use Eolib\Protocol\SerializationError;

/**
 * Get guild member list reply
 */


class GuildTellServerPacket
{
    private $byteSize = 0;
    private int $membersCount;
    private array $members;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMembers(): array
    {
        return $this->members;
    }

    public function setMembers(array $members): void
    {
        $this->members = $members;
        $this->membersCount = strlen($this->members);
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
        if ($data->membersCount === null)
        {
            throw new SerializationError('membersCount must be provided.');
        }
        $writer->addShort($data->membersCount);

        $writer->addByte(0xFF);
        if ($data->members === null)
        {
            throw new SerializationError('members must be provided.');
        }
        if (strlen($data->members) > 64008)
        {
            throw new SerializationError("Expected length of members to be 64008 or less, got {strlen($data->members)}.");
        }
        for ($i = 0; $i < $data->membersCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            GuildMember::serialize($writer, $data->members[$i]);

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
            $data->membersCount = $reader->getShort();
            $reader->nextChunk();
            $data->members = [];
            for ($i = 0; $i < $data->membersCount; $i++)
            {
                $data->members[] = GuildMember::deserialize($reader);
                if ($i + 1 < $data->membersCount)
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
        return "GuildTellServerPacket(byteSize=' . $this->byteSize . '', members=' . $this->members . ')";
    }

}



