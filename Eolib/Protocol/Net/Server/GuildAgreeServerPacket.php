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
use Eolib\Protocol\SerializationError;

/**
 * Joined guild info
 */


class GuildAgreeServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $recruiterId;
    /** @var string */
    private string $guildTag = "";
    /** @var string */
    private string $guildName = "";
    /** @var string */
    private string $rankName = "";

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
    public function getRecruiterId(): int
    {
        return $this->recruiterId;
    }

    /** @param int $recruiterId */
    public function setRecruiterId(int $recruiterId): void
    {
        $this->recruiterId = $recruiterId;
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
    public function getRankName(): string
    {
        return $this->rankName;
    }

    /** @param string $rankName */
    public function setRankName(string $rankName): void
    {
        $this->rankName = $rankName;
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
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildAgreeServerPacket $data): void {
        if ($data->getRecruiterId() == null)
        {
            throw new SerializationError('recruiterId must be provided.');
        }
        $writer->addShort($data->getRecruiterId());

        $writer->addByte(0xFF);
        if ($data->getGuildTag() == null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        $writer->addString($data->getGuildTag());

        $writer->addByte(0xFF);
        if ($data->getGuildName() == null)
        {
            throw new SerializationError('guildName must be provided.');
        }
        $writer->addString($data->getGuildName());

        $writer->addByte(0xFF);
        if ($data->getRankName() == null)
        {
            throw new SerializationError('rankName must be provided.');
        }
        $writer->addString($data->getRankName());

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `GuildAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildAgreeServerPacket
    {
        $data = new GuildAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setRecruiterId($reader->getShort());
            $reader->nextChunk();
            $data->setGuildTag($reader->getString());
            $reader->nextChunk();
            $data->setGuildName($reader->getString());
            $reader->nextChunk();
            $data->setRankName($reader->getString());
            $reader->nextChunk();
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
        return "GuildAgreeServerPacket(byteSize=$this->byteSize, recruiterId=".var_export($this->recruiterId, true).", guildTag=$this->guildTag, guildName=$this->guildName, rankName=$this->rankName)";
    }

}



