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
use Eolib\Protocol\Generated\Net\client\GuildInfoType;
use Eolib\Protocol\SerializationError;

/**
 * Request guild description, rank list, or bank balance
 */


class GuildTakeClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $infoType;
    private string $guildTag = "";

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

    public function getInfoType(): int
    {
        return $this->infoType;
    }

    public function setInfoType(int $infoType): void
    {
        $this->infoType = $infoType;
    }

    public function getGuildTag(): string
    {
        return $this->guildTag;
    }

    public function setGuildTag(string $guildTag): void
    {
        $this->guildTag = $guildTag;
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
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildTakeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildTakeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildTakeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildTakeClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        if ($data->infoType === null)
        {
            throw new SerializationError('infoType must be provided.');
        }
        $writer->addShort((int) $data->infoType);

        if ($data->guildTag === null)
        {
            throw new SerializationError('guildTag must be provided.');
        }
        if (strlen($data->guildTag) != 3)
        {
            throw new SerializationError("Expected length of guildTag to be exactly 3, got {strlen($data->guildTag)}.");
        }
        $writer->addFixedString($data->guildTag, 3, false);


    }

    /**
     * Deserializes an instance of `GuildTakeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildTakeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildTakeClientPacket
    {
        $data = new GuildTakeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->sessionId = $reader->getInt();
            $data->infoType = GuildInfoType($reader->getShort());
            $data->guildTag = $reader->getFixedString(3, false);

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
        return "GuildTakeClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', infoType=' . $this->infoType . '', guildTag=' . $this->guildTag . ')";
    }

}



