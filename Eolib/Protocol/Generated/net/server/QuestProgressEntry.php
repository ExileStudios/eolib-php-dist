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
use Eolib\Protocol\Generated\Net\server\QuestRequirementIcon;
use Eolib\Protocol\SerializationError;


class QuestProgressEntry
{
    private $byteSize = 0;
    private string $name = "";
    private string $description = "";
    private int $icon;
    private int $progress;
    private int $target;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getIcon(): int
    {
        return $this->icon;
    }

    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
    }

    public function getProgress(): int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): void
    {
        $this->progress = $progress;
    }

    public function getTarget(): int
    {
        return $this->target;
    }

    public function setTarget(int $target): void
    {
        $this->target = $target;
    }


    /**
     * Serializes an instance of `QuestProgressEntry` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestProgressEntry $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestProgressEntry $data): void {
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->description === null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->description);

        $writer->addByte(0xFF);
        if ($data->icon === null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addShort((int) $data->icon);

        if ($data->progress === null)
        {
            throw new SerializationError('progress must be provided.');
        }
        $writer->addShort($data->progress);

        if ($data->target === null)
        {
            throw new SerializationError('target must be provided.');
        }
        $writer->addShort($data->target);


    }

    /**
     * Deserializes an instance of `QuestProgressEntry` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestProgressEntry The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestProgressEntry
    {
        $data = new QuestProgressEntry();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->description = $reader->getString();
            $reader->nextChunk();
            $data->icon = QuestRequirementIcon($reader->getShort());
            $data->progress = $reader->getShort();
            $data->target = $reader->getShort();
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
        return "QuestProgressEntry(byteSize=' . $this->byteSize . '', name=' . $this->name . '', description=' . $this->description . '', icon=' . $this->icon . '', progress=' . $this->progress . '', target=' . $this->target . ')";
    }

}


