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
 * Final confirm creating a guild
 */


class GuildCreateClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $guildTag = "";
    private string $guildName = "";
    private string $description = "";

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
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
        GuildCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildCreateClientPacket $data): void {
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
        if ($data->description === null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->description);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `GuildCreateClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildCreateClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildCreateClientPacket
    {
        $data = new GuildCreateClientPacket();
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
            $data->description = $reader->getString();
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
        return "GuildCreateClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', guildTag=' . $this->guildTag . '', guildName=' . $this->guildName . '', description=' . $this->description . ')";
    }

}



