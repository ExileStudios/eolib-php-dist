<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class MapItem
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $key;
    /** @var int */
    private int $chestSlot;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $spawnTime;
    /** @var int */
    private int $amount;

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

    /** @return Coords */
    public function getCoords(): Coords
    {
        return $this->coords;
    }

    /** @param Coords $coords */
    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
    }



    /** @return int */
    public function getKey(): int
    {
        return $this->key;
    }

    /** @param int $key */
    public function setKey(int $key): void
    {
        $this->key = $key;
    }



    /** @return int */
    public function getChestSlot(): int
    {
        return $this->chestSlot;
    }

    /** @param int $chestSlot */
    public function setChestSlot(int $chestSlot): void
    {
        $this->chestSlot = $chestSlot;
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
    public function getSpawnTime(): int
    {
        return $this->spawnTime;
    }

    /** @param int $spawnTime */
    public function setSpawnTime(int $spawnTime): void
    {
        $this->spawnTime = $spawnTime;
    }



    /** @return int */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /** @param int $amount */
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
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getKey() == null)
        {
            throw new SerializationError('key must be provided.');
        }
        $writer->addShort($data->getKey());

        if ($data->getChestSlot() == null)
        {
            throw new SerializationError('chestSlot must be provided.');
        }
        $writer->addChar($data->getChestSlot());

        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getSpawnTime() == null)
        {
            throw new SerializationError('spawnTime must be provided.');
        }
        $writer->addShort($data->getSpawnTime());

        if ($data->getAmount() == null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addThree($data->getAmount());


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
            $data->setCoords(Coords::deserialize($reader));
            $data->setKey($reader->getShort());
            $data->setChestSlot($reader->getChar());
            $data->setItemId($reader->getShort());
            $data->setSpawnTime($reader->getShort());
            $data->setAmount($reader->getThree());

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
        return "MapItem(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", key=".var_export($this->key, true).", chestSlot=".var_export($this->chestSlot, true).", itemId=".var_export($this->itemId, true).", spawnTime=".var_export($this->spawnTime, true).", amount=".var_export($this->amount, true).")";
    }

}


