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
 * Get guild bank reply
 */


class GuildSellServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $goldAmount;

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
    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    /** @param int $goldAmount */
    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::GUILD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::SELL;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildSellServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildSellServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildSellServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildSellServerPacket $data): void {
        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());


    }

    /**
     * Deserializes an instance of `GuildSellServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildSellServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildSellServerPacket
    {
        $data = new GuildSellServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setGoldAmount($reader->getInt());

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
        return "GuildSellServerPacket(byteSize=$this->byteSize, goldAmount=".var_export($this->goldAmount, true).")";
    }

}



