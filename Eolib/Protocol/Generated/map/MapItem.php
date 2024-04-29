<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class MapItem
{
    private $byteSize = 0;
    private Coords $coords;
    private int $key;
    private int $chestSlot;
    private int $itemId;
    private int $spawnTime;
    private int $amount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int $key): void
    {
        $this->key = $key;
    }

    public function getChestSlot(): int
    {
        return $this->chestSlot;
    }

    public function setChestSlot(int $chestSlot): void
    {
        $this->chestSlot = $chestSlot;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getSpawnTime(): int
    {
        return $this->spawnTime;
    }

    public function setSpawnTime(int $spawnTime): void
    {
        $this->spawnTime = $spawnTime;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }


    /**
     * Serializes an instance of `MapItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapItem $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->key === null)
        {
            throw new SerializationError('key must be provided.');
        }
        $writer->addShort($data->key);

        if ($data->chestSlot === null)
        {
            throw new SerializationError('chestSlot must be provided.');
        }
        $writer->addChar($data->chestSlot);

        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->spawnTime === null)
        {
            throw new SerializationError('spawnTime must be provided.');
        }
        $writer->addShort($data->spawnTime);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addThree($data->amount);


    }

    /**
     * Deserializes an instance of `MapItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapItem
    {
        $data = new MapItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->coords = Coords::deserialize($reader);
            $data->key = $reader->getShort();
            $data->chestSlot = $reader->getChar();
            $data->itemId = $reader->getShort();
            $data->spawnTime = $reader->getShort();
            $data->amount = $reader->getThree();

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
        return "MapItem(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', key=' . $this->key . '', chestSlot=' . $this->chestSlot . '', itemId=' . $this->itemId . '', spawnTime=' . $this->spawnTime . '', amount=' . $this->amount . ')";
    }

}


