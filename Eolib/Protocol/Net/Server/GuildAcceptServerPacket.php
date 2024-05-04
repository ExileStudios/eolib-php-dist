<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Update guild rank
 */


class GuildAcceptServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $rank;

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
    public function getRank(): int
    {
        return $this->rank;
    }

    /** @param int $rank */
    public function setRank(int $rank): void
    {
        $this->rank = $rank;
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
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildAcceptServerPacket $data): void {
        if ($data->getRank() == null)
        {
            throw new SerializationError('rank must be provided.');
        }
        $writer->addChar($data->getRank());


    }

    /**
     * Deserializes an instance of `GuildAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildAcceptServerPacket
    {
        $data = new GuildAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setRank($reader->getChar());

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
        return "GuildAcceptServerPacket(byteSize=$this->byteSize, rank=".var_export($this->rank, true).")";
    }

}



