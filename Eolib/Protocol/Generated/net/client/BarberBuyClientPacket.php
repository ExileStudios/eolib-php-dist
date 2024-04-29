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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Purchasing a hair-style
 */


class BarberBuyClientPacket
{
    private $byteSize = 0;
    private int $hairStyle;
    private int $hairColor;
    private int $sessionId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
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

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BARBER;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->hairStyle === null)
        {
            throw new SerializationError('hairStyle must be provided.');
        }
        $writer->addChar($data->hairStyle);

        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->hairColor);

        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);


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
            $data->hairStyle = $reader->getChar();
            $data->hairColor = $reader->getChar();
            $data->sessionId = $reader->getInt();

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
        return "BarberBuyClientPacket(byteSize=' . $this->byteSize . '', hairStyle=' . $this->hairStyle . '', hairColor=' . $this->hairColor . '', sessionId=' . $this->sessionId . ')";
    }

}



