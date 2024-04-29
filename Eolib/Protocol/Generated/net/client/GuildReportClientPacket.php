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
 * Requested general information of a guild
 */


class GuildReportClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $guildIdentity = "";

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

    public function getGuildIdentity(): string
    {
        return $this->guildIdentity;
    }

    public function setGuildIdentity(string $guildIdentity): void
    {
        $this->guildIdentity = $guildIdentity;
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
        return PacketAction::REPORT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildReportClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildReportClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildReportClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildReportClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        if ($data->guildIdentity === null)
        {
            throw new SerializationError('guildIdentity must be provided.');
        }
        $writer->addString($data->guildIdentity);


    }

    /**
     * Deserializes an instance of `GuildReportClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildReportClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildReportClientPacket
    {
        $data = new GuildReportClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->sessionId = $reader->getInt();
            $data->guildIdentity = $reader->getString();

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
        return "GuildReportClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', guildIdentity=' . $this->guildIdentity . ')";
    }

}



