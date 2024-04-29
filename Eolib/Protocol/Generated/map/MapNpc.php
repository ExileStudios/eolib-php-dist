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


class MapNpc
{
    private $byteSize = 0;
    private Coords $coords;
    private int $id;
    private int $spawnType;
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSpawnType(): int
    {
        return $this->spawnType;
    }

    public function setSpawnType(int $spawnType): void
    {
        $this->spawnType = $spawnType;
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
     * Serializes an instance of `MapNpc` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MapNpc $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MapNpc $data): void {
        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->spawnType === null)
        {
            throw new SerializationError('spawnType must be provided.');
        }
        $writer->addChar($data->spawnType);

        if ($data->spawnTime === null)
        {
            throw new SerializationError('spawnTime must be provided.');
        }
        $writer->addShort($data->spawnTime);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addChar($data->amount);


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
            $data->coords = Coords::deserialize($reader);
            $data->id = $reader->getShort();
            $data->spawnType = $reader->getChar();
            $data->spawnTime = $reader->getShort();
            $data->amount = $reader->getChar();

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
        return "MapNpc(byteSize=' . $this->byteSize . '', coords=' . $this->coords . '', id=' . $this->id . '', spawnType=' . $this->spawnType . '', spawnTime=' . $this->spawnTime . '', amount=' . $this->amount . ')";
    }

}


