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
 * Temporary mute applied
 */


class TalkSpecServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $adminName = "";

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
    public function getAdminName(): string
    {
        return $this->adminName;
    }

    /** @param string $adminName */
    public function setAdminName(string $adminName): void
    {
        $this->adminName = $adminName;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::TALK;
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
        TalkSpecServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `TalkSpecServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkSpecServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkSpecServerPacket $data): void {
        if ($data->getAdminName() == null)
        {
            throw new SerializationError('adminName must be provided.');
        }
        $writer->addString($data->getAdminName());


    }

    /**
     * Deserializes an instance of `TalkSpecServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkSpecServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkSpecServerPacket
    {
        $data = new TalkSpecServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setAdminName($reader->getString());

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
        return "TalkSpecServerPacket(byteSize=$this->byteSize, adminName=$this->adminName)";
    }

}



