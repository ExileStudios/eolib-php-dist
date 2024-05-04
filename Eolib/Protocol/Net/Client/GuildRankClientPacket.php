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
 * Update a member&#039;s rank
 */


class GuildRankClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $rank;
    /** @var string */
    private string $memberName = "";

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



    /** @return int */
    public function getRank(): int
    {
        return $this->rank;
    }

    /** @param int $rank */
    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }



    /** @return string */
    public function getMemberName(): string
    {
        return $this->memberName;
    }

    /** @param string $memberName */
    public function setMemberName(string $memberName): void
    {
        $this->memberName = $memberName;
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
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());

        if ($data->getRank() == null)
        {
            throw new SerializationError('rank must be provided.');
        }
        $writer->addChar($data->getRank());

        if ($data->getMemberName() == null)
        {
            throw new SerializationError('memberName must be provided.');
        }
        $writer->addString($data->getMemberName());


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
            $data->setSessionId($reader->getInt());
            $data->setRank($reader->getChar());
            $data->setMemberName($reader->getString());

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
        return "GuildRankClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", rank=".var_export($this->rank, true).", memberName=$this->memberName)";
    }

}



