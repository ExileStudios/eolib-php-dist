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
 * Reading a post on a town board
 */


class BoardTakeClientPacket
{
    private $byteSize = 0;
    private int $boardId;
    private int $postId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBoardId(): int
    {
        return $this->boardId;
    }

    public function setBoardId(int $boardId): void
    {
        $this->boardId = $boardId;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BOARD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        BoardTakeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardTakeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardTakeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardTakeClientPacket $data): void {
        if ($data->boardId === null)
        {
            throw new SerializationError('boardId must be provided.');
        }
        $writer->addShort($data->boardId);

        if ($data->postId === null)
        {
            throw new SerializationError('postId must be provided.');
        }
        $writer->addShort($data->postId);


    }

    /**
     * Deserializes an instance of `BoardTakeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardTakeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardTakeClientPacket
    {
        $data = new BoardTakeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->boardId = $reader->getShort();
            $data->postId = $reader->getShort();

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
        return "BoardTakeClientPacket(byteSize=' . $this->byteSize . '', boardId=' . $this->boardId . '', postId=' . $this->postId . ')";
    }

}



