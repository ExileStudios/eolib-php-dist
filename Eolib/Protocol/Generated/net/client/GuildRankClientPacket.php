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
 * Update a member&#039;s rank
 */


class GuildRankClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $rank;
    private string $memberName = "";

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

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }

    public function getMemberName(): string
    {
        return $this->memberName;
    }

    public function setMemberName(string $memberName): void
    {
        $this->memberName = $memberName;
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
        return PacketAction::RANK;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildRankClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildRankClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildRankClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildRankClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        if ($data->rank === null)
        {
            throw new SerializationError('rank must be provided.');
        }
        $writer->addChar($data->rank);

        if ($data->memberName === null)
        {
            throw new SerializationError('memberName must be provided.');
        }
        $writer->addString($data->memberName);


    }

    /**
     * Deserializes an instance of `GuildRankClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildRankClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildRankClientPacket
    {
        $data = new GuildRankClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->sessionId = $reader->getInt();
            $data->rank = $reader->getChar();
            $data->memberName = $reader->getString();

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
        return "GuildRankClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', rank=' . $this->rank . '', memberName=' . $this->memberName . ')";
    }

}



