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
 * Saying &quot;I do&quot; at a wedding
 */


class PriestUseClientPacket
{
    private $byteSize = 0;
    private int $sessionId;

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

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PRIEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PriestUseClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PriestUseClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PriestUseClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PriestUseClientPacket $data): void {
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);


    }

    /**
     * Deserializes an instance of `PriestUseClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PriestUseClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PriestUseClientPacket
    {
        $data = new PriestUseClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
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
        return "PriestUseClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . ')";
    }

}



