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
 * Play background music
 */


class JukeboxPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $mfxId;

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
    public function getMfxId(): int
    {
        return $this->mfxId;
    }

    /** @param int $mfxId */
    public function setMfxId(int $mfxId): void
    {
        $this->mfxId = $mfxId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::JUKEBOX;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        JukeboxPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxPlayerServerPacket $data): void {
        if ($data->getMfxId() == null)
        {
            throw new SerializationError('mfxId must be provided.');
        }
        $writer->addChar($data->getMfxId());


    }

    /**
     * Deserializes an instance of `JukeboxPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxPlayerServerPacket
    {
        $data = new JukeboxPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMfxId($reader->getChar());

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
        return "JukeboxPlayerServerPacket(byteSize=$this->byteSize, mfxId=".var_export($this->mfxId, true).")";
    }

}



