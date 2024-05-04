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
 * Talking to a priest NPC
 */


class PriestOpenClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcIndex;

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
    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    /** @param int $npcIndex */
    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PRIEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PriestOpenClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PriestOpenClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PriestOpenClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PriestOpenClientPacket $data): void {
        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addInt($data->getNpcIndex());


    }

    /**
     * Deserializes an instance of `PriestOpenClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PriestOpenClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PriestOpenClientPacket
    {
        $data = new PriestOpenClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcIndex($reader->getInt());

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
        return "PriestOpenClientPacket(byteSize=$this->byteSize, npcIndex=".var_export($this->npcIndex, true).")";
    }

}



