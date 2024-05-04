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
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\SerializationError;


class TradeItemData
{
    private int $byteSize = 0;
    /** @var int */
    private int $partnerPlayerId;
    /** @var Item[] */
    public array $partnerItems = [];
    /** @var int */
    private int $yourPlayerId;
    /** @var Item[] */
    public array $yourItems = [];

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
    public function getPartnerPlayerId(): int
    {
        return $this->partnerPlayerId;
    }

    /** @param int $partnerPlayerId */
    public function setPartnerPlayerId(int $partnerPlayerId): void
    {
        $this->partnerPlayerId = $partnerPlayerId;
    }



    /** @return Item[] */
    public function getPartnerItems(): array
    {
        return $this->partnerItems;
    }

    /** @param Item[] $partnerItems */
    public function setPartnerItems(array $partnerItems): void
    {
        $this->partnerItems = $partnerItems;
    }



    /** @return int */
    public function getYourPlayerId(): int
    {
        return $this->yourPlayerId;
    }

    /** @param int $yourPlayerId */
    public function setYourPlayerId(int $yourPlayerId): void
    {
        $this->yourPlayerId = $yourPlayerId;
    }



    /** @return Item[] */
    public function getYourItems(): array
    {
        return $this->yourItems;
    }

    /** @param Item[] $yourItems */
    public function setYourItems(array $yourItems): void
    {
        $this->yourItems = $yourItems;
    }




    /**
     * Serializes an instance of `TradeItemData` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TradeItemData $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TradeItemData $data): void {
        if ($data->getPartnerPlayerId() == null)
        {
            throw new SerializationError('partnerPlayerId must be provided.');
        }
        $writer->addShort($data->getPartnerPlayerId());

        if ($data->getPartnerItems() == null)
        {
            throw new SerializationError('partnerItems must be provided.');
        }
        for ($i = 0; $i < count($data->partnerItems); $i++)
        {
            Item::serialize($writer, $data->getPartnerItems()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getYourPlayerId() == null)
        {
            throw new SerializationError('yourPlayerId must be provided.');
        }
        $writer->addShort($data->getYourPlayerId());

        if ($data->getYourItems() == null)
        {
            throw new SerializationError('yourItems must be provided.');
        }
        for ($i = 0; $i < count($data->yourItems); $i++)
        {
            Item::serialize($writer, $data->getYourItems()[$i]);

        }
        $writer->addByte(0xFF);

    }

    /**
     * Deserializes an instance of `TradeItemData` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TradeItemData The deserialized data.
     */
    public static function deserialize(EoReader $reader): TradeItemData
    {
        $data = new TradeItemData();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPartnerPlayerId($reader->getShort());
            $partnerItems_length = (int) $reader->getRemaining() / 6;
            $data->partnerItems = [];
            for ($i = 0; $i < $partnerItems_length; $i++)
            {
                $data->partnerItems[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $data->setYourPlayerId($reader->getShort());
            $yourItems_length = (int) $reader->getRemaining() / 6;
            $data->yourItems = [];
            for ($i = 0; $i < $yourItems_length; $i++)
            {
                $data->yourItems[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
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
        return "TradeItemData(byteSize=$this->byteSize, partnerPlayerId=".var_export($this->partnerPlayerId, true).", partnerItems=".var_export($this->partnerItems, true).", yourPlayerId=".var_export($this->yourPlayerId, true).", yourItems=".var_export($this->yourItems, true).")";
    }

}


