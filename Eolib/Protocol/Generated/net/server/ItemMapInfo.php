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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class ItemMapInfo
{
    private $byteSize = 0;
    private int $uid;
    private int $id;
    private Coords $coords;
    private int $amount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public function setUid(int $uid): void
    {
        $this->uid = $uid;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCoords(): Coords
    {
        return $this->coords;
    }

    public function setCoords(Coords $coords): void
    {
        $this->coords = $coords;
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
     * Serializes an instance of `ItemMapInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemMapInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemMapInfo $data): void {
        if ($data->uid === null)
        {
            throw new SerializationError('uid must be provided.');
        }
        $writer->addShort($data->uid);

        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->coords === null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->coords);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addThree($data->amount);


    }

    /**
     * Deserializes an instance of `ItemMapInfo` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemMapInfo The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemMapInfo
    {
        $data = new ItemMapInfo();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->uid = $reader->getShort();
            $data->id = $reader->getShort();
            $data->coords = Coords::deserialize($reader);
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
        return "ItemMapInfo(byteSize=' . $this->byteSize . '', uid=' . $this->uid . '', id=' . $this->id . '', coords=' . $this->coords . '', amount=' . $this->amount . ')";
    }

}


