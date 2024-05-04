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
 * Opening a town board
 */


class BoardOpenClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $boardId;

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
    public function getBoardId(): int
    {
        return $this->boardId;
    }

    /** @param int $boardId */
    public function setBoardId(int $boardId): void
    {
        $this->boardId = $boardId;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BOARD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BoardOpenClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardOpenClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardOpenClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardOpenClientPacket $data): void {
        if ($data->getBoardId() == null)
        {
            throw new SerializationError('boardId must be provided.');
        }
        $writer->addShort($data->getBoardId());


    }

    /**
     * Deserializes an instance of `BoardOpenClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardOpenClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardOpenClientPacket
    {
        $data = new BoardOpenClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setBoardId($reader->getShort());

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
        return "BoardOpenClientPacket(byteSize=$this->byteSize, boardId=".var_export($this->boardId, true).")";
    }

}



