<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Request to join a guild
 */


class GuildPlayerClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $guildTag = "";
    private string $recruiterName = "";

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

    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
    }

    public function getRecruiterName(): string
    {
        return $this->recruiterName;
    }

    public function setRecruiterName(string $recruiterName): void
    {
        $this->recruiterName = $recruiterName;
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
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildPlayerClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildPlayerClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildPlayerClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildPlayerClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        $writer->addByte(0xFF);
        if ($data->guildTag === null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        $writer->addString($data->guildTag);

        $writer->addByte(0xFF);
        if ($data->recruiterName === null)
        {
            throw new SerializationError('recruiterName must be provided.');
        }
        $writer->addString($data->recruiterName);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `GuildPlayerClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildPlayerClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildPlayerClientPacket
    {
        $data = new GuildPlayerClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->sessionId = $reader->getInt();
            $reader->nextChunk();
            $data->guildTag = $reader->getString();
            $reader->nextChunk();
            $data->recruiterName = $reader->getString();
            $reader->nextChunk();
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
        return "GuildPlayerClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', guildTag=' . $this->guildTag . '', recruiterName=' . $this->recruiterName . ')";
    }

}



