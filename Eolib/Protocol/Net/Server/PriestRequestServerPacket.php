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

/**
 * Wedding request
 */


class PriestRequestServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var string */
    private string $partnerName = "";

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



    /** @return string */
    public function getPartnerName(): string
    {
        return $this->partnerName;
    }

    /** @param string $partnerName */
    public function setPartnerName(string $partnerName): void
    {
        $this->partnerName = $partnerName;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PRIEST;
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
        PriestRequestServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PriestRequestServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PriestRequestServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PriestRequestServerPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->getPartnerName() == null)
        {
            throw new SerializationError('partnerName must be provided.');
        }
        $writer->addString($data->getPartnerName());


    }

    /**
     * Deserializes an instance of `PriestRequestServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PriestRequestServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PriestRequestServerPacket
    {
        $data = new PriestRequestServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSessionId($reader->getShort());
            $data->setPartnerName($reader->getString());

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
        return "PriestRequestServerPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", partnerName=$this->partnerName)";
    }

}



