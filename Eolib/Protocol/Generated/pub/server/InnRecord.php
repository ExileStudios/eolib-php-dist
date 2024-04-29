<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\server\InnQuestionRecord;
use Eolib\Protocol\SerializationError;


class InnRecord
{
    private $byteSize = 0;
    private int $behaviorId;
    private int $nameLength;
    private string $name = "";
    private int $spawnMap;
    private int $spawnX;
    private int $spawnY;
    private int $sleepMap;
    private int $sleepX;
    private int $sleepY;
    private bool $alternateSpawnEnabled;
    private int $alternateSpawnMap;
    private int $alternateSpawnX;
    private int $alternateSpawnY;
    private array $questions;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->nameLength = strlen($this->name);
    }

    public function getSpawnMap(): int
    {
        return $this->spawnMap;
    }

    public function setSpawnMap(int $spawnMap): void
    {
        $this->spawnMap = $spawnMap;
    }

    public function getSpawnX(): int
    {
        return $this->spawnX;
    }

    public function setSpawnX(int $spawnX): void
    {
        $this->spawnX = $spawnX;
    }

    public function getSpawnY(): int
    {
        return $this->spawnY;
    }

    public function setSpawnY(int $spawnY): void
    {
        $this->spawnY = $spawnY;
    }

    public function getSleepMap(): int
    {
        return $this->sleepMap;
    }

    public function setSleepMap(int $sleepMap): void
    {
        $this->sleepMap = $sleepMap;
    }

    public function getSleepX(): int
    {
        return $this->sleepX;
    }

    public function setSleepX(int $sleepX): void
    {
        $this->sleepX = $sleepX;
    }

    public function getSleepY(): int
    {
        return $this->sleepY;
    }

    public function setSleepY(int $sleepY): void
    {
        $this->sleepY = $sleepY;
    }

    public function getAlternateSpawnEnabled(): bool
    {
        return $this->alternateSpawnEnabled;
    }

    public function setAlternateSpawnEnabled(bool $alternateSpawnEnabled): void
    {
        $this->alternateSpawnEnabled = $alternateSpawnEnabled;
    }

    public function getAlternateSpawnMap(): int
    {
        return $this->alternateSpawnMap;
    }

    public function setAlternateSpawnMap(int $alternateSpawnMap): void
    {
        $this->alternateSpawnMap = $alternateSpawnMap;
    }

    public function getAlternateSpawnX(): int
    {
        return $this->alternateSpawnX;
    }

    public function setAlternateSpawnX(int $alternateSpawnX): void
    {
        $this->alternateSpawnX = $alternateSpawnX;
    }

    public function getAlternateSpawnY(): int
    {
        return $this->alternateSpawnY;
    }

    public function setAlternateSpawnY(int $alternateSpawnY): void
    {
        $this->alternateSpawnY = $alternateSpawnY;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }


    /**
     * Serializes an instance of `InnRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InnRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InnRecord $data): void {
        if ($data->behaviorId === null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->behaviorId);

        if ($data->nameLength === null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->nameLength);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got {strlen($data->name)}.");
        }
        $writer->addFixedString($data->name, $data->nameLength, false);

        if ($data->spawnMap === null)
        {
            throw new SerializationError('spawnMap must be provided.');
        }
        $writer->addShort($data->spawnMap);

        if ($data->spawnX === null)
        {
            throw new SerializationError('spawnX must be provided.');
        }
        $writer->addChar($data->spawnX);

        if ($data->spawnY === null)
        {
            throw new SerializationError('spawnY must be provided.');
        }
        $writer->addChar($data->spawnY);

        if ($data->sleepMap === null)
        {
            throw new SerializationError('sleepMap must be provided.');
        }
        $writer->addShort($data->sleepMap);

        if ($data->sleepX === null)
        {
            throw new SerializationError('sleepX must be provided.');
        }
        $writer->addChar($data->sleepX);

        if ($data->sleepY === null)
        {
            throw new SerializationError('sleepY must be provided.');
        }
        $writer->addChar($data->sleepY);

        if ($data->alternateSpawnEnabled === null)
        {
            throw new SerializationError('alternateSpawnEnabled must be provided.');
        }
        $writer->addChar($data->alternateSpawnEnabled ? 1 : 0);

        if ($data->alternateSpawnMap === null)
        {
            throw new SerializationError('alternateSpawnMap must be provided.');
        }
        $writer->addShort($data->alternateSpawnMap);

        if ($data->alternateSpawnX === null)
        {
            throw new SerializationError('alternateSpawnX must be provided.');
        }
        $writer->addChar($data->alternateSpawnX);

        if ($data->alternateSpawnY === null)
        {
            throw new SerializationError('alternateSpawnY must be provided.');
        }
        $writer->addChar($data->alternateSpawnY);

        if ($data->questions === null)
        {
            throw new SerializationError('questions must be provided.');
        }
        if (strlen($data->questions) != 3)
        {
            throw new SerializationError("Expected length of questions to be exactly 3, got {strlen($data->questions)}.");
        }
        for ($i = 0; $i < 3; $i++)
        {
            InnQuestionRecord::serialize($writer, $data->questions[$i]);

        }

    }

    /**
     * Deserializes an instance of `InnRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InnRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): InnRecord
    {
        $data = new InnRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->behaviorId = $reader->getShort();
            $data->nameLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->spawnMap = $reader->getShort();
            $data->spawnX = $reader->getChar();
            $data->spawnY = $reader->getChar();
            $data->sleepMap = $reader->getShort();
            $data->sleepX = $reader->getChar();
            $data->sleepY = $reader->getChar();
            $data->alternateSpawnEnabled = $reader->getChar() !== 0;
            $data->alternateSpawnMap = $reader->getShort();
            $data->alternateSpawnX = $reader->getChar();
            $data->alternateSpawnY = $reader->getChar();
            $data->questions = [];
            for ($i = 0; $i < 3; $i++)
            {
                $data->questions[] = InnQuestionRecord::deserialize($reader);
            }

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
        return "InnRecord(byteSize=' . $this->byteSize . '', behaviorId=' . $this->behaviorId . '', name=' . $this->name . '', spawnMap=' . $this->spawnMap . '', spawnX=' . $this->spawnX . '', spawnY=' . $this->spawnY . '', sleepMap=' . $this->sleepMap . '', sleepX=' . $this->sleepX . '', sleepY=' . $this->sleepY . '', alternateSpawnEnabled=' . $this->alternateSpawnEnabled . '', alternateSpawnMap=' . $this->alternateSpawnMap . '', alternateSpawnX=' . $this->alternateSpawnX . '', alternateSpawnY=' . $this->alternateSpawnY . '', questions=' . $this->questions . ')";
    }

}


