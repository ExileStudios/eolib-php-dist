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
 * Reply to requesting sleeping at an inn
 */


class CitizenRequestServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $cost;

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
    public function getCost(): int
    {
        return $this->cost;
    }

    /** @param int $cost */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CITIZEN;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        CitizenRequestServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CitizenRequestServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CitizenRequestServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CitizenRequestServerPacket $data): void {
        if ($data->getCost() == null)
        {
            throw new SerializationError('cost must be provided.');
        }
        $writer->addInt($data->getCost());


    }

    /**
     * Deserializes an instance of `CitizenRequestServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CitizenRequestServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CitizenRequestServerPacket
    {
        $data = new CitizenRequestServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCost($reader->getInt());

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
        return "CitizenRequestServerPacket(byteSize=$this->byteSize, cost=".var_export($this->cost, true).")";
    }

}



