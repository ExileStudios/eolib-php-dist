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
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Karma/experience update
 */


class RecoverReplyServerPacket
{
    private $byteSize = 0;
    private int $experience;
    private int $karma;
    private ?int $levelUp;
    private ?int $statPoints;
    private ?int $skillPoints;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function getKarma(): int
    {
        return $this->karma;
    }

    public function setKarma(int $karma): void
    {
        $this->karma = $karma;
    }

    public function getLevelUp(): ?int
    {
        return $this->levelUp;
    }

    public function setLevelUp(?int $levelUp): void
    {
        $this->levelUp = $levelUp;
    }

    public function getStatPoints(): ?int
    {
        return $this->statPoints;
    }

    public function setStatPoints(?int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }

    public function getSkillPoints(): ?int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(?int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
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
        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->experience);

        if ($data->karma === null)
        {
            throw new SerializationError('karma must be provided.');
        }
        $writer->addShort($data->karma);

        $reachedMissingOptional = $data->levelUp === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar($data->levelUp);

        }
        $reachedMissingOptional = $reachedMissingOptional || $data->statPoints === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->statPoints);

        }
        $reachedMissingOptional = $reachedMissingOptional || $data->skillPoints === null;
        if (!$reachedMissingOptional)
        {
            $writer->addShort($data->skillPoints);

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
            $data->experience = $reader->getInt();
            $data->karma = $reader->getShort();
            if ($reader->remaining() > 0)
            {
                $data->levelUp = $reader->getChar();
            }
            if ($reader->remaining() > 0)
            {
                $data->statPoints = $reader->getShort();
            }
            if ($reader->remaining() > 0)
            {
                $data->skillPoints = $reader->getShort();
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
        return "RecoverReplyServerPacket(byteSize=' . $this->byteSize . '', experience=' . $this->experience . '', karma=' . $this->karma . '', levelUp=' . $this->levelUp . '', statPoints=' . $this->statPoints . '', skillPoints=' . $this->skillPoints . ')";
    }

}



