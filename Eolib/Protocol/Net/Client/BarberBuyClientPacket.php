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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Purchasing a hair-style
 */


class BarberBuyClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $hairStyle;
    /** @var int */
    private int $hairColor;
    /** @var int */
    private int $sessionId;

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BARBER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::BUY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BarberBuyClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BarberBuyClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BarberBuyClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BarberBuyClientPacket $data): void {
        if ($data->getHairStyle() == null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->getHairStyle());

        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->getHairColor());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());


    }

    /**
     * Deserializes an instance of `BarberBuyClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BarberBuyClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BarberBuyClientPacket
    {
        $data = new BarberBuyClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setHairStyle($reader->getChar());
            $data->setHairColor($reader->getChar());
            $data->setSessionId($reader->getInt());

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
        return "BarberBuyClientPacket(byteSize=$this->byteSize, hairStyle=".var_export($this->hairStyle, true).", hairColor=".var_export($this->hairColor, true).", sessionId=".var_export($this->sessionId, true).")";
    }

}



