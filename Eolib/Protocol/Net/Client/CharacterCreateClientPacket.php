<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Gender;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Confirm creating a character
 */


class CharacterCreateClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $gender;
    /** @var int */
    private int $hairStyle;
    /** @var int */
    private int $hairColor;
    /** @var int */
    private int $skin;
    /** @var string */
    private string $name = "";

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /** @return int */
    public function getGender(): int
    {
        return $this->gender;
    }

    /** @param int $gender */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }



    /** @return int */
    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    /** @param int $hairStyle */
    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }



    /** @return int */
    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    /** @param int $hairColor */
    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }



    /** @return int */
    public function getSkin(): int
    {
        return $this->skin;
    }

    /** @param int $skin */
    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }



    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHARACTER;
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
        CharacterCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CharacterCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterCreateClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->getGender() == null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addShort((int) $data->getGender());

        if ($data->getHairStyle() == null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addShort($data->getHairStyle());

        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addShort($data->getHairColor());

        if ($data->getSkin() == null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addShort($data->getSkin());

        $writer->addByte(0xFF);
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `CharacterCreateClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterCreateClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterCreateClientPacket
    {
        $data = new CharacterCreateClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setSessionId($reader->getShort());
            $data->setGender($reader->getShort());
            $data->setHairStyle($reader->getShort());
            $data->setHairColor($reader->getShort());
            $data->setSkin($reader->getShort());
            $reader->nextChunk();
            $data->setName($reader->getString());
            $reader->nextChunk();
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
        return "CharacterCreateClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", gender=".var_export($this->gender, true).", hairStyle=".var_export($this->hairStyle, true).", hairColor=".var_export($this->hairColor, true).", skin=".var_export($this->skin, true).", name=$this->name)";
    }

}



