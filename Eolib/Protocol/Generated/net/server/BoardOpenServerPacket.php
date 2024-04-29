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
use Eolib\Protocol\Generated\Net\server\BoardPostListing;
use Eolib\Protocol\SerializationError;

/**
 * Reply to opening a town board
 */


class BoardOpenServerPacket
{
    private $byteSize = 0;
    private int $boardId;
    private int $postsCount;
    private array $posts;

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

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function setPosts(array $posts): void
    {
        $this->posts = $posts;
        $this->postsCount = strlen($this->posts);
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
        return PacketAction::OPEN;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BoardOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardOpenServerPacket $data): void {
        if ($data->boardId === null)
        {
            throw new SerializationError('boardId must be provided.');
        }
        $writer->addChar($data->boardId);

        if ($data->postsCount === null)
        {
            throw new SerializationError('postsCount must be provided.');
        }
        $writer->addChar($data->postsCount);

        if ($data->posts === null)
        {
            throw new SerializationError('posts must be provided.');
        }
        if (strlen($data->posts) > 252)
        {
            throw new SerializationError("Expected length of posts to be 252 or less, got {strlen($data->posts)}.");
        }
        for ($i = 0; $i < $data->postsCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            BoardPostListing::serialize($writer, $data->posts[$i]);

        }

    }

    /**
     * Deserializes an instance of `BoardOpenServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardOpenServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardOpenServerPacket
    {
        $data = new BoardOpenServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->boardId = $reader->getChar();
            $data->postsCount = $reader->getChar();
            $data->posts = [];
            for ($i = 0; $i < $data->postsCount; $i++)
            {
                $data->posts[] = BoardPostListing::deserialize($reader);
                if ($i + 1 < $data->postsCount)
                {
                    $reader->nextChunk();
                }
            }
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
        return "BoardOpenServerPacket(byteSize=' . $this->byteSize . '', boardId=' . $this->boardId . '', posts=' . $this->posts . ')";
    }

}



