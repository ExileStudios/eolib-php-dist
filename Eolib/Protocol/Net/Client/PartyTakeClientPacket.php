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
 * Request updated party info
 */


class PartyTakeClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $membersCount;

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
    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    /** @param int $membersCount */
    public function setMembersCount(int $membersCount): void
    {
        $this->membersCount = $membersCount;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getMembersCount() == null)
        {
            throw new SerializationError('membersCount must be provided.');
        }
        $writer->addChar($data->getMembersCount());


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
            $data->setMembersCount($reader->getChar());

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
        return "PartyTakeClientPacket(byteSize=$this->byteSize, membersCount=".var_export($this->membersCount, true).")";
    }

}



