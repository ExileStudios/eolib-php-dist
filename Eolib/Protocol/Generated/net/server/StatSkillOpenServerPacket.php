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
use Eolib\Protocol\Generated\Net\server\SkillLearn;
use Eolib\Protocol\SerializationError;

/**
 * Response from talking to a skill master NPC
 */


class StatSkillOpenServerPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private string $shopName = "";
    private array $skills;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getShopName(): string
    {
        return $this->shopName;
    }

    public function setShopName(string $shopName): void
    {
        $this->shopName = $shopName;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::STATSKILL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        StatSkillOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `StatSkillOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param StatSkillOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, StatSkillOpenServerPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        if ($data->shopName === null)
        {
            throw new SerializationError('shopName must be provided.');
        }
        $writer->addString($data->shopName);

        $writer->addByte(0xFF);
        if ($data->skills === null)
        {
            throw new SerializationError('skills must be provided.');
        }
        for ($i = 0; $i < count($data->skills); $i++)
        {
            SkillLearn::serialize($writer, $data->skills[$i]);

        }

    }

    /**
     * Deserializes an instance of `StatSkillOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return StatSkillOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): StatSkillOpenServerPacket
    {
        $data = new StatSkillOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->sessionId = $reader->getShort();
            $data->shopName = $reader->getString();
            $reader->nextChunk();
            $skills_length = (int) $reader->remaining() / 28;
            $data->skills = [];
            for ($i = 0; $i < $skills_length; $i++)
            {
                $data->skills[] = SkillLearn::deserialize($reader);
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
        return "StatSkillOpenServerPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', shopName=' . $this->shopName . '', skills=' . $this->skills . ')";
    }

}



