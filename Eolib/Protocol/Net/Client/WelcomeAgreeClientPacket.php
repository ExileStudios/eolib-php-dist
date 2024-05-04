<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\Client\FileType;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Requesting a file
 */


class WelcomeAgreeClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileType;
    /** @var int */
    private int $sessionId;
    private ?FileTypeData $fileTypeData = null;

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
    public function getFileType(): int
    {
        return $this->fileType;
    }

    /** @param int $fileType */
    public function setFileType(int $fileType): void
    {
        $this->fileType = $fileType;
    }



    /** @return int */
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    public function getFileTypeData(): ?FileTypeData
    {
        /**
         * WelcomeAgreeClientPacket::FileTypeData: Gets or sets the data associated with the `fileType` field.
         */
        return $this->fileTypeData;
    }

    public function setFileTypeData(?FileTypeData $fileTypeData): void
    {
        $this->fileTypeData = $fileTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::WELCOME;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        WelcomeAgreeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `WelcomeAgreeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param WelcomeAgreeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, WelcomeAgreeClientPacket $data): void {
        if ($data->getFileType() == null)
        {
            throw new SerializationError('fileType must be provided.');
        }
        $writer->addChar((int) $data->getFileType());

        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addShort($data->getSessionId());

        if ($data->fileType === FileType::EMF)
        {
            if (!($data->fileTypeData instanceof FileTypeDataEmf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected fileTypeData to be of type FileTypeDataEmf for fileType " . $data->fileType . ".");
            }
            FileTypeDataEmf::serialize($writer, $data->getFileTypeData());
        }
        elseif ($data->fileType === FileType::EIF)
        {
            if (!($data->fileTypeData instanceof FileTypeDataEif))
            {
                throw new \Eolib\Protocol\SerializationError("Expected fileTypeData to be of type FileTypeDataEif for fileType " . $data->fileType . ".");
            }
            FileTypeDataEif::serialize($writer, $data->getFileTypeData());
        }
        elseif ($data->fileType === FileType::ENF)
        {
            if (!($data->fileTypeData instanceof FileTypeDataEnf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected fileTypeData to be of type FileTypeDataEnf for fileType " . $data->fileType . ".");
            }
            FileTypeDataEnf::serialize($writer, $data->getFileTypeData());
        }
        elseif ($data->fileType === FileType::ESF)
        {
            if (!($data->fileTypeData instanceof FileTypeDataEsf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected fileTypeData to be of type FileTypeDataEsf for fileType " . $data->fileType . ".");
            }
            FileTypeDataEsf::serialize($writer, $data->getFileTypeData());
        }
        elseif ($data->fileType === FileType::ECF)
        {
            if (!($data->fileTypeData instanceof FileTypeDataEcf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected fileTypeData to be of type FileTypeDataEcf for fileType " . $data->fileType . ".");
            }
            FileTypeDataEcf::serialize($writer, $data->getFileTypeData());
        }

    }

    /**
     * Deserializes an instance of `WelcomeAgreeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return WelcomeAgreeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): WelcomeAgreeClientPacket
    {
        $data = new WelcomeAgreeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileType($reader->getChar());
            $data->setSessionId($reader->getShort());
            if ($data->fileType === FileType::EMF)
            {
                $data->setFileTypeData(FileTypeDataEmf::deserialize($reader));
            }
            elseif ($data->fileType === FileType::EIF)
            {
                $data->setFileTypeData(FileTypeDataEif::deserialize($reader));
            }
            elseif ($data->fileType === FileType::ENF)
            {
                $data->setFileTypeData(FileTypeDataEnf::deserialize($reader));
            }
            elseif ($data->fileType === FileType::ESF)
            {
                $data->setFileTypeData(FileTypeDataEsf::deserialize($reader));
            }
            elseif ($data->fileType === FileType::ECF)
            {
                $data->setFileTypeData(FileTypeDataEcf::deserialize($reader));
            }

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
        return "WelcomeAgreeClientPacket(byteSize=$this->byteSize, fileType=".var_export($this->fileType, true).", sessionId=".var_export($this->sessionId, true).", fileTypeData=".var_export($this->fileTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `fileType` field.
 */
interface FileTypeData {}

/**
 * Data associated with fileType value FileType::EMF
 */

class FileTypeDataEmf implements FileTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;

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




    /**
     * Serializes an instance of `FileTypeDataEmf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FileTypeDataEmf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FileTypeDataEmf $data): void {
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addShort($data->getFileId());


    }

    /**
     * Deserializes an instance of `FileTypeDataEmf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FileTypeDataEmf The deserialized data.
     */
    public static function deserialize(EoReader $reader): FileTypeDataEmf
    {
        $data = new FileTypeDataEmf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileId($reader->getShort());

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
        return "FileTypeDataEmf(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).")";
    }

}



/**
 * Data associated with fileType value FileType::EIF
 */

class FileTypeDataEif implements FileTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;

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




    /**
     * Serializes an instance of `FileTypeDataEif` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FileTypeDataEif $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FileTypeDataEif $data): void {
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->getFileId());


    }

    /**
     * Deserializes an instance of `FileTypeDataEif` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FileTypeDataEif The deserialized data.
     */
    public static function deserialize(EoReader $reader): FileTypeDataEif
    {
        $data = new FileTypeDataEif();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileId($reader->getChar());

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
        return "FileTypeDataEif(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).")";
    }

}



/**
 * Data associated with fileType value FileType::ENF
 */

class FileTypeDataEnf implements FileTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;

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




    /**
     * Serializes an instance of `FileTypeDataEnf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FileTypeDataEnf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FileTypeDataEnf $data): void {
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->getFileId());


    }

    /**
     * Deserializes an instance of `FileTypeDataEnf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FileTypeDataEnf The deserialized data.
     */
    public static function deserialize(EoReader $reader): FileTypeDataEnf
    {
        $data = new FileTypeDataEnf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileId($reader->getChar());

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
        return "FileTypeDataEnf(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).")";
    }

}



/**
 * Data associated with fileType value FileType::ESF
 */

class FileTypeDataEsf implements FileTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;

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




    /**
     * Serializes an instance of `FileTypeDataEsf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FileTypeDataEsf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FileTypeDataEsf $data): void {
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->getFileId());


    }

    /**
     * Deserializes an instance of `FileTypeDataEsf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FileTypeDataEsf The deserialized data.
     */
    public static function deserialize(EoReader $reader): FileTypeDataEsf
    {
        $data = new FileTypeDataEsf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileId($reader->getChar());

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
        return "FileTypeDataEsf(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).")";
    }

}



/**
 * Data associated with fileType value FileType::ECF
 */

class FileTypeDataEcf implements FileTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $fileId;

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




    /**
     * Serializes an instance of `FileTypeDataEcf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param FileTypeDataEcf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, FileTypeDataEcf $data): void {
        if ($data->getFileId() == null)
        {
            throw new SerializationError('fileId must be provided.');
        }
        $writer->addChar($data->getFileId());


    }

    /**
     * Deserializes an instance of `FileTypeDataEcf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return FileTypeDataEcf The deserialized data.
     */
    public static function deserialize(EoReader $reader): FileTypeDataEcf
    {
        $data = new FileTypeDataEcf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setFileId($reader->getChar());

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
        return "FileTypeDataEcf(byteSize=$this->byteSize, fileId=".var_export($this->fileId, true).")";
    }

}





