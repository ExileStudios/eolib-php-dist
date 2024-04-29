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
use Eolib\Protocol\Generated\Net\server\PartyMember;
use Eolib\Protocol\SerializationError;

/**
 * Member list received when party is first joined
 */


class PartyCreateServerPacket
{
    private $byteSize = 0;
    private array $members;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMembers(): array
    {
        return $this->members;
    }

    public function setMembers(array $members): void
    {
        $this->members = $members;
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
        if ($data->members === null)
        {
            throw new SerializationError('members must be provided.');
        }
        for ($i = 0; $i < count($data->members); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            PartyMember::serialize($writer, $data->members[$i]);

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
            while ($reader->remaining() > 0)
            {
                $data->members[] = PartyMember::deserialize($reader);
                $reader->nextChunk();
            }
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
        return "PartyCreateServerPacket(byteSize=' . $this->byteSize . '', members=' . $this->members . ')";
    }

}



