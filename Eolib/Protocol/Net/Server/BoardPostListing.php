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
use Eolib\Protocol\SerializationError;


class BoardPostListing
{
    private int $byteSize = 0;
    /** @var int */
    private int $postId;
    /** @var string */
    private string $author = "";
    /** @var string */
    private string $subject = "";

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
    public function getPostId(): int
    {
        return $this->postId;
    }

    /** @param int $postId */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }



    /** @return string */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /** @param string $author */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }



    /** @return string */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /** @param string $subject */
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
        if ($data->getPostId() == null)
        {
            throw new SerializationError('postId must be provided.');
        }
        $writer->addShort($data->getPostId());

        $writer->addByte(0xFF);
        if ($data->getAuthor() == null)
        {
            throw new SerializationError('author must be provided.');
        }
        $writer->addString($data->getAuthor());

        $writer->addByte(0xFF);
        if ($data->getSubject() == null)
        {
            throw new SerializationError('subject must be provided.');
        }
        $writer->addString($data->getSubject());


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
            $data->setPostId($reader->getShort());
            $reader->nextChunk();
            $data->setAuthor($reader->getString());
            $reader->nextChunk();
            $data->setSubject($reader->getString());
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
        return "BoardPostListing(byteSize=$this->byteSize, postId=".var_export($this->postId, true).", author=$this->author, subject=$this->subject)";
    }

}


