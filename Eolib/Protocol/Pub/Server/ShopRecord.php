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
use Eolib\Protocol\Pub\Server\ShopCraftRecord;
use Eolib\Protocol\Pub\Server\ShopTradeRecord;
use Eolib\Protocol\SerializationError;


class ShopRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $behaviorId;
    /** @var int */
    private int $nameLength;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $minLevel;
    /** @var int */
    private int $maxLevel;
    /** @var int */
    private int $classRequirement;
    /** @var int */
    private int $tradesCount;
    /** @var int */
    private int $craftsCount;
    /** @var ShopTradeRecord[] */
    public array $trades = [];
    /** @var ShopCraftRecord[] */
    public array $crafts = [];

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
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /** @param int $minLevel */
    public function setMinLevel(int $minLevel): void
    {
        $this->minLevel = $minLevel;
    }



    /** @return int */
    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    /** @param int $maxLevel */
    public function setMaxLevel(int $maxLevel): void
    {
        $this->maxLevel = $maxLevel;
    }



    /** @return int */
    public function getClassRequirement(): int
    {
        return $this->classRequirement;
    }

    /** @param int $classRequirement */
    public function setClassRequirement(int $classRequirement): void
    {
        $this->classRequirement = $classRequirement;
    }



    /** @return ShopTradeRecord[] */
    public function getTrades(): array
    {
        return $this->trades;
    }

    /** @param ShopTradeRecord[] $trades */
    public function setTrades(array $trades): void
    {
        $this->trades = $trades;
        $this->tradesCount = count($this->trades);
    }

    /** @return int */
    public function getTradesCount(): int
    {
        return $this->tradesCount;
    }

    /** @param int $tradesCount */
    public function setTradesCount(int $tradesCount): void
    {
        $this->tradesCount = $tradesCount;
    }

    /** @return ShopCraftRecord[] */
    public function getCrafts(): array
    {
        return $this->crafts;
    }

    /** @param ShopCraftRecord[] $crafts */
    public function setCrafts(array $crafts): void
    {
        $this->crafts = $crafts;
        $this->craftsCount = count($this->crafts);
    }

    /** @return int */
    public function getCraftsCount(): int
    {
        return $this->craftsCount;
    }

    /** @param int $craftsCount */
    public function setCraftsCount(int $craftsCount): void
    {
        $this->craftsCount = $craftsCount;
    }


    /**
     * Serializes an instance of `ShopRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopRecord $data): void {
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

        if ($data->getMinLevel() == null)
        {
            throw new SerializationError('minLevel must be provided.');
        }
        $writer->addChar($data->getMinLevel());

        if ($data->getMaxLevel() == null)
        {
            throw new SerializationError('maxLevel must be provided.');
        }
        $writer->addChar($data->getMaxLevel());

        if ($data->getClassRequirement() == null)
        {
            throw new SerializationError('classRequirement must be provided.');
        }
        $writer->addChar($data->getClassRequirement());

        if ($data->getTradesCount() == null)
        {
            throw new SerializationError('tradesCount must be provided.');
        }
        $writer->addShort($data->getTradesCount());

        if ($data->getCraftsCount() == null)
        {
            throw new SerializationError('craftsCount must be provided.');
        }
        $writer->addChar($data->getCraftsCount());

        if ($data->getTrades() == null)
        {
            throw new SerializationError('trades must be provided.');
        }
        if (count($data->trades) > 64008)
        {
            throw new SerializationError("Expected length of trades to be 64008 or less, got " . count($data->trades) . ".");
        }
        for ($i = 0; $i < $data->getTradesCount(); $i++)
        {
            ShopTradeRecord::serialize($writer, $data->getTrades()[$i]);

        }
        if ($data->getCrafts() == null)
        {
            throw new SerializationError('crafts must be provided.');
        }
        if (count($data->crafts) > 252)
        {
            throw new SerializationError("Expected length of crafts to be 252 or less, got " . count($data->crafts) . ".");
        }
        for ($i = 0; $i < $data->getCraftsCount(); $i++)
        {
            ShopCraftRecord::serialize($writer, $data->getCrafts()[$i]);

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
            $data->setBehaviorId($reader->getShort());
            $data->setNameLength($reader->getChar());
            $data->setName($reader->getFixedString($data->getNameLength(), false));
            $data->setMinLevel($reader->getChar());
            $data->setMaxLevel($reader->getChar());
            $data->setClassRequirement($reader->getChar());
            $data->setTradesCount($reader->getShort());
            $data->setCraftsCount($reader->getChar());
            $data->trades = [];
            for ($i = 0; $i < $data->getTradesCount(); $i++)
            {
                $data->trades[] = ShopTradeRecord::deserialize($reader);
            }
            $data->crafts = [];
            for ($i = 0; $i < $data->getCraftsCount(); $i++)
            {
                $data->crafts[] = ShopCraftRecord::deserialize($reader);
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
        return "ShopRecord(byteSize=$this->byteSize, behaviorId=".var_export($this->behaviorId, true).", name=".var_export($this->name, true).", minLevel=".var_export($this->minLevel, true).", maxLevel=".var_export($this->maxLevel, true).", classRequirement=".var_export($this->classRequirement, true).", trades=".var_export($this->trades, true).", crafts=".var_export($this->crafts, true).")";
    }

}


