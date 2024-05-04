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
 * Member list received when party is first joined
 */


class PartyCreateServerPacket
{
    private int $byteSize = 0;
    /** @var PartyMember[] */
    public array $members = [];

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

    /** @return PartyMember[] */
    public function getMembers(): array
    {
        return $this->members;
    }

    /** @param PartyMember[] $members */
    public function setMembers(array $members): void
    {
        $this->members = $members;
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
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PartyCreateServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyCreateServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyCreateServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyCreateServerPacket $data): void {
        if ($data->getMembers() == null)
        {
            throw new SerializationError('members must be provided.');
        }
        for ($i = 0; $i < count($data->members); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            PartyMember::serialize($writer, $data->getMembers()[$i]);

        }

    }

    /**
     * Deserializes an instance of `PartyCreateServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyCreateServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyCreateServerPacket
    {
        $data = new PartyCreateServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->members = [];
            while ($reader->getRemaining() > 0)
            {
                $data->members[] = PartyMember::deserialize($reader);
                $reader->nextChunk();
            }
            $reader->setChunkedReadingMode(false);

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
        return "PartyCreateServerPacket(byteSize=$this->byteSize, members=".var_export($this->members, true).")";
    }

}



