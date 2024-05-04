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
 * Own agree state updated
 */


class TradeSpecServerPacket
{
    private int $byteSize = 0;
    /** @var bool */
    private bool $agree;

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

    /** @return bool */
    public function getAgree(): bool
    {
        return $this->agree;
    }

    /** @param bool $agree */
    public function setAgree(bool $agree): void
    {
        $this->agree = $agree;
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
        return PacketAction::SPEC;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TradeSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeSpecServerPacket $data): void {
        if ($data->getAgree() == null)
        {
            throw new SerializationError('agree must be provided.');
        }
        $writer->addChar((int) $data->getAgree());


    }

    /**
     * Deserializes an instance of `TradeSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeSpecServerPacket
    {
        $data = new TradeSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setAgree($reader->getChar() !== 0);

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
        return "TradeSpecServerPacket(byteSize=$this->byteSize, agree=".var_export($this->agree, true).")";
    }

}



