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
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class ItemMapInfo
{
    private int $byteSize = 0;
    /** @var int */
    private int $uid;
    /** @var int */
    private int $id;
    /** @var Coords */
    private Coords $coords;
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

    /** @return int */
    public function getUid(): int
    {
        return $this->uid;
    }

    /** @param int $uid */
    public function setUid(int $uid): void
    {
        $this->uid = $uid;
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
     * Serializes an instance of `ItemMapInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemMapInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemMapInfo $data): void {
        if ($data->getUid() == null)
        {
            throw new SerializationError('uid must be provided.');
        }
        $writer->addShort($data->getUid());

        if ($data->getId() == null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->getId());

        if ($data->getCoords() == null)
        {
            throw new SerializationError('coords must be provided.');
        }
        Coords::serialize($writer, $data->getCoords());

        if ($data->getAmount() == null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addThree($data->getAmount());


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
            $data->setUid($reader->getShort());
            $data->setId($reader->getShort());
            $data->setCoords(Coords::deserialize($reader));
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
        return "ItemMapInfo(byteSize=$this->byteSize, uid=".var_export($this->uid, true).", id=".var_export($this->id, true).", coords=".var_export($this->coords, true).", amount=".var_export($this->amount, true).")";
    }

}


