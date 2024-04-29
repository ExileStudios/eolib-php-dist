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

/**
 * Request to create a character
 */


class CharacterRequestClientPacket
{
    private $byteSize = 0;
    private string $requestString = "NEW";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRequestString(): string
    {
        return $this->requestString;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHARACTER;
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
        CharacterRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CharacterRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterRequestClientPacket $data): void {
        $writer->addString($data->requestString);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `CharacterRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterRequestClientPacket
    {
        $data = new CharacterRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->requestString = $reader->getString();
            $reader->nextChunk();
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
        return "CharacterRequestClientPacket(byteSize=' . $this->byteSize . '', requestString=' . $this->requestString . ')";
    }

}



