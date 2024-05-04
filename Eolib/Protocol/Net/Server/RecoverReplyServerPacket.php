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
use typing\cast;

/**
 * Karma/experience update
 */


class RecoverReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $experience;
    /** @var int */
    private int $karma;
    /** @var int */
    private ?int $levelUp;
    /** @var int */
    private ?int $statPoints;
    /** @var int */
    private ?int $skillPoints;

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
    public function getExperience(): int
    {
        return $this->experience;
    }

    /** @param int $experience */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }



    /** @return int */
    public function getKarma(): int
    {
        return $this->karma;
    }

    /** @param int $karma */
    public function setKarma(int $karma): void
    {
        $this->karma = $karma;
    }



    /** @return int */
    public function getLevelUp(): ?int
    {
        return $this->levelUp;
    }

    /** @param int $levelUp */
    public function setLevelUp(?int $levelUp): void
    {
        $this->levelUp = $levelUp;
    }



    /** @return int */
    public function getStatPoints(): ?int
    {
        return $this->statPoints;
    }

    /** @param int $statPoints */
    public function setStatPoints(?int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }



    /** @return int */
    public function getSkillPoints(): ?int
    {
        return $this->skillPoints;
    }

    /** @param int $skillPoints */
    public function setSkillPoints(?int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        RecoverReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RecoverReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RecoverReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RecoverReplyServerPacket $data): void {
        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->getExperience());

        if ($data->getKarma() == null)
        {
            throw new SerializationError('karma must be provided.');
        }
        $writer->addShort($data->getKarma());

        $reachedMissingOptional = $data->levelUp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar($data->getLevelUp());

        }
        $reachedMissingOptional = $reachedMissingOptional || $data->statPoints === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->getStatPoints());

        }
        $reachedMissingOptional = $reachedMissingOptional || $data->skillPoints === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->getSkillPoints());

        }

    }

    /**
     * Deserializes an instance of `RecoverReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RecoverReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RecoverReplyServerPacket
    {
        $data = new RecoverReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setExperience($reader->getInt());
            $data->setKarma($reader->getShort());
            if ($reader->getRemaining() > 0)
            {
                $data->setLevelUp($reader->getChar());
            }
            if ($reader->getRemaining() > 0)
            {
                $data->setStatPoints($reader->getShort());
            }
            if ($reader->getRemaining() > 0)
            {
                $data->setSkillPoints($reader->getShort());
            }

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
        return "RecoverReplyServerPacket(byteSize=$this->byteSize, experience=".var_export($this->experience, true).", karma=".var_export($this->karma, true).", levelUp=".var_export($this->levelUp, true).", statPoints=".var_export($this->statPoints, true).", skillPoints=".var_export($this->skillPoints, true).")";
    }

}



