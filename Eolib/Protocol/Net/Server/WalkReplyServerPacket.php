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
use Eolib\Protocol\Net\Server\ItemMapInfo;
use Eolib\Protocol\SerializationError;

/**
 * Players, NPCs, and Items appearing in nearby view
 */


class WalkReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $playerIds = [];
    /** @var int[] */
    public array $npcIndexes = [];
    /** @var ItemMapInfo[] */
    public array $items = [];

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

    /** @return int[] */
    public function getPlayerIds(): array
    {
        return $this->playerIds;
    }

    /** @param int[] $playerIds */
    public function setPlayerIds(array $playerIds): void
    {
        $this->playerIds = $playerIds;
    }



    /** @return int[] */
    public function getNpcIndexes(): array
    {
        return $this->npcIndexes;
    }

    /** @param int[] $npcIndexes */
    public function setNpcIndexes(array $npcIndexes): void
    {
        $this->npcIndexes = $npcIndexes;
    }



    /** @return ItemMapInfo[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param ItemMapInfo[] $items */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WALK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getPlayerIds() == null)
        {
            throw new SerializationError('playerIds must be provided.');
        }
        for ($i = 0; $i < count($data->playerIds); $i++)
        {
            $writer->addShort($data->getPlayerIds()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getNpcIndexes() == null)
        {
            throw new SerializationError('npcIndexes must be provided.');
        }
        for ($i = 0; $i < count($data->npcIndexes); $i++)
        {
            $writer->addChar($data->getNpcIndexes()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ItemMapInfo::serialize($writer, $data->getItems()[$i]);

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
            $playerIds_length = (int) $reader->getRemaining() / 2;
            $data->playerIds = [];
            for ($i = 0; $i < $playerIds_length; $i++)
            {
                $data->playerIds[] = $reader->getShort();
            }
            $reader->nextChunk();
            $npcIndexes_length = (int) $reader->getRemaining() / 1;
            $data->npcIndexes = [];
            for ($i = 0; $i < $npcIndexes_length; $i++)
            {
                $data->npcIndexes[] = $reader->getChar();
            }
            $reader->nextChunk();
            $items_length = (int) $reader->getRemaining() / 9;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ItemMapInfo::deserialize($reader);
            }
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
        return "WalkReplyServerPacket(byteSize=$this->byteSize, playerIds=".var_export($this->playerIds, true).", npcIndexes=".var_export($this->npcIndexes, true).", items=".var_export($this->items, true).")";
    }

}



