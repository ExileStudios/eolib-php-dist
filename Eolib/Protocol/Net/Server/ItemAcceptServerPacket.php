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
 * Nearby player leveled up from quest
 */


class ItemAcceptServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
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
        ItemAcceptServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemAcceptServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemAcceptServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemAcceptServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());


    }

    /**
     * Deserializes an instance of `ItemAcceptServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemAcceptServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemAcceptServerPacket
    {
        $data = new ItemAcceptServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());

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
        return "ItemAcceptServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).")";
    }

}



