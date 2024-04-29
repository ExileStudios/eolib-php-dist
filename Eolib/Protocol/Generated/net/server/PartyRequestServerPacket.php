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
use Eolib\Protocol\Generated\Net\PartyRequestType;
use Eolib\Protocol\SerializationError;

/**
 * Received party invite / join request
 */


class PartyRequestServerPacket
{
    private $byteSize = 0;
    private int $requestType;
    private int $inviterPlayerId;
    private string $playerName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRequestType(): int
    {
        return $this->requestType;
    }

    public function setRequestType(int $requestType): void
    {
        $this->requestType = $requestType;
    }

    public function getInviterPlayerId(): int
    {
        return $this->inviterPlayerId;
    }

    public function setInviterPlayerId(int $inviterPlayerId): void
    {
        $this->inviterPlayerId = $inviterPlayerId;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        PartyRequestServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyRequestServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyRequestServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyRequestServerPacket $data): void {
        if ($data->requestType === null)
        {
            throw new SerializationError('requestType must be provided.');
        }
        $writer->addChar((int) $data->requestType);

        if ($data->inviterPlayerId === null)
        {
            throw new SerializationError('inviterPlayerId must be provided.');
        }
        $writer->addShort($data->inviterPlayerId);

        if ($data->playerName === null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->playerName);


    }

    /**
     * Deserializes an instance of `PartyRequestServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyRequestServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyRequestServerPacket
    {
        $data = new PartyRequestServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->requestType = PartyRequestType($reader->getChar());
            $data->inviterPlayerId = $reader->getShort();
            $data->playerName = $reader->getString();

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
        return "PartyRequestServerPacket(byteSize=' . $this->byteSize . '', requestType=' . $this->requestType . '', inviterPlayerId=' . $this->inviterPlayerId . '', playerName=' . $this->playerName . ')";
    }

}



