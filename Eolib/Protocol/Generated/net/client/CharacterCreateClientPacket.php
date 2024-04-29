<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Gender;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Confirm creating a character
 */


class CharacterCreateClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $gender;
    private int $hairStyle;
    private int $hairColor;
    private int $skin;
    private string $name = "";

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

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getHairStyle(): int
    {
        return $this->hairStyle;
    }

    public function setHairStyle(int $hairStyle): void
    {
        $this->hairStyle = $hairStyle;
    }

    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }

    public function getSkin(): int
    {
        return $this->skin;
    }

    public function setSkin(int $skin): void
    {
        $this->skin = $skin;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CHARACTER;
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
        CharacterCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CharacterCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterCreateClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->sessionId);

        if ($data->gender === null)
        {
            throw new SerializationError('gender must be provided.');
        }
        $writer->addShort((int) $data->gender);

        if ($data->hairStyle === null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addShort($data->hairStyle);

        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addShort($data->hairColor);

        if ($data->skin === null)
        {
            throw new SerializationError('skin must be provided.');
        }
        $writer->addShort($data->skin);

        $writer->addByte(0xFF);
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

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
            $data->sessionId = $reader->getShort();
            $data->gender = Gender($reader->getShort());
            $data->hairStyle = $reader->getShort();
            $data->hairColor = $reader->getShort();
            $data->skin = $reader->getShort();
            $reader->nextChunk();
            $data->name = $reader->getString();
            $reader->nextChunk();
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
        return "CharacterCreateClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', gender=' . $this->gender . '', hairStyle=' . $this->hairStyle . '', hairColor=' . $this->hairColor . '', skin=' . $this->skin . '', name=' . $this->name . ')";
    }

}



