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
 * Guild created
 */


class GuildCreateServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $leaderPlayerId;
    /** @var string */
    private string $guildTag = "";
    /** @var string */
    private string $guildName = "";
    /** @var string */
    private string $rankName = "";
    /** @var int */
    private int $goldAmount;

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
    public function getLeaderPlayerId(): int
    {
        return $this->leaderPlayerId;
    }

    /** @param int $leaderPlayerId */
    public function setLeaderPlayerId(int $leaderPlayerId): void
    {
        $this->leaderPlayerId = $leaderPlayerId;
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



    /** @return int */
    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    /** @param int $goldAmount */
    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
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
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildCreateServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildCreateServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildCreateServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildCreateServerPacket $data): void {
        if ($data->getLeaderPlayerId() == null)
        {
            throw new SerializationError('leaderPlayerId must be provided.');
        }
        $writer->addShort($data->getLeaderPlayerId());

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
        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());


    }

    /**
     * Deserializes an instance of `GuildCreateServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildCreateServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildCreateServerPacket
    {
        $data = new GuildCreateServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setLeaderPlayerId($reader->getShort());
            $reader->nextChunk();
            $data->setGuildTag($reader->getString());
            $reader->nextChunk();
            $data->setGuildName($reader->getString());
            $reader->nextChunk();
            $data->setRankName($reader->getString());
            $reader->nextChunk();
            $data->setGoldAmount($reader->getInt());
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
        return "GuildCreateServerPacket(byteSize=$this->byteSize, leaderPlayerId=".var_export($this->leaderPlayerId, true).", guildTag=$this->guildTag, guildName=$this->guildName, rankName=$this->rankName, goldAmount=".var_export($this->goldAmount, true).")";
    }

}



