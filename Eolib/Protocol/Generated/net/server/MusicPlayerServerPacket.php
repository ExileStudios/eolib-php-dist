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
 * Sound effect
 */


class MusicPlayerServerPacket
{
    private $byteSize = 0;
    private int $soundId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSoundId(): int
    {
        return $this->soundId;
    }

    public function setSoundId(int $soundId): void
    {
        $this->soundId = $soundId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MUSIC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        MusicPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `MusicPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MusicPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MusicPlayerServerPacket $data): void {
        if ($data->soundId === null)
        {
            throw new SerializationError('soundId must be provided.');
        }
        $writer->addChar($data->soundId);


    }

    /**
     * Deserializes an instance of `MusicPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MusicPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): MusicPlayerServerPacket
    {
        $data = new MusicPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->soundId = $reader->getChar();

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
        return "MusicPlayerServerPacket(byteSize=' . $this->byteSize . '', soundId=' . $this->soundId . ')";
    }

}



