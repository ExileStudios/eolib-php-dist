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
use Eolib\Protocol\Net\Server\BoardPostListing;
use Eolib\Protocol\SerializationError;

/**
 * Reply to opening a town board
 */


class BoardOpenServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $boardId;
    /** @var int */
    private int $postsCount;
    /** @var BoardPostListing[] */
    public array $posts = [];

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



    /** @return BoardPostListing[] */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /** @param BoardPostListing[] $posts */
    public function setPosts(array $posts): void
    {
        $this->posts = $posts;
        $this->postsCount = count($this->posts);
    }

    /** @return int */
    public function getPostsCount(): int
    {
        return $this->postsCount;
    }

    /** @param int $postsCount */
    public function setPostsCount(int $postsCount): void
    {
        $this->postsCount = $postsCount;
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
        BoardOpenServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardOpenServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardOpenServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardOpenServerPacket $data): void {
        if ($data->getBoardId() == null)
        {
            throw new SerializationError('boardId must be provided.');
        }
        $writer->addChar($data->getBoardId());

        if ($data->getPostsCount() == null)
        {
            throw new SerializationError('postsCount must be provided.');
        }
        $writer->addChar($data->getPostsCount());

        if ($data->getPosts() == null)
        {
            throw new SerializationError('posts must be provided.');
        }
        if (count($data->posts) > 252)
        {
            throw new SerializationError("Expected length of posts to be 252 or less, got " . count($data->posts) . ".");
        }
        for ($i = 0; $i < $data->getPostsCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            BoardPostListing::serialize($writer, $data->getPosts()[$i]);

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
            $data->setBoardId($reader->getChar());
            $data->setPostsCount($reader->getChar());
            $data->posts = [];
            for ($i = 0; $i < $data->getPostsCount(); $i++)
            {
                $data->posts[] = BoardPostListing::deserialize($reader);
                if ($i + 1 < $data->getPostsCount())
                {
                    $reader->nextChunk();
                }
            }
            $reader->setChunkedReadingMode(false);

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
        return "BoardOpenServerPacket(byteSize=$this->byteSize, boardId=".var_export($this->boardId, true).", posts=".var_export($this->posts, true).")";
    }

}



