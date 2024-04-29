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
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Someone playing a note with the bard skill nearby
 */


class JukeboxMsgServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $direction;
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

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
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
        return PacketAction::MSG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        JukeboxMsgServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `JukeboxMsgServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param JukeboxMsgServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, JukeboxMsgServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);

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
     * Deserializes an instance of `JukeboxMsgServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return JukeboxMsgServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): JukeboxMsgServerPacket
    {
        $data = new JukeboxMsgServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->direction = Direction($reader->getChar());
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
        return "JukeboxMsgServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', direction=' . $this->direction . '', instrumentId=' . $this->instrumentId . '', noteId=' . $this->noteId . ')";
    }

}



