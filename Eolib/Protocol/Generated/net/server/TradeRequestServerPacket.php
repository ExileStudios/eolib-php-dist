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
use Eolib\Protocol\SerializationError;

/**
 * Trade request from another player
 */


class TradeRequestServerPacket
{
    private $byteSize = 0;
    private int $partnerPlayerId;
    private string $partnerPlayerName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPartnerPlayerId(): int
    {
        return $this->partnerPlayerId;
    }

    public function setPartnerPlayerId(int $partnerPlayerId): void
    {
        $this->partnerPlayerId = $partnerPlayerId;
    }

    public function getPartnerPlayerName(): string
    {
        return $this->partnerPlayerName;
    }

    public function setPartnerPlayerName(string $partnerPlayerName): void
    {
        $this->partnerPlayerName = $partnerPlayerName;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TRADE;
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
        TradeRequestServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeRequestServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeRequestServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeRequestServerPacket $data): void {
        $writer->addChar(138);

        if ($data->partnerPlayerId === null)
        {
            throw new SerializationError('partnerPlayerId must be provided.');
        }
        $writer->addShort($data->partnerPlayerId);

        if ($data->partnerPlayerName === null)
        {
            throw new SerializationError('partnerPlayerName must be provided.');
        }
        $writer->addString($data->partnerPlayerName);


    }

    /**
     * Deserializes an instance of `TradeRequestServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeRequestServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeRequestServerPacket
    {
        $data = new TradeRequestServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getChar();
            $data->partnerPlayerId = $reader->getShort();
            $data->partnerPlayerName = $reader->getString();

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
        return "TradeRequestServerPacket(byteSize=' . $this->byteSize . '', partnerPlayerId=' . $this->partnerPlayerId . '', partnerPlayerName=' . $this->partnerPlayerName . ')";
    }

}



