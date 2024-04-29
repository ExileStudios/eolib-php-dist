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
use Eolib\Protocol\Generated\Net\server\CharacterStatsUpdate;
use Eolib\Protocol\SerializationError;

/**
 * Stats update
 */


class RecoverListServerPacket
{
    private $byteSize = 0;
    private int $classId;
    private CharacterStatsUpdate $stats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

    public function getStats(): CharacterStatsUpdate
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsUpdate $stats): void
    {
        $this->stats = $stats;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RECOVER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::LIST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        RecoverListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RecoverListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RecoverListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RecoverListServerPacket $data): void {
        if ($data->classId === null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addShort($data->classId);

        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsUpdate::serialize($writer, $data->stats);


    }

    /**
     * Deserializes an instance of `RecoverListServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RecoverListServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RecoverListServerPacket
    {
        $data = new RecoverListServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->classId = $reader->getShort();
            $data->stats = CharacterStatsUpdate::deserialize($reader);

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
        return "RecoverListServerPacket(byteSize=' . $this->byteSize . '', classId=' . $this->classId . '', stats=' . $this->stats . ')";
    }

}



