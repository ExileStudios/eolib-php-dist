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
use Eolib\Protocol\Net\Server\QuestRequirementIcon;
use Eolib\Protocol\SerializationError;


class QuestProgressEntry
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var string */
    private string $description = "";
    /** @var int */
    private int $icon;
    /** @var int */
    private int $progress;
    /** @var int */
    private int $target;

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /** @return string */
    public function getDescription(): string
    {
        return $this->description;
    }

    /** @param string $description */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



    /** @return int */
    public function getIcon(): int
    {
        return $this->icon;
    }

    /** @param int $icon */
    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
    }



    /** @return int */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /** @param int $progress */
    public function setProgress(int $progress): void
    {
        $this->progress = $progress;
    }



    /** @return int */
    public function getTarget(): int
    {
        return $this->target;
    }

    /** @param int $target */
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
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getDescription() == null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->getDescription());

        $writer->addByte(0xFF);
        if ($data->getIcon() == null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addShort((int) $data->getIcon());

        if ($data->getProgress() == null)
        {
            throw new SerializationError('progress must be provided.');
        }
        $writer->addShort($data->getProgress());

        if ($data->getTarget() == null)
        {
            throw new SerializationError('target must be provided.');
        }
        $writer->addShort($data->getTarget());


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
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setDescription($reader->getString());
            $reader->nextChunk();
            $data->setIcon($reader->getShort());
            $data->setProgress($reader->getShort());
            $data->setTarget($reader->getShort());
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
        return "QuestProgressEntry(byteSize=$this->byteSize, name=$this->name, description=$this->description, icon=".var_export($this->icon, true).", progress=".var_export($this->progress, true).", target=".var_export($this->target, true).")";
    }

}


