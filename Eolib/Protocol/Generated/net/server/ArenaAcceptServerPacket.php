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
 * Arena win message
 */


class ArenaAcceptServerPacket
{
    private $byteSize = 0;
    private string $winnerName = "";
    private int $killsCount;
    private string $killerName = "";
    private string $victimName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getWinnerName(): string
    {
        return $this->winnerName;
    }

    public function setWinnerName(string $winnerName): void
    {
        $this->winnerName = $winnerName;
    }

    public function getKillsCount(): int
    {
        return $this->killsCount;
    }

    public function setKillsCount(int $killsCount): void
    {
        $this->killsCount = $killsCount;
    }

    public function getKillerName(): string
    {
        return $this->killerName;
    }

    public function setKillerName(string $killerName): void
    {
        $this->killerName = $killerName;
    }

    public function getVictimName(): string
    {
        return $this->victimName;
    }

    public function setVictimName(string $victimName): void
    {
        $this->victimName = $victimName;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ARENA;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        ArenaAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ArenaAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ArenaAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ArenaAcceptServerPacket $data): void {
        if ($data->winnerName === null)
        {
            throw new SerializationError('winnerName must be provided.');
        }
        $writer->addString($data->winnerName);

        $writer->addByte(0xFF);
        if ($data->killsCount === null)
        {
            throw new SerializationError('killsCount must be provided.');
        }
        $writer->addInt($data->killsCount);

        $writer->addByte(0xFF);
        if ($data->killerName === null)
        {
            throw new SerializationError('killerName must be provided.');
        }
        $writer->addString($data->killerName);

        $writer->addByte(0xFF);
        if ($data->victimName === null)
        {
            throw new SerializationError('victimName must be provided.');
        }
        $writer->addString($data->victimName);


    }

    /**
     * Deserializes an instance of `ArenaAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ArenaAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ArenaAcceptServerPacket
    {
        $data = new ArenaAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->winnerName = $reader->getString();
            $reader->nextChunk();
            $data->killsCount = $reader->getInt();
            $reader->nextChunk();
            $data->killerName = $reader->getString();
            $reader->nextChunk();
            $data->victimName = $reader->getString();
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
        return "ArenaAcceptServerPacket(byteSize=' . $this->byteSize . '', winnerName=' . $this->winnerName . '', killsCount=' . $this->killsCount . '', killerName=' . $this->killerName . '', victimName=' . $this->victimName . ')";
    }

}



