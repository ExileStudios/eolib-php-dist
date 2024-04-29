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
 * Get guild rank list reply
 */


class GuildRankServerPacket
{
    private $byteSize = 0;
    private array $ranks = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRanks(): array
    {
        return $this->ranks;
    }

    public function setRanks(array $ranks): void
    {
        $this->ranks = $ranks;
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
        GuildRankServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildRankServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildRankServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildRankServerPacket $data): void {
        if ($data->ranks === null)
        {
            throw new SerializationError('ranks must be provided.');
        }
        if (strlen($data->ranks) != 9)
        {
            throw new SerializationError("Expected length of ranks to be exactly 9, got {strlen($data->ranks)}.");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->ranks[$i]);

        }

    }

    /**
     * Deserializes an instance of `GuildRankServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildRankServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildRankServerPacket
    {
        $data = new GuildRankServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->ranks = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->ranks[] = $reader->getString();
                if ($i + 1 < 9)
                {
                    $reader->nextChunk();
                }
            }
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
        return "GuildRankServerPacket(byteSize=' . $this->byteSize . '', ranks=' . $this->ranks . ')";
    }

}



