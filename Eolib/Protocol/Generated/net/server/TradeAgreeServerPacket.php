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
 * Partner agree state updated
 */


class TradeAgreeServerPacket
{
    private $byteSize = 0;
    private int $partnerPlayerId;
    private bool $agree;

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

    public function getAgree(): bool
    {
        return $this->agree;
    }

    public function setAgree(bool $agree): void
    {
        $this->agree = $agree;
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
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        TradeAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TradeAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeAgreeServerPacket $data): void {
        if ($data->partnerPlayerId === null)
        {
            throw new SerializationError('partnerPlayerId must be provided.');
        }
        $writer->addShort($data->partnerPlayerId);

        if ($data->agree === null)
        {
            throw new SerializationError('agree must be provided.');
        }
        $writer->addChar($data->agree ? 1 : 0);


    }

    /**
     * Deserializes an instance of `TradeAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeAgreeServerPacket
    {
        $data = new TradeAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->partnerPlayerId = $reader->getShort();
            $data->agree = $reader->getChar() !== 0;

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
        return "TradeAgreeServerPacket(byteSize=' . $this->byteSize . '', partnerPlayerId=' . $this->partnerPlayerId . '', agree=' . $this->agree . ')";
    }

}



