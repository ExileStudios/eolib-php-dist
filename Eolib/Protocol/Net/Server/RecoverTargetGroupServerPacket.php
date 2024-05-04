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
use Eolib\Protocol\SerializationError;

/**
 * Updated stats when levelling up from party experience
 */


class RecoverTargetGroupServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $statPoints;
    /** @var int */
    private int $skillPoints;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $maxTp;
    /** @var int */
    private int $maxSp;

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
    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    /** @param int $statPoints */
    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }



    /** @return int */
    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    /** @param int $skillPoints */
    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }



    /** @return int */
    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    /** @param int $maxHp */
    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }



    /** @return int */
    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    /** @param int $maxTp */
    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }



    /** @return int */
    public function getMaxSp(): int
    {
        return $this->maxSp;
    }

    /** @param int $maxSp */
    public function setMaxSp(int $maxSp): void
    {
        $this->maxSp = $maxSp;
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
        return PacketAction::TARGETGROUP;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        RecoverTargetGroupServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RecoverTargetGroupServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RecoverTargetGroupServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RecoverTargetGroupServerPacket $data): void {
        if ($data->getStatPoints() == null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->getStatPoints());

        if ($data->getSkillPoints() == null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->getSkillPoints());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

        if ($data->getMaxTp() == null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->getMaxTp());

        if ($data->getMaxSp() == null)
        {
            throw new SerializationError('maxSp must be provided.');
        }
        $writer->addShort($data->getMaxSp());


    }

    /**
     * Deserializes an instance of `RecoverTargetGroupServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RecoverTargetGroupServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RecoverTargetGroupServerPacket
    {
        $data = new RecoverTargetGroupServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setStatPoints($reader->getShort());
            $data->setSkillPoints($reader->getShort());
            $data->setMaxHp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setMaxSp($reader->getShort());

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
        return "RecoverTargetGroupServerPacket(byteSize=$this->byteSize, statPoints=".var_export($this->statPoints, true).", skillPoints=".var_export($this->skillPoints, true).", maxHp=".var_export($this->maxHp, true).", maxTp=".var_export($this->maxTp, true).", maxSp=".var_export($this->maxSp, true).")";
    }

}



