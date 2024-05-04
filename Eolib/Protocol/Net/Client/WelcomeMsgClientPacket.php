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
 * Entering game
 */


class WelcomeMsgClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $characterId;

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
    public function getCharacterId(): int
    {
        return $this->characterId;
    }

    /** @param int $characterId */
    public function setCharacterId(int $characterId): void
    {
        $this->characterId = $characterId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::MSG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeMsgClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeMsgClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeMsgClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeMsgClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addThree($data->getSessionId());

        if ($data->getCharacterId() == null)
        {
            throw new SerializationError('characterId must be provided.');
        }
        $writer->addInt($data->getCharacterId());


    }

    /**
     * Deserializes an instance of `WelcomeMsgClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeMsgClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeMsgClientPacket
    {
        $data = new WelcomeMsgClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSessionId($reader->getThree());
            $data->setCharacterId($reader->getInt());

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
        return "WelcomeMsgClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", characterId=".var_export($this->characterId, true).")";
    }

}



