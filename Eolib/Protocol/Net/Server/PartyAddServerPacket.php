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
use Eolib\Protocol\Net\Server\PartyMember;
use Eolib\Protocol\SerializationError;

/**
 * New player joined the party
 */


class PartyAddServerPacket
{
    private int $byteSize = 0;
    /** @var PartyMember */
    private PartyMember $member;

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

    /** @return PartyMember */
    public function getMember(): PartyMember
    {
        return $this->member;
    }

    /** @param PartyMember $member */
    public function setMember(PartyMember $member): void
    {
        $this->member = $member;
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
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PartyAddServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyAddServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyAddServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyAddServerPacket $data): void {
        if ($data->getMember() == null)
        {
            throw new SerializationError('member must be provided.');
        }
        PartyMember::serialize($writer, $data->getMember());


    }

    /**
     * Deserializes an instance of `PartyAddServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyAddServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyAddServerPacket
    {
        $data = new PartyAddServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMember(PartyMember::deserialize($reader));

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
        return "PartyAddServerPacket(byteSize=$this->byteSize, member=".var_export($this->member, true).")";
    }

}



