<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\Server\InnQuestionRecord;
use Eolib\Protocol\SerializationError;


class InnRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $nameLength;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $spawnMap;
    /** @var int */
    private int $spawnX;
    /** @var int */
    private int $spawnY;
    /** @var int */
    private int $sleepMap;
    /** @var int */
    private int $sleepX;
    /** @var int */
    private int $sleepY;
    /** @var bool */
    private bool $alternateSpawnEnabled;
    /** @var int */
    private int $alternateSpawnMap;
    /** @var int */
    private int $alternateSpawnX;
    /** @var int */
    private int $alternateSpawnY;
    /** @var InnQuestionRecord[] */
    public array $questions = [];

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
    public function getBehaviorId(): int
    {
        return $this->behaviorId;
    }

    /** @param int $behaviorId */
    public function setBehaviorId(int $behaviorId): void
    {
        $this->behaviorId = $behaviorId;
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
        $this->nameLength = mb_strlen($this->name);
    }

    /** @return int */
    public function getNameLength(): int
    {
        return $this->nameLength;
    }

    /** @param int $nameLength */
    public function setNameLength(int $nameLength): void
    {
        $this->nameLength = $nameLength;
    }

    /** @return int */
    public function getSpawnMap(): int
    {
        return $this->spawnMap;
    }

    /** @param int $spawnMap */
    public function setSpawnMap(int $spawnMap): void
    {
        $this->spawnMap = $spawnMap;
    }



    /** @return int */
    public function getSpawnX(): int
    {
        return $this->spawnX;
    }

    /** @param int $spawnX */
    public function setSpawnX(int $spawnX): void
    {
        $this->spawnX = $spawnX;
    }



    /** @return int */
    public function getSpawnY(): int
    {
        return $this->spawnY;
    }

    /** @param int $spawnY */
    public function setSpawnY(int $spawnY): void
    {
        $this->spawnY = $spawnY;
    }



    /** @return int */
    public function getSleepMap(): int
    {
        return $this->sleepMap;
    }

    /** @param int $sleepMap */
    public function setSleepMap(int $sleepMap): void
    {
        $this->sleepMap = $sleepMap;
    }



    /** @return int */
    public function getSleepX(): int
    {
        return $this->sleepX;
    }

    /** @param int $sleepX */
    public function setSleepX(int $sleepX): void
    {
        $this->sleepX = $sleepX;
    }



    /** @return int */
    public function getSleepY(): int
    {
        return $this->sleepY;
    }

    /** @param int $sleepY */
    public function setSleepY(int $sleepY): void
    {
        $this->sleepY = $sleepY;
    }



    /** @return bool */
    public function getAlternateSpawnEnabled(): bool
    {
        return $this->alternateSpawnEnabled;
    }

    /** @param bool $alternateSpawnEnabled */
    public function setAlternateSpawnEnabled(bool $alternateSpawnEnabled): void
    {
        $this->alternateSpawnEnabled = $alternateSpawnEnabled;
    }



    /** @return int */
    public function getAlternateSpawnMap(): int
    {
        return $this->alternateSpawnMap;
    }

    /** @param int $alternateSpawnMap */
    public function setAlternateSpawnMap(int $alternateSpawnMap): void
    {
        $this->alternateSpawnMap = $alternateSpawnMap;
    }



    /** @return int */
    public function getAlternateSpawnX(): int
    {
        return $this->alternateSpawnX;
    }

    /** @param int $alternateSpawnX */
    public function setAlternateSpawnX(int $alternateSpawnX): void
    {
        $this->alternateSpawnX = $alternateSpawnX;
    }



    /** @return int */
    public function getAlternateSpawnY(): int
    {
        return $this->alternateSpawnY;
    }

    /** @param int $alternateSpawnY */
    public function setAlternateSpawnY(int $alternateSpawnY): void
    {
        $this->alternateSpawnY = $alternateSpawnY;
    }



    /** @return InnQuestionRecord[] */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /** @param InnQuestionRecord[] $questions */
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
        if ($data->getBehaviorId() == null)
        {
            throw new SerializationError('behaviorId must be provided.');
        }
        $writer->addShort($data->getBehaviorId());

        if ($data->getNameLength() == null)
        {
            throw new SerializationError('nameLength must be provided.');
        }
        $writer->addChar($data->getNameLength());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 252)
        {
            throw new SerializationError("Expected length of name to be 252 or less, got " . strlen($data->name) . ".");
        }
        $writer->addFixedString($data->getName(), $data->getNameLength(), false);

        if ($data->getSpawnMap() == null)
        {
            throw new SerializationError('spawnMap must be provided.');
        }
        $writer->addShort($data->getSpawnMap());

        if ($data->getSpawnX() == null)
        {
            throw new SerializationError('spawnX must be provided.');
        }
        $writer->addChar($data->getSpawnX());

        if ($data->getSpawnY() == null)
        {
            throw new SerializationError('spawnY must be provided.');
        }
        $writer->addChar($data->getSpawnY());

        if ($data->getSleepMap() == null)
        {
            throw new SerializationError('sleepMap must be provided.');
        }
        $writer->addShort($data->getSleepMap());

        if ($data->getSleepX() == null)
        {
            throw new SerializationError('sleepX must be provided.');
        }
        $writer->addChar($data->getSleepX());

        if ($data->getSleepY() == null)
        {
            throw new SerializationError('sleepY must be provided.');
        }
        $writer->addChar($data->getSleepY());

        if ($data->getAlternateSpawnEnabled() == null)
        {
            throw new SerializationError('alternateSpawnEnabled must be provided.');
        }
        $writer->addChar((int) $data->getAlternateSpawnEnabled());

        if ($data->getAlternateSpawnMap() == null)
        {
            throw new SerializationError('alternateSpawnMap must be provided.');
        }
        $writer->addShort($data->getAlternateSpawnMap());

        if ($data->getAlternateSpawnX() == null)
        {
            throw new SerializationError('alternateSpawnX must be provided.');
        }
        $writer->addChar($data->getAlternateSpawnX());

        if ($data->getAlternateSpawnY() == null)
        {
            throw new SerializationError('alternateSpawnY must be provided.');
        }
        $writer->addChar($data->getAlternateSpawnY());

        if ($data->getQuestions() == null)
        {
            throw new SerializationError('questions must be provided.');
        }
        if (count($data->questions) != 3)
        {
            throw new SerializationError("Expected length of questions to be exactly 3, got " . count($data->questions) . ".");
        }
        for ($i = 0; $i < 3; $i++)
        {
            InnQuestionRecord::serialize($writer, $data->getQuestions()[$i]);

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
            $data->setBehaviorId($reader->getShort());
            $data->setNameLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setSpawnMap($reader->getShort());
            $data->setSpawnX($reader->getChar());
            $data->setSpawnY($reader->getChar());
            $data->setSleepMap($reader->getShort());
            $data->setSleepX($reader->getChar());
            $data->setSleepY($reader->getChar());
            $data->setAlternateSpawnEnabled($reader->getChar() !== 0);
            $data->setAlternateSpawnMap($reader->getShort());
            $data->setAlternateSpawnX($reader->getChar());
            $data->setAlternateSpawnY($reader->getChar());
            $data->questions = [];
            for ($i = 0; $i < 3; $i++)
            {
                $data->questions[] = InnQuestionRecord::deserialize($reader);
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
        return "InnRecord(byteSize=$this->byteSize, behaviorId=".var_export($this->behaviorId, true).", name=".var_export($this->name, true).", spawnMap=".var_export($this->spawnMap, true).", spawnX=".var_export($this->spawnX, true).", spawnY=".var_export($this->spawnY, true).", sleepMap=".var_export($this->sleepMap, true).", sleepX=".var_export($this->sleepX, true).", sleepY=".var_export($this->sleepY, true).", alternateSpawnEnabled=".var_export($this->alternateSpawnEnabled, true).", alternateSpawnMap=".var_export($this->alternateSpawnMap, true).", alternateSpawnX=".var_export($this->alternateSpawnX, true).", alternateSpawnY=".var_export($this->alternateSpawnY, true).", questions=".var_export($this->questions, true).")";
    }

}


