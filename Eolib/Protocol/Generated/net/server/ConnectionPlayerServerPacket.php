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
 * Ping request
 */


class ConnectionPlayerServerPacket
{
    private $byteSize = 0;
    private int $seq1;
    private int $seq2;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSeq1(): int
    {
        return $this->seq1;
    }

    public function setSeq1(int $seq1): void
    {
        $this->seq1 = $seq1;
    }

    public function getSeq2(): int
    {
        return $this->seq2;
    }

    public function setSeq2(int $seq2): void
    {
        $this->seq2 = $seq2;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CONNECTION;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->seq1 === null)
        {
            throw new SerializationError('seq1 must be provided.');
        }
        $writer->addShort($data->seq1);

        if ($data->seq2 === null)
        {
            throw new SerializationError('seq2 must be provided.');
        }
        $writer->addChar($data->seq2);


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
            $data->seq1 = $reader->getShort();
            $data->seq2 = $reader->getChar();

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
        return "ConnectionPlayerServerPacket(byteSize=' . $this->byteSize . '', seq1=' . $this->seq1 . '', seq2=' . $this->seq2 . ')";
    }

}



