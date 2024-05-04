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
 * Requesting info about nearby NPCs
 */


class NpcRangeRequestClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcIndexesLength;
    /** @var int[] */
    public array $npcIndexes = [];

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
    public function getNpcIndexes(): array
    {
        return $this->npcIndexes;
    }

    /** @param int[] $npcIndexes */
    public function setNpcIndexes(array $npcIndexes): void
    {
        $this->npcIndexes = $npcIndexes;
        $this->npcIndexesLength = count($this->npcIndexes);
    }

    /** @return int */
    public function getNpcIndexesLength(): int
    {
        return $this->npcIndexesLength;
    }

    /** @param int $npcIndexesLength */
    public function setNpcIndexesLength(int $npcIndexesLength): void
    {
        $this->npcIndexesLength = $npcIndexesLength;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPCRANGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        NpcRangeRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcRangeRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcRangeRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcRangeRequestClientPacket $data): void {
        if ($data->getNpcIndexesLength() == null)
        {
            throw new SerializationError('npcIndexesLength must be provided.');
        }
        $writer->addChar($data->getNpcIndexesLength());

        $writer->addByte(255);

        if ($data->getNpcIndexes() == null)
        {
            throw new SerializationError('npcIndexes must be provided.');
        }
        if (count($data->npcIndexes) > 252)
        {
            throw new SerializationError("Expected length of npcIndexes to be 252 or less, got " . count($data->npcIndexes) . ".");
        }
        for ($i = 0; $i < $data->getNpcIndexesLength(); $i++)
        {
            $writer->addChar($data->getNpcIndexes()[$i]);

        }

    }

    /**
     * Deserializes an instance of `NpcRangeRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcRangeRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcRangeRequestClientPacket
    {
        $data = new NpcRangeRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcIndexesLength($reader->getChar());
            $reader->getByte();
            $data->npcIndexes = [];
            for ($i = 0; $i < $data->getNpcIndexesLength(); $i++)
            {
                $data->npcIndexes[] = $reader->getChar();
            }

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
        return "NpcRangeRequestClientPacket(byteSize=$this->byteSize, npcIndexes=".var_export($this->npcIndexes, true).")";
    }

}



