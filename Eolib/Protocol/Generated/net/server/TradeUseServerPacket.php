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
use Eolib\Protocol\Generated\Net\server\TradeItemData;
use Eolib\Protocol\SerializationError;

/**
 * Trade completed
 */


class TradeUseServerPacket
{
    private $byteSize = 0;
    private TradeItemData $tradeData;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getTradeData(): TradeItemData
    {
        return $this->tradeData;
    }

    public function setTradeData(TradeItemData $tradeData): void
    {
        $this->tradeData = $tradeData;
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
        if ($data->tradeData === null)
        {
            throw new SerializationError('tradeData must be provided.');
        }
        TradeItemData::serialize($writer, $data->tradeData);


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
            $data->tradeData = TradeItemData::deserialize($reader);

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
        return "TradeUseServerPacket(byteSize=' . $this->byteSize . '', tradeData=' . $this->tradeData . ')";
    }

}



