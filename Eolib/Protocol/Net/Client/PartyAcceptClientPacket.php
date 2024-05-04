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
use Eolib\Protocol\Net\PartyRequestType;
use Eolib\Protocol\SerializationError;

/**
 * Accept party invite / join request
 */


class PartyAcceptClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $requestType;
    /** @var int */
    private int $inviterPlayerId;

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
    public function getRequestType(): int
    {
        return $this->requestType;
    }

    /** @param int $requestType */
    public function setRequestType(int $requestType): void
    {
        $this->requestType = $requestType;
    }



    /** @return int */
    public function getInviterPlayerId(): int
    {
        return $this->inviterPlayerId;
    }

    /** @param int $inviterPlayerId */
    public function setInviterPlayerId(int $inviterPlayerId): void
    {
        $this->inviterPlayerId = $inviterPlayerId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PartyAcceptClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyAcceptClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyAcceptClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyAcceptClientPacket $data): void {
        if ($data->getRequestType() == null)
        {
            throw new SerializationError('requestType must be provided.');
        }
        $writer->addChar((int) $data->getRequestType());

        if ($data->getInviterPlayerId() == null)
        {
            throw new SerializationError('inviterPlayerId must be provided.');
        }
        $writer->addShort($data->getInviterPlayerId());


    }

    /**
     * Deserializes an instance of `PartyAcceptClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyAcceptClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyAcceptClientPacket
    {
        $data = new PartyAcceptClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setRequestType($reader->getChar());
            $data->setInviterPlayerId($reader->getShort());

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
        return "PartyAcceptClientPacket(byteSize=$this->byteSize, requestType=".var_export($this->requestType, true).", inviterPlayerId=".var_export($this->inviterPlayerId, true).")";
    }

}



