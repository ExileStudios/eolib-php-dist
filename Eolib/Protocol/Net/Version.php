<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class Version
{
    private int $byteSize = 0;
    /** @var int */
    private int $major;
    /** @var int */
    private int $minor;
    /** @var int */
    private int $patch;

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
    public function getMajor(): int
    {
        return $this->major;
    }

    /** @param int $major */
    public function setMajor(int $major): void
    {
        $this->major = $major;
    }



    /** @return int */
    public function getMinor(): int
    {
        return $this->minor;
    }

    /** @param int $minor */
    public function setMinor(int $minor): void
    {
        $this->minor = $minor;
    }



    /** @return int */
    public function getPatch(): int
    {
        return $this->patch;
    }

    /** @param int $patch */
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
        if ($data->getMajor() == null)
        {
            throw new SerializationError('major must be provided.');
        }
        $writer->addChar($data->getMajor());

        if ($data->getMinor() == null)
        {
            throw new SerializationError('minor must be provided.');
        }
        $writer->addChar($data->getMinor());

        if ($data->getPatch() == null)
        {
            throw new SerializationError('patch must be provided.');
        }
        $writer->addChar($data->getPatch());


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
            $data->setMajor($reader->getChar());
            $data->setMinor($reader->getChar());
            $data->setPatch($reader->getChar());

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
        return "Version(byteSize=$this->byteSize, major=".var_export($this->major, true).", minor=".var_export($this->minor, true).", patch=".var_export($this->patch, true).")";
    }

}


