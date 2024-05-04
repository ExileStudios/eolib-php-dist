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
 * Get guild description reply
 */


class GuildTakeServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $description = "";

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

    /** @return string */
    public function getDescription(): string
    {
        return $this->description;
    }

    /** @param string $description */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
        return PacketAction::TAKE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildTakeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildTakeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildTakeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildTakeServerPacket $data): void {
        if ($data->getDescription() == null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->getDescription());


    }

    /**
     * Deserializes an instance of `GuildTakeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildTakeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildTakeServerPacket
    {
        $data = new GuildTakeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setDescription($reader->getString());

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
        return "GuildTakeServerPacket(byteSize=$this->byteSize, description=$this->description)";
    }

}



