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


class ShopTradeItem
{
    private $byteSize = 0;
    private int $itemId;
    private int $buyPrice;
    private int $sellPrice;
    private int $maxBuyAmount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getBuyPrice(): int
    {
        return $this->buyPrice;
    }

    public function setBuyPrice(int $buyPrice): void
    {
        $this->buyPrice = $buyPrice;
    }

    public function getSellPrice(): int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(int $sellPrice): void
    {
        $this->sellPrice = $sellPrice;
    }

    public function getMaxBuyAmount(): int
    {
        return $this->maxBuyAmount;
    }

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
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->buyPrice === null)
        {
            throw new SerializationError('buyPrice must be provided.');
        }
        $writer->addThree($data->buyPrice);

        if ($data->sellPrice === null)
        {
            throw new SerializationError('sellPrice must be provided.');
        }
        $writer->addThree($data->sellPrice);

        if ($data->maxBuyAmount === null)
        {
            throw new SerializationError('maxBuyAmount must be provided.');
        }
        $writer->addChar($data->maxBuyAmount);


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
            $data->itemId = $reader->getShort();
            $data->buyPrice = $reader->getThree();
            $data->sellPrice = $reader->getThree();
            $data->maxBuyAmount = $reader->getChar();

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
        return "ShopTradeItem(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', buyPrice=' . $this->buyPrice . '', sellPrice=' . $this->sellPrice . '', maxBuyAmount=' . $this->maxBuyAmount . ')";
    }

}


