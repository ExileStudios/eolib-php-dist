<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Playing a note with the bard skill
 */


class JukeboxUseClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $instrumentId;
    /** @var int */
    private int $noteId;

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
    public function getInstrumentId(): int
    {
        return $this->instrumentId;
    }

    /** @param int $instrumentId */
    public function setInstrumentId(int $instrumentId): void
    {
        $this->instrumentId = $instrumentId;
    }



    /** @return int */
    public function getNoteId(): int
    {
        return $this->noteId;
    }

    /** @param int $noteId */
    public function setNoteId(int $noteId): void
    {
        $this->noteId = $noteId;
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
        if ($data->getInstrumentId() == null)
        {
            throw new SerializationError('instrumentId must be provided.');
        }
        $writer->addChar($data->getInstrumentId());

        if ($data->getNoteId() == null)
        {
            throw new SerializationError('noteId must be provided.');
        }
        $writer->addChar($data->getNoteId());


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
            $data->setInstrumentId($reader->getChar());
            $data->setNoteId($reader->getChar());

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
        return "JukeboxUseClientPacket(byteSize=$this->byteSize, instrumentId=".var_export($this->instrumentId, true).", noteId=".var_export($this->noteId, true).")";
    }

}



