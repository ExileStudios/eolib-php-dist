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
 * Requesting info about nearby players and NPCs
 */


class RangeRequestClientPacket
{
    private $byteSize = 0;
    private array $playerIds;
    private array $npcIndexes;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerIds(): array
    {
        return $this->playerIds;
    }

    public function setPlayerIds(array $playerIds): void
    {
        $this->playerIds = $playerIds;
    }

    public function getNpcIndexes(): array
    {
        return $this->npcIndexes;
    }

    public function setNpcIndexes(array $npcIndexes): void
    {
        $this->npcIndexes = $npcIndexes;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RANGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        RangeRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RangeRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RangeRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RangeRequestClientPacket $data): void {
        if ($data->playerIds === null)
        {
            throw new SerializationError('playerIds must be provided.');
        }
        for ($i = 0; $i < count($data->playerIds); $i++)
        {
            $writer->addShort($data->playerIds[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->npcIndexes === null)
        {
            throw new SerializationError('npcIndexes must be provided.');
        }
        for ($i = 0; $i < count($data->npcIndexes); $i++)
        {
            $writer->addChar($data->npcIndexes[$i]);

        }

    }

    /**
     * Deserializes an instance of `RangeRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RangeRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RangeRequestClientPacket
    {
        $data = new RangeRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $playerIds_length = (int) $reader->remaining() / 2;
            $data->playerIds = [];
            for ($i = 0; $i < $playerIds_length; $i++)
            {
                $data->playerIds[] = $reader->getShort();
            }
            $reader->nextChunk();
            $npcIndexes_length = (int) $reader->remaining() / 1;
            $data->npcIndexes = [];
            for ($i = 0; $i < $npcIndexes_length; $i++)
            {
                $data->npcIndexes[] = $reader->getChar();
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
        return "RangeRequestClientPacket(byteSize=' . $this->byteSize . '', playerIds=' . $this->playerIds . '', npcIndexes=' . $this->npcIndexes . ')";
    }

}



