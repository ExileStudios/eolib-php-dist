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
use Eolib\Protocol\Generated\Net\server\ItemMapInfo;
use Eolib\Protocol\SerializationError;

/**
 * Players, NPCs, and Items appearing in nearby view
 */


class WalkReplyServerPacket
{
    private $byteSize = 0;
    private array $playerIds;
    private array $npcIndexes;
    private array $items;

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

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WALK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WalkReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WalkReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WalkReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WalkReplyServerPacket $data): void {
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
        $writer->addByte(0xFF);
        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ItemMapInfo::serialize($writer, $data->items[$i]);

        }

    }

    /**
     * Deserializes an instance of `WalkReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WalkReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WalkReplyServerPacket
    {
        $data = new WalkReplyServerPacket();
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
            $reader->nextChunk();
            $items_length = (int) $reader->remaining() / 9;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ItemMapInfo::deserialize($reader);
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
        return "WalkReplyServerPacket(byteSize=' . $this->byteSize . '', playerIds=' . $this->playerIds . '', npcIndexes=' . $this->npcIndexes . '', items=' . $this->items . ')";
    }

}



