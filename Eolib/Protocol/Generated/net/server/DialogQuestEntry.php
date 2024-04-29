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


class DialogQuestEntry
{
    private $byteSize = 0;
    private int $questId;
    private string $questName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getQuestId(): int
    {
        return $this->questId;
    }

    public function setQuestId(int $questId): void
    {
        $this->questId = $questId;
    }

    public function getQuestName(): string
    {
        return $this->questName;
    }

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
        if ($data->questId === null)
        {
            throw new SerializationError('questId must be provided.');
        }
        $writer->addShort($data->questId);

        if ($data->questName === null)
        {
            throw new SerializationError('questName must be provided.');
        }
        $writer->addString($data->questName);


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
            $data->questId = $reader->getShort();
            $data->questName = $reader->getString();

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
        return "DialogQuestEntry(byteSize=' . $this->byteSize . '', questId=' . $this->questId . '', questName=' . $this->questName . ')";
    }

}


