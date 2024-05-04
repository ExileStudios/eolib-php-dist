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


class MapNpc
{
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $coords;
    /** @var int */
    private int $id;
    /** @var int */
    private int $spawnType;
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
    public function getId(): int
    {
        return $this->id;
    }

    /** @param int $id */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    /** @return int */
    public function getSpawnType(): int
    {
        return $this->spawnType;
    }

    /** @param int $spawnType */
    public function setSpawnType(int $spawnType): void
    {
        $this->spawnType = $spawnType;
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
     * Serializes an instance of `MapNpc` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapNpc $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapNpc $data): void {
        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->getId());

        if ($data->getSpawnType() == null)
        {
            throw new SerializationError('spawnType must be provided.');
        }
        $writer->addChar($data->getSpawnType());

        if ($data->getSpawnTime() == null)
        {
            throw new SerializationError('spawnTime must be provided.');
        }
        $writer->addShort($data->getSpawnTime());

        if ($data->getAmount() == null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addChar($data->getAmount());


    }

    /**
     * Deserializes an instance of `MapNpc` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MapNpc The deserialized data.
     */
    public static function deserialize(EoReader $reader): MapNpc
    {
        $data = new MapNpc();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCoords(Coords::deserialize($reader));
            $data->setId($reader->getShort());
            $data->setSpawnType($reader->getChar());
            $data->setSpawnTime($reader->getShort());
            $data->setAmount($reader->getChar());

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
        return "MapNpc(byteSize=$this->byteSize, coords=".var_export($this->coords, true).", id=".var_export($this->id, true).", spawnType=".var_export($this->spawnType, true).", spawnTime=".var_export($this->spawnTime, true).", amount=".var_export($this->amount, true).")";
    }

}


