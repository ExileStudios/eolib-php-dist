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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Someone playing a note with the bard skill nearby
 */


class JukeboxMsgServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $direction;
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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return int */
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
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
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

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
            $data->setPlayerId($reader->getShort());
            $data->setDirection($reader->getChar());
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
        return "JukeboxMsgServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", direction=".var_export($this->direction, true).", instrumentId=".var_export($this->instrumentId, true).", noteId=".var_export($this->noteId, true).")";
    }

}



