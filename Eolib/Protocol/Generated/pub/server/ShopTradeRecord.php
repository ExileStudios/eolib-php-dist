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
use Eolib\Protocol\SerializationError;


class ShopTradeRecord
{
    private $byteSize = 0;
    private int $itemId;
    private int $buyPrice;
    private int $sellPrice;
    private int $maxAmount;

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

    public function getMaxAmount(): int
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }


    /**
     * Serializes an instance of `ShopTradeRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopTradeRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopTradeRecord $data): void {
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

        if ($data->maxAmount === null)
        {
            throw new SerializationError('maxAmount must be provided.');
        }
        $writer->addChar($data->maxAmount);


    }

    /**
     * Deserializes an instance of `ShopTradeRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopTradeRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopTradeRecord
    {
        $data = new ShopTradeRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemId = $reader->getShort();
            $data->buyPrice = $reader->getThree();
            $data->sellPrice = $reader->getThree();
            $data->maxAmount = $reader->getChar();

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
        return "ShopTradeRecord(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', buyPrice=' . $this->buyPrice . '', sellPrice=' . $this->sellPrice . '', maxAmount=' . $this->maxAmount . ')";
    }

}


