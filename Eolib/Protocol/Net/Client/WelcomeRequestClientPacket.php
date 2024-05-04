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
 * Selected a character
 */


class WelcomeRequestClientPacket
{
    private int $byteSize = 0;
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
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeRequestClientPacket $data): void {
        if ($data->getCharacterId() == null)
        {
            throw new SerializationError('characterId must be provided.');
        }
        $writer->addInt($data->getCharacterId());


    }

    /**
     * Deserializes an instance of `WelcomeRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeRequestClientPacket
    {
        $data = new WelcomeRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
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
        return "WelcomeRequestClientPacket(byteSize=$this->byteSize, characterId=".var_export($this->characterId, true).")";
    }

}



