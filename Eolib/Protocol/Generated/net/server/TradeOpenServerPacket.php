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
 * Trade window opens
 */


class TradeOpenServerPacket
{
    private $byteSize = 0;
    private int $partnerPlayerId;
    private string $partnerPlayerName = "";
    private int $yourPlayerId;
    private string $yourPlayerName = "";

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

    public function getYourPlayerId(): int
    {
        return $this->yourPlayerId;
    }

    public function setYourPlayerId(int $yourPlayerId): void
    {
        $this->yourPlayerId = $yourPlayerId;
    }

    public function getYourPlayerName(): string
    {
        return $this->yourPlayerName;
    }

    public function setYourPlayerName(string $yourPlayerName): void
    {
        $this->yourPlayerName = $yourPlayerName;
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TradeOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeOpenServerPacket $data): void {
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

        $writer->addByte(0xFF);
        if ($data->yourPlayerId === null)
        {
            throw new SerializationError('yourPlayerId must be provided.');
        }
        $writer->addShort($data->yourPlayerId);

        if ($data->yourPlayerName === null)
        {
            throw new SerializationError('yourPlayerName must be provided.');
        }
        $writer->addString($data->yourPlayerName);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `TradeOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeOpenServerPacket
    {
        $data = new TradeOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->partnerPlayerId = $reader->getShort();
            $data->partnerPlayerName = $reader->getString();
            $reader->nextChunk();
            $data->yourPlayerId = $reader->getShort();
            $data->yourPlayerName = $reader->getString();
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
        return "TradeOpenServerPacket(byteSize=' . $this->byteSize . '', partnerPlayerId=' . $this->partnerPlayerId . '', partnerPlayerName=' . $this->partnerPlayerName . '', yourPlayerId=' . $this->yourPlayerId . '', yourPlayerName=' . $this->yourPlayerName . ')";
    }

}



