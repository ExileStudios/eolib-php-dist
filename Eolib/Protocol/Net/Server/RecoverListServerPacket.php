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
use Eolib\Protocol\Net\Server\CharacterStatsUpdate;
use Eolib\Protocol\SerializationError;

/**
 * Stats update
 */


class RecoverListServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $classId;
    /** @var CharacterStatsUpdate */
    private CharacterStatsUpdate $stats;

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
    public function getClassId(): int
    {
        return $this->classId;
    }

    /** @param int $classId */
    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }



    /** @return CharacterStatsUpdate */
    public function getStats(): CharacterStatsUpdate
    {
        return $this->stats;
    }

    /** @param CharacterStatsUpdate $stats */
    public function setStats(CharacterStatsUpdate $stats): void
    {
        $this->stats = $stats;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RECOVER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getClassId() == null)
        {
            throw new SerializationError('classId must be provided.');
        }
        $writer->addShort($data->getClassId());

        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsUpdate::serialize($writer, $data->getStats());


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
            $data->setClassId($reader->getShort());
            $data->setStats(CharacterStatsUpdate::deserialize($reader));

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
        return "RecoverListServerPacket(byteSize=$this->byteSize, classId=".var_export($this->classId, true).", stats=".var_export($this->stats, true).")";
    }

}



