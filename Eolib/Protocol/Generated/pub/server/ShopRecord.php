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
use Eolib\Protocol\Generated\Pub\server\ShopCraftRecord;
use Eolib\Protocol\Generated\Pub\server\ShopTradeRecord;
use Eolib\Protocol\SerializationError;


class ShopRecord
{
    private $byteSize = 0;
    private int $behaviorId;
    private int $nameLength;
    private string $name = "";
    private int $minLevel;
    private int $maxLevel;
    private int $classRequirement;
    private int $tradesCount;
    private int $craftsCount;
    private array $trades;
    private array $crafts;

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

    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    public function setMinLevel(int $minLevel): void
    {
        $this->minLevel = $minLevel;
    }

    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    public function setMaxLevel(int $maxLevel): void
    {
        $this->maxLevel = $maxLevel;
    }

    public function getClassRequirement(): int
    {
        return $this->classRequirement;
    }

    public function setClassRequirement(int $classRequirement): void
    {
        $this->classRequirement = $classRequirement;
    }

    public function getTrades(): array
    {
        return $this->trades;
    }

    public function setTrades(array $trades): void
    {
        $this->trades = $trades;
        $this->tradesCount = strlen($this->trades);
    }

    public function getCrafts(): array
    {
        return $this->crafts;
    }

    public function setCrafts(array $crafts): void
    {
        $this->crafts = $crafts;
        $this->craftsCount = strlen($this->crafts);
    }


    /**
     * Serializes an instance of `ShopRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopRecord $data): void {
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

        if ($data->minLevel === null)
        {
            throw new SerializationError('minLevel must be provided.');
        }
        $writer->addChar($data->minLevel);

        if ($data->maxLevel === null)
        {
            throw new SerializationError('maxLevel must be provided.');
        }
        $writer->addChar($data->maxLevel);

        if ($data->classRequirement === null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->classRequirement);

        if ($data->tradesCount === null)
        {
            throw new SerializationError('tradesCount must be provided.');
        }
        $writer->addShort($data->tradesCount);

        if ($data->craftsCount === null)
        {
            throw new SerializationError('craftsCount must be provided.');
        }
        $writer->addChar($data->craftsCount);

        if ($data->trades === null)
        {
            throw new SerializationError('trades must be provided.');
        }
        if (strlen($data->trades) > 64008)
        {
            throw new SerializationError("Expected length of trades to be 64008 or less, got {strlen($data->trades)}.");
        }
        for ($i = 0; $i < $data->tradesCount; $i++)
        {
            ShopTradeRecord::serialize($writer, $data->trades[$i]);

        }
        if ($data->crafts === null)
        {
            throw new SerializationError('crafts must be provided.');
        }
        if (strlen($data->crafts) > 252)
        {
            throw new SerializationError("Expected length of crafts to be 252 or less, got {strlen($data->crafts)}.");
        }
        for ($i = 0; $i < $data->craftsCount; $i++)
        {
            ShopCraftRecord::serialize($writer, $data->crafts[$i]);

        }

    }

    /**
     * Deserializes an instance of `ShopRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopRecord
    {
        $data = new ShopRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->behaviorId = $reader->getShort();
            $data->nameLength = $reader->getChar();
            $data->name = $reader->getFixedString($data->nameLength, false);
            $data->minLevel = $reader->getChar();
            $data->maxLevel = $reader->getChar();
            $data->classRequirement = $reader->getChar();
            $data->tradesCount = $reader->getShort();
            $data->craftsCount = $reader->getChar();
            $data->trades = [];
            for ($i = 0; $i < $data->tradesCount; $i++)
            {
                $data->trades[] = ShopTradeRecord::deserialize($reader);
            }
            $data->crafts = [];
            for ($i = 0; $i < $data->craftsCount; $i++)
            {
                $data->crafts[] = ShopCraftRecord::deserialize($reader);
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
        return "ShopRecord(byteSize=' . $this->byteSize . '', behaviorId=' . $this->behaviorId . '', name=' . $this->name . '', minLevel=' . $this->minLevel . '', maxLevel=' . $this->maxLevel . '', classRequirement=' . $this->classRequirement . '', trades=' . $this->trades . '', crafts=' . $this->crafts . ')";
    }

}


