<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Playing a note with the bard skill
 */


class JukeboxUseClientPacket
{
    private $byteSize = 0;
    private int $instrumentId;
    private int $noteId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getInstrumentId(): int
    {
        return $this->instrumentId;
    }

    public function setInstrumentId(int $instrumentId): void
    {
        $this->instrumentId = $instrumentId;
    }

    public function getNoteId(): int
    {
        return $this->noteId;
    }

    public function setNoteId(int $noteId): void
    {
        $this->noteId = $noteId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::JUKEBOX;
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
        JukeboxUseClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxUseClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxUseClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxUseClientPacket $data): void {
        if ($data->instrumentId === null)
        {
            throw new SerializationError('instrumentId must be provided.');
        }
        $writer->addChar($data->instrumentId);

        if ($data->noteId === null)
        {
            throw new SerializationError('noteId must be provided.');
        }
        $writer->addChar($data->noteId);


    }

    /**
     * Deserializes an instance of `JukeboxUseClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxUseClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxUseClientPacket
    {
        $data = new JukeboxUseClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->instrumentId = $reader->getChar();
            $data->noteId = $reader->getChar();

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
        return "JukeboxUseClientPacket(byteSize=' . $this->byteSize . '', instrumentId=' . $this->instrumentId . '', noteId=' . $this->noteId . ')";
    }

}



