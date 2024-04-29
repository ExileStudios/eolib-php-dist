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
 * Posting a new message to a town board
 */


class BoardCreateClientPacket
{
    private $byteSize = 0;
    private int $boardId;
    private string $postSubject = "";
    private string $postBody = "";

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

    public function getPostSubject(): string
    {
        return $this->postSubject;
    }

    public function setPostSubject(string $postSubject): void
    {
        $this->postSubject = $postSubject;
    }

    public function getPostBody(): string
    {
        return $this->postBody;
    }

    public function setPostBody(string $postBody): void
    {
        $this->postBody = $postBody;
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
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BoardCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardCreateClientPacket $data): void {
        if ($data->boardId === null)
        {
            throw new SerializationError('boardId must be provided.');
        }
        $writer->addShort($data->boardId);

        $writer->addByte(0xFF);
        if ($data->postSubject === null)
        {
            throw new SerializationError('postSubject must be provided.');
        }
        $writer->addString($data->postSubject);

        $writer->addByte(0xFF);
        if ($data->postBody === null)
        {
            throw new SerializationError('postBody must be provided.');
        }
        $writer->addString($data->postBody);

        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `BoardCreateClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardCreateClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardCreateClientPacket
    {
        $data = new BoardCreateClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->boardId = $reader->getShort();
            $reader->nextChunk();
            $data->postSubject = $reader->getString();
            $reader->nextChunk();
            $data->postBody = $reader->getString();
            $reader->nextChunk();
            $reader->setChunkedReadingMode(false);

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
        return "BoardCreateClientPacket(byteSize=' . $this->byteSize . '', boardId=' . $this->boardId . '', postSubject=' . $this->postSubject . '', postBody=' . $this->postBody . ')";
    }

}



