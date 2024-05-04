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
use Eolib\Protocol\Net\Server\DialogEntryType;
use Eolib\Protocol\SerializationError;


class DialogEntry
{
    private int $byteSize = 0;
    /** @var int */
    private int $entryType;
    private ?EntryTypeData $entryTypeData = null;
    /** @var string */
    private string $line = "";

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
    public function getEntryType(): int
    {
        return $this->entryType;
    }

    /** @param int $entryType */
    public function setEntryType(int $entryType): void
    {
        $this->entryType = $entryType;
    }



    public function getEntryTypeData(): ?EntryTypeData
    {
        /**
         * DialogEntry::EntryTypeData: Gets or sets the data associated with the `entryType` field.
         */
        return $this->entryTypeData;
    }

    public function setEntryTypeData(?EntryTypeData $entryTypeData): void
    {
        $this->entryTypeData = $entryTypeData;
    }

    /** @return string */
    public function getLine(): string
    {
        return $this->line;
    }

    /** @param string $line */
    public function setLine(string $line): void
    {
        $this->line = $line;
    }




    /**
     * Serializes an instance of `DialogEntry` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DialogEntry $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DialogEntry $data): void {
        if ($data->getEntryType() == null)
        {
            throw new SerializationError('entryType must be provided.');
        }
        $writer->addShort((int) $data->getEntryType());

        if ($data->entryType === DialogEntryType::LINK)
        {
            if (!($data->entryTypeData instanceof EntryTypeDataLink))
            {
                throw new \Eolib\Protocol\SerializationError("Expected entryTypeData to be of type EntryTypeDataLink for entryType " . $data->entryType . ".");
            }
            EntryTypeDataLink::serialize($writer, $data->getEntryTypeData());
        }
        if ($data->getLine() == null)
        {
            throw new SerializationError('line must be provided.');
        }
        $writer->addString($data->getLine());


    }

    /**
     * Deserializes an instance of `DialogEntry` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DialogEntry The deserialized data.
     */
    public static function deserialize(EoReader $reader): DialogEntry
    {
        $data = new DialogEntry();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setEntryType($reader->getShort());
            if ($data->entryType === DialogEntryType::LINK)
            {
                $data->setEntryTypeData(EntryTypeDataLink::deserialize($reader));
            }
            $data->setLine($reader->getString());

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
        return "DialogEntry(byteSize=$this->byteSize, entryType=".var_export($this->entryType, true).", entryTypeData=".var_export($this->entryTypeData, true).", line=$this->line)";
    }

}

/**
 * Data associated with different values of the `entryType` field.
 */
interface EntryTypeData {}

/**
 * Data associated with entryType value DialogEntryType::LINK
 */

class EntryTypeDataLink implements EntryTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $linkId;

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
    public function getLinkId(): int
    {
        return $this->linkId;
    }

    /** @param int $linkId */
    public function setLinkId(int $linkId): void
    {
        $this->linkId = $linkId;
    }




    /**
     * Serializes an instance of `EntryTypeDataLink` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EntryTypeDataLink $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EntryTypeDataLink $data): void {
        if ($data->getLinkId() == null)
        {
            throw new SerializationError('linkId must be provided.');
        }
        $writer->addShort($data->getLinkId());


    }

    /**
     * Deserializes an instance of `EntryTypeDataLink` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EntryTypeDataLink The deserialized data.
     */
    public static function deserialize(EoReader $reader): EntryTypeDataLink
    {
        $data = new EntryTypeDataLink();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setLinkId($reader->getShort());

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
        return "EntryTypeDataLink(byteSize=$this->byteSize, linkId=".var_export($this->linkId, true).")";
    }

}




