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
use Eolib\Protocol\Generated\Net\server\NpcMapInfo;
use Eolib\Protocol\SerializationError;

/**
 * Reply to request for information about nearby NPCs
 */


class NpcAgreeServerPacket
{
    private $byteSize = 0;
    private int $npcsCount;
    private array $npcs;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcs(): array
    {
        return $this->npcs;
    }

    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
        $this->npcsCount = strlen($this->npcs);
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        NpcAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcAgreeServerPacket $data): void {
        if ($data->npcsCount === null)
        {
            throw new SerializationError('npcsCount must be provided.');
        }
        $writer->addChar($data->npcsCount);

        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        if (strlen($data->npcs) > 252)
        {
            throw new SerializationError("Expected length of npcs to be 252 or less, got {strlen($data->npcs)}.");
        }
        for ($i = 0; $i < $data->npcsCount; $i++)
        {
            NpcMapInfo::serialize($writer, $data->npcs[$i]);

        }

    }

    /**
     * Deserializes an instance of `NpcAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcAgreeServerPacket
    {
        $data = new NpcAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->npcsCount = $reader->getChar();
            $data->npcs = [];
            for ($i = 0; $i < $data->npcsCount; $i++)
            {
                $data->npcs[] = NpcMapInfo::deserialize($reader);
            }

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
        return "NpcAgreeServerPacket(byteSize=' . $this->byteSize . '', npcs=' . $this->npcs . ')";
    }

}



