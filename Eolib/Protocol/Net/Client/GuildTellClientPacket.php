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
 * Requested member list of a guild
 */


class GuildTellClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $guildIdentity = "";

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
    public function getGuildIdentity(): string
    {
        return $this->guildIdentity;
    }

    /** @param string $guildIdentity */
    public function setGuildIdentity(string $guildIdentity): void
    {
        $this->guildIdentity = $guildIdentity;
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
        GuildTellClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildTellClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildTellClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildTellClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());

        if ($data->getGuildIdentity() == null)
        {
            throw new SerializationError('guildIdentity must be provided.');
        }
        $writer->addString($data->getGuildIdentity());


    }

    /**
     * Deserializes an instance of `GuildTellClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildTellClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildTellClientPacket
    {
        $data = new GuildTellClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSessionId($reader->getInt());
            $data->setGuildIdentity($reader->getString());

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
        return "GuildTellClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", guildIdentity=$this->guildIdentity)";
    }

}



