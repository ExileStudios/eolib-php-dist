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
use Eolib\Protocol\SerializationError;

/**
 * Guild created
 */


class GuildCreateServerPacket
{
    private $byteSize = 0;
    private int $leaderPlayerId;
    private string $guildTag = "";
    private string $guildName = "";
    private string $rankName = "";
    private int $goldAmount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getLeaderPlayerId(): int
    {
        return $this->leaderPlayerId;
    }

    public function setLeaderPlayerId(int $leaderPlayerId): void
    {
        $this->leaderPlayerId = $leaderPlayerId;
    }

    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
    }

    public function getGuildName(): string
    {
        return $this->guildName;
    }

    public function setGuildName(string $guildName): void
    {
        $this->guildName = $guildName;
    }

    public function getRankName(): string
    {
        return $this->rankName;
    }

    public function setRankName(string $rankName): void
    {
        $this->rankName = $rankName;
    }

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
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
        if ($data->leaderPlayerId === null)
        {
            throw new SerializationError('leaderPlayerId must be provided.');
        }
        $writer->addShort($data->leaderPlayerId);

        $writer->addByte(0xFF);
        if ($data->guildTag === null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        $writer->addString($data->guildTag);

        $writer->addByte(0xFF);
        if ($data->guildName === null)
        {
            throw new SerializationError('guildName must be provided.');
        }
        $writer->addString($data->guildName);

        $writer->addByte(0xFF);
        if ($data->rankName === null)
        {
            throw new SerializationError('rankName must be provided.');
        }
        $writer->addString($data->rankName);

        $writer->addByte(0xFF);
        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);


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
            $data->leaderPlayerId = $reader->getShort();
            $reader->nextChunk();
            $data->guildTag = $reader->getString();
            $reader->nextChunk();
            $data->guildName = $reader->getString();
            $reader->nextChunk();
            $data->rankName = $reader->getString();
            $reader->nextChunk();
            $data->goldAmount = $reader->getInt();
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
        return "GuildCreateServerPacket(byteSize=' . $this->byteSize . '', leaderPlayerId=' . $this->leaderPlayerId . '', guildTag=' . $this->guildTag . '', guildName=' . $this->guildName . '', rankName=' . $this->rankName . '', goldAmount=' . $this->goldAmount . ')";
    }

}



