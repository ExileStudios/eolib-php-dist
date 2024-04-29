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
 * Request updated party info
 */


class PartyTakeClientPacket
{
    private $byteSize = 0;
    private int $membersCount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    public function setMembersCount(int $membersCount): void
    {
        $this->membersCount = $membersCount;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PartyTakeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyTakeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyTakeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyTakeClientPacket $data): void {
        if ($data->membersCount === null)
        {
            throw new SerializationError('membersCount must be provided.');
        }
        $writer->addChar($data->membersCount);


    }

    /**
     * Deserializes an instance of `PartyTakeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyTakeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyTakeClientPacket
    {
        $data = new PartyTakeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->membersCount = $reader->getChar();

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
        return "PartyTakeClientPacket(byteSize=' . $this->byteSize . '', membersCount=' . $this->membersCount . ')";
    }

}



