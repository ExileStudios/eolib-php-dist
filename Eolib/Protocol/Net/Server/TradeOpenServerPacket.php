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
 * Trade window opens
 */


class TradeOpenServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $partnerPlayerId;
    /** @var string */
    private string $partnerPlayerName = "";
    /** @var int */
    private int $yourPlayerId;
    /** @var string */
    private string $yourPlayerName = "";

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
    public function getPartnerPlayerId(): int
    {
        return $this->partnerPlayerId;
    }

    /** @param int $partnerPlayerId */
    public function setPartnerPlayerId(int $partnerPlayerId): void
    {
        $this->partnerPlayerId = $partnerPlayerId;
    }



    /** @return string */
    public function getPartnerPlayerName(): string
    {
        return $this->partnerPlayerName;
    }

    /** @param string $partnerPlayerName */
    public function setPartnerPlayerName(string $partnerPlayerName): void
    {
        $this->partnerPlayerName = $partnerPlayerName;
    }



    /** @return int */
    public function getYourPlayerId(): int
    {
        return $this->yourPlayerId;
    }

    /** @param int $yourPlayerId */
    public function setYourPlayerId(int $yourPlayerId): void
    {
        $this->yourPlayerId = $yourPlayerId;
    }



    /** @return string */
    public function getYourPlayerName(): string
    {
        return $this->yourPlayerName;
    }

    /** @param string $yourPlayerName */
    public function setYourPlayerName(string $yourPlayerName): void
    {
        $this->yourPlayerName = $yourPlayerName;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TRADE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getPartnerPlayerId() == null)
        {
            throw new SerializationError('partnerPlayerId must be provided.');
        }
        $writer->addShort($data->getPartnerPlayerId());

        if ($data->getPartnerPlayerName() == null)
        {
            throw new SerializationError('partnerPlayerName must be provided.');
        }
        $writer->addString($data->getPartnerPlayerName());

        $writer->addByte(0xFF);
        if ($data->getYourPlayerId() == null)
        {
            throw new SerializationError('yourPlayerId must be provided.');
        }
        $writer->addShort($data->getYourPlayerId());

        if ($data->getYourPlayerName() == null)
        {
            throw new SerializationError('yourPlayerName must be provided.');
        }
        $writer->addString($data->getYourPlayerName());

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
            $data->setPartnerPlayerId($reader->getShort());
            $data->setPartnerPlayerName($reader->getString());
            $reader->nextChunk();
            $data->setYourPlayerId($reader->getShort());
            $data->setYourPlayerName($reader->getString());
            $reader->nextChunk();
            $reader->setChunkedReadingMode(false);

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
        return "TradeOpenServerPacket(byteSize=$this->byteSize, partnerPlayerId=".var_export($this->partnerPlayerId, true).", partnerPlayerName=$this->partnerPlayerName, yourPlayerId=".var_export($this->yourPlayerId, true).", yourPlayerName=$this->yourPlayerName)";
    }

}



