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
use Eolib\Protocol\SerializationError;


class BoardPostListing
{
    private $byteSize = 0;
    private int $postId;
    private string $author = "";
    private string $subject = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }


    /**
     * Serializes an instance of `BoardPostListing` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardPostListing $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardPostListing $data): void {
        if ($data->postId === null)
        {
            throw new SerializationError('postId must be provided.');
        }
        $writer->addShort($data->postId);

        $writer->addByte(0xFF);
        if ($data->author === null)
        {
            throw new SerializationError('author must be provided.');
        }
        $writer->addString($data->author);

        $writer->addByte(0xFF);
        if ($data->subject === null)
        {
            throw new SerializationError('subject must be provided.');
        }
        $writer->addString($data->subject);


    }

    /**
     * Deserializes an instance of `BoardPostListing` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardPostListing The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardPostListing
    {
        $data = new BoardPostListing();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->postId = $reader->getShort();
            $reader->nextChunk();
            $data->author = $reader->getString();
            $reader->nextChunk();
            $data->subject = $reader->getString();
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
        return "BoardPostListing(byteSize=' . $this->byteSize . '', postId=' . $this->postId . '', author=' . $this->author . '', subject=' . $this->subject . ')";
    }

}


