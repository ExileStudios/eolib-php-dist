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


class ShopTradeItem
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $buyPrice;
    /** @var int */
    private int $sellPrice;
    /** @var int */
    private int $maxBuyAmount;

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
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /** @param int $itemId */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }



    /** @return int */
    public function getBuyPrice(): int
    {
        return $this->buyPrice;
    }

    /** @param int $buyPrice */
    public function setBuyPrice(int $buyPrice): void
    {
        $this->buyPrice = $buyPrice;
    }



    /** @return int */
    public function getSellPrice(): int
    {
        return $this->sellPrice;
    }

    /** @param int $sellPrice */
    public function setSellPrice(int $sellPrice): void
    {
        $this->sellPrice = $sellPrice;
    }



    /** @return int */
    public function getMaxBuyAmount(): int
    {
        return $this->maxBuyAmount;
    }

    /** @param int $maxBuyAmount */
    public function setMaxBuyAmount(int $maxBuyAmount): void
    {
        $this->maxBuyAmount = $maxBuyAmount;
    }




    /**
     * Serializes an instance of `ShopTradeItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopTradeItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopTradeItem $data): void {
        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getBuyPrice() == null)
        {
            throw new SerializationError('buyPrice must be provided.');
        }
        $writer->addThree($data->getBuyPrice());

        if ($data->getSellPrice() == null)
        {
            throw new SerializationError('sellPrice must be provided.');
        }
        $writer->addThree($data->getSellPrice());

        if ($data->getMaxBuyAmount() == null)
        {
            throw new SerializationError('maxBuyAmount must be provided.');
        }
        $writer->addChar($data->getMaxBuyAmount());


    }

    /**
     * Deserializes an instance of `ShopTradeItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopTradeItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopTradeItem
    {
        $data = new ShopTradeItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setItemId($reader->getShort());
            $data->setBuyPrice($reader->getThree());
            $data->setSellPrice($reader->getThree());
            $data->setMaxBuyAmount($reader->getChar());

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
        return "ShopTradeItem(byteSize=$this->byteSize, itemId=".var_export($this->itemId, true).", buyPrice=".var_export($this->buyPrice, true).", sellPrice=".var_export($this->sellPrice, true).", maxBuyAmount=".var_export($this->maxBuyAmount, true).")";
    }

}


