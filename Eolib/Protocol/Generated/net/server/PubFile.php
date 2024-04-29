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


class PubFile
{
    private $byteSize = 0;
    private int $fileId;
    private string $content;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getFileId(): int
    {
        return $this->fileId;
    }

    public function setFileId(int $fileId): void
    {
        $this->fileId = $fileId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }


    /**
     * Serializes an instance of `PubFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PubFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PubFile $data): void {
        if ($data->fileId === null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->fileId);

        if ($data->content === null)
        {
            throw new SerializationError('content must be provided.');
        }
        $writer->addBytes($data->content);


    }

    /**
     * Deserializes an instance of `PubFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PubFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): PubFile
    {
        $data = new PubFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->fileId = $reader->getChar();
            $data->content = $reader->getBytes($reader->remaining());

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
        return "PubFile(byteSize=' . $this->byteSize . '', fileId=' . $this->fileId . '', content=' . $this->content . ')";
    }

}


