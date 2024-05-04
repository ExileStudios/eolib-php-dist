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
 * Update gold counts after deposit/withdraw
 */


class BankReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $goldInventory;
    /** @var int */
    private int $goldBank;

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
    public function getGoldInventory(): int
    {
        return $this->goldInventory;
    }

    /** @param int $goldInventory */
    public function setGoldInventory(int $goldInventory): void
    {
        $this->goldInventory = $goldInventory;
    }



    /** @return int */
    public function getGoldBank(): int
    {
        return $this->goldBank;
    }

    /** @param int $goldBank */
    public function setGoldBank(int $goldBank): void
    {
        $this->goldBank = $goldBank;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BANK;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BankReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BankReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BankReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BankReplyServerPacket $data): void {
        if ($data->getGoldInventory() == null)
        {
            throw new SerializationError('goldInventory must be provided.');
        }
        $writer->addInt($data->getGoldInventory());

        if ($data->getGoldBank() == null)
        {
            throw new SerializationError('goldBank must be provided.');
        }
        $writer->addInt($data->getGoldBank());


    }

    /**
     * Deserializes an instance of `BankReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BankReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BankReplyServerPacket
    {
        $data = new BankReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setGoldInventory($reader->getInt());
            $data->setGoldBank($reader->getInt());

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
        return "BankReplyServerPacket(byteSize=$this->byteSize, goldInventory=".var_export($this->goldInventory, true).", goldBank=".var_export($this->goldBank, true).")";
    }

}



