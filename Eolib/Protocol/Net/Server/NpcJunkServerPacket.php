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
 * Clearing all boss children
 */


class NpcJunkServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcId;

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
    public function getNpcId(): int
    {
        return $this->npcId;
    }

    /** @param int $npcId */
    public function setNpcId(int $npcId): void
    {
        $this->npcId = $npcId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::JUNK;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        NpcJunkServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcJunkServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcJunkServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcJunkServerPacket $data): void {
        if ($data->getNpcId() == null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->getNpcId());


    }

    /**
     * Deserializes an instance of `NpcJunkServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcJunkServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcJunkServerPacket
    {
        $data = new NpcJunkServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcId($reader->getShort());

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
        return "NpcJunkServerPacket(byteSize=$this->byteSize, npcId=".var_export($this->npcId, true).")";
    }

}



