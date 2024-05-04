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
 * Arena win message
 */


class ArenaAcceptServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $winnerName = "";
    /** @var int */
    private int $killsCount;
    /** @var string */
    private string $killerName = "";
    /** @var string */
    private string $victimName = "";

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

    /** @return string */
    public function getWinnerName(): string
    {
        return $this->winnerName;
    }

    /** @param string $winnerName */
    public function setWinnerName(string $winnerName): void
    {
        $this->winnerName = $winnerName;
    }



    /** @return int */
    public function getKillsCount(): int
    {
        return $this->killsCount;
    }

    /** @param int $killsCount */
    public function setKillsCount(int $killsCount): void
    {
        $this->killsCount = $killsCount;
    }



    /** @return string */
    public function getKillerName(): string
    {
        return $this->killerName;
    }

    /** @param string $killerName */
    public function setKillerName(string $killerName): void
    {
        $this->killerName = $killerName;
    }



    /** @return string */
    public function getVictimName(): string
    {
        return $this->victimName;
    }

    /** @param string $victimName */
    public function setVictimName(string $victimName): void
    {
        $this->victimName = $victimName;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ARENA;
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
        ArenaAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ArenaAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ArenaAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ArenaAcceptServerPacket $data): void {
        if ($data->getWinnerName() == null)
        {
            throw new SerializationError('winnerName must be provided.');
        }
        $writer->addString($data->getWinnerName());

        $writer->addByte(0xFF);
        if ($data->getKillsCount() == null)
        {
            throw new SerializationError('killsCount must be provided.');
        }
        $writer->addInt($data->getKillsCount());

        $writer->addByte(0xFF);
        if ($data->getKillerName() == null)
        {
            throw new SerializationError('killerName must be provided.');
        }
        $writer->addString($data->getKillerName());

        $writer->addByte(0xFF);
        if ($data->getVictimName() == null)
        {
            throw new SerializationError('victimName must be provided.');
        }
        $writer->addString($data->getVictimName());


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
            $data->setWinnerName($reader->getString());
            $reader->nextChunk();
            $data->setKillsCount($reader->getInt());
            $reader->nextChunk();
            $data->setKillerName($reader->getString());
            $reader->nextChunk();
            $data->setVictimName($reader->getString());
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
        return "ArenaAcceptServerPacket(byteSize=$this->byteSize, winnerName=$this->winnerName, killsCount=".var_export($this->killsCount, true).", killerName=$this->killerName, victimName=$this->victimName)";
    }

}



