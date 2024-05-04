<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Final confirm creating a guild
 */


class GuildCreateClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $guildTag = "";
    /** @var string */
    private string $guildName = "";
    /** @var string */
    private string $description = "";

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /** @param string $description */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
        GuildCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildCreateClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());

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
        if ($data->getDescription() == null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->getDescription());

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
            $data->setSessionId($reader->getInt());
            $reader->nextChunk();
            $data->setGuildTag($reader->getString());
            $reader->nextChunk();
            $data->setGuildName($reader->getString());
            $reader->nextChunk();
            $data->setDescription($reader->getString());
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
        return "GuildCreateClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", guildTag=$this->guildTag, guildName=$this->guildName, description=$this->description)";
    }

}



