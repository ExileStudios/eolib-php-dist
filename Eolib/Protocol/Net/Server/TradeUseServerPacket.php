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
use Eolib\Protocol\Net\Server\TradeItemData;
use Eolib\Protocol\SerializationError;

/**
 * Trade completed
 */


class TradeUseServerPacket
{
    private int $byteSize = 0;
    /** @var TradeItemData */
    private TradeItemData $tradeData;

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

    /** @return TradeItemData */
    public function getTradeData(): TradeItemData
    {
        return $this->tradeData;
    }

    /** @param TradeItemData $tradeData */
    public function setTradeData(TradeItemData $tradeData): void
    {
        $this->tradeData = $tradeData;
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
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TradeUseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeUseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeUseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeUseServerPacket $data): void {
        if ($data->getTradeData() == null)
        {
            throw new SerializationError('tradeData must be provided.');
        }
        TradeItemData::serialize($writer, $data->getTradeData());


    }

    /**
     * Deserializes an instance of `TradeUseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeUseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeUseServerPacket
    {
        $data = new TradeUseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setTradeData(TradeItemData::deserialize($reader));

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
        return "TradeUseServerPacket(byteSize=$this->byteSize, tradeData=".var_export($this->tradeData, true).")";
    }

}



