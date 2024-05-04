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
 * Ping request
 */


class ConnectionPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $seq1;
    /** @var int */
    private int $seq2;

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
    public function getSeq1(): int
    {
        return $this->seq1;
    }

    /** @param int $seq1 */
    public function setSeq1(int $seq1): void
    {
        $this->seq1 = $seq1;
    }



    /** @return int */
    public function getSeq2(): int
    {
        return $this->seq2;
    }

    /** @param int $seq2 */
    public function setSeq2(int $seq2): void
    {
        $this->seq2 = $seq2;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CONNECTION;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ConnectionPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ConnectionPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ConnectionPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ConnectionPlayerServerPacket $data): void {
        if ($data->getSeq1() == null)
        {
            throw new SerializationError('seq1 must be provided.');
        }
        $writer->addShort($data->getSeq1());

        if ($data->getSeq2() == null)
        {
            throw new SerializationError('seq2 must be provided.');
        }
        $writer->addChar($data->getSeq2());


    }

    /**
     * Deserializes an instance of `ConnectionPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ConnectionPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ConnectionPlayerServerPacket
    {
        $data = new ConnectionPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSeq1($reader->getShort());
            $data->setSeq2($reader->getChar());

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
        return "ConnectionPlayerServerPacket(byteSize=$this->byteSize, seq1=".var_export($this->seq1, true).", seq2=".var_export($this->seq2, true).")";
    }

}



