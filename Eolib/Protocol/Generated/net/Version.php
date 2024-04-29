<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class Version
{
    private $byteSize = 0;
    private int $major;
    private int $minor;
    private int $patch;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMajor(): int
    {
        return $this->major;
    }

    public function setMajor(int $major): void
    {
        $this->major = $major;
    }

    public function getMinor(): int
    {
        return $this->minor;
    }

    public function setMinor(int $minor): void
    {
        $this->minor = $minor;
    }

    public function getPatch(): int
    {
        return $this->patch;
    }

    public function setPatch(int $patch): void
    {
        $this->patch = $patch;
    }


    /**
     * Serializes an instance of `Version` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Version $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Version $data): void {
        if ($data->major === null)
        {
            throw new SerializationError('major must be provided.');
        }
        $writer->addChar($data->major);

        if ($data->minor === null)
        {
            throw new SerializationError('minor must be provided.');
        }
        $writer->addChar($data->minor);

        if ($data->patch === null)
        {
            throw new SerializationError('patch must be provided.');
        }
        $writer->addChar($data->patch);


    }

    /**
     * Deserializes an instance of `Version` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Version The deserialized data.
     */
    public static function deserialize(EoReader $reader): Version
    {
        $data = new Version();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->major = $reader->getChar();
            $data->minor = $reader->getChar();
            $data->patch = $reader->getChar();

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
        return "Version(byteSize=' . $this->byteSize . '', major=' . $this->major . '', minor=' . $this->minor . '', patch=' . $this->patch . ')";
    }

}


