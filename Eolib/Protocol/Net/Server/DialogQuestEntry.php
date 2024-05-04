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


class DialogQuestEntry
{
    private int $byteSize = 0;
    /** @var int */
    private int $questId;
    /** @var string */
    private string $questName = "";

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
    public function getQuestId(): int
    {
        return $this->questId;
    }

    /** @param int $questId */
    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
    }



    /** @return string */
    public function getQuestName(): string
    {
        return $this->questName;
    }

    /** @param string $questName */
    public function setQuestName(string $questName): void
    {
        $this->questName = $questName;
    }




    /**
     * Serializes an instance of `DialogQuestEntry` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DialogQuestEntry $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DialogQuestEntry $data): void {
        if ($data->getQuestId() == null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->getQuestId());

        if ($data->getQuestName() == null)
        {
            throw new SerializationError('questName must be provided.');
        }
        $writer->addString($data->getQuestName());


    }

    /**
     * Deserializes an instance of `DialogQuestEntry` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DialogQuestEntry The deserialized data.
     */
    public static function deserialize(EoReader $reader): DialogQuestEntry
    {
        $data = new DialogQuestEntry();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setQuestId($reader->getShort());
            $data->setQuestName($reader->getString());

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
        return "DialogQuestEntry(byteSize=$this->byteSize, questId=".var_export($this->questId, true).", questName=$this->questName)";
    }

}


