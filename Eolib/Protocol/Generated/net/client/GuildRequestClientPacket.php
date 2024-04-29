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
 * Requested to create a guild
 */


class GuildRequestClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $guildTag = "";
    private string $guildName = "";

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

    public function getGuildName(): string
    {
        return $this->guildName;
    }

    public function setGuildName(string $guildName): void
    {
        $this->guildName = $guildName;
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
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildRequestClientPacket $data): void {
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
        if ($data->guildName === null)
        {
            throw new SerializationError('guildName must be provided.');
        }
        $writer->addString($data->guildName);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `GuildRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildRequestClientPacket
    {
        $data = new GuildRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->sessionId = $reader->getInt();
            $reader->nextChunk();
            $data->guildTag = $reader->getString();
            $reader->nextChunk();
            $data->guildName = $reader->getString();
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
        return "GuildRequestClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', guildTag=' . $this->guildTag . '', guildName=' . $this->guildName . ')";
    }

}



