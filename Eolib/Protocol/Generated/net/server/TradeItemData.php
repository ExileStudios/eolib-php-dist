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
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\SerializationError;


class TradeItemData
{
    private $byteSize = 0;
    private int $partnerPlayerId;
    private array $partnerItems;
    private int $yourPlayerId;
    private array $yourItems;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPartnerPlayerId(): int
    {
        return $this->partnerPlayerId;
    }

    public function setPartnerPlayerId(int $partnerPlayerId): void
    {
        $this->partnerPlayerId = $partnerPlayerId;
    }

    public function getPartnerItems(): array
    {
        return $this->partnerItems;
    }

    public function setPartnerItems(array $partnerItems): void
    {
        $this->partnerItems = $partnerItems;
    }

    public function getYourPlayerId(): int
    {
        return $this->yourPlayerId;
    }

    public function setYourPlayerId(int $yourPlayerId): void
    {
        $this->yourPlayerId = $yourPlayerId;
    }

    public function getYourItems(): array
    {
        return $this->yourItems;
    }

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
        if ($data->partnerPlayerId === null)
        {
            throw new SerializationError('partnerPlayerId must be provided.');
        }
        $writer->addShort($data->partnerPlayerId);

        if ($data->partnerItems === null)
        {
            throw new SerializationError('partnerItems must be provided.');
        }
        for ($i = 0; $i < count($data->partnerItems); $i++)
        {
            Item::serialize($writer, $data->partnerItems[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->yourPlayerId === null)
        {
            throw new SerializationError('yourPlayerId must be provided.');
        }
        $writer->addShort($data->yourPlayerId);

        if ($data->yourItems === null)
        {
            throw new SerializationError('yourItems must be provided.');
        }
        for ($i = 0; $i < count($data->yourItems); $i++)
        {
            Item::serialize($writer, $data->yourItems[$i]);

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
            $data->partnerPlayerId = $reader->getShort();
            $partnerItems_length = (int) $reader->remaining() / 6;
            $data->partnerItems = [];
            for ($i = 0; $i < $partnerItems_length; $i++)
            {
                $data->partnerItems[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $data->yourPlayerId = $reader->getShort();
            $yourItems_length = (int) $reader->remaining() / 6;
            $data->yourItems = [];
            for ($i = 0; $i < $yourItems_length; $i++)
            {
                $data->yourItems[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
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
        return "TradeItemData(byteSize=' . $this->byteSize . '', partnerPlayerId=' . $this->partnerPlayerId . '', partnerItems=' . $this->partnerItems . '', yourPlayerId=' . $this->yourPlayerId . '', yourItems=' . $this->yourItems . ')";
    }

}


