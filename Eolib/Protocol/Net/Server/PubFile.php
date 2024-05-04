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
use Eolib\Data\StringEncodingUtils;
use Eolib\Protocol\SerializationError;


class PubFile
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;
    /** @var string */
    private string $content;

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
    public function getFileId(): int
    {
        return $this->fileId;
    }

    /** @param int $fileId */
    public function setFileId(int $fileId): void
    {
        $this->fileId = $fileId;
    }



    /** @return string */
    public function getContent(): string
    {
        return $this->content;
    }

    /** @param string $content */
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
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->getFileId());

        if ($data->getContent() == null)
        {
            throw new SerializationError('content must be provided.');
        }
        $writer->addBytes(StringEncodingUtils::stringToBytes($data->getContent()));


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
            $data->setFileId($reader->getChar());
            $data->setContent(StringEncodingUtils::bytesToString($reader->getBytes($reader->getRemaining())));

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
        return "PubFile(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).", content=".var_export($this->content, true).")";
    }

}


