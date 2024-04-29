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


class ShopSoldItem
{
    private $byteSize = 0;
    private int $amount;
    private int $id;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * Serializes an instance of `ShopSoldItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopSoldItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopSoldItem $data): void {
        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addInt($data->amount);

        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);


    }

    /**
     * Deserializes an instance of `ShopSoldItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopSoldItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopSoldItem
    {
        $data = new ShopSoldItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->amount = $reader->getInt();
            $data->id = $reader->getShort();

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
        return "ShopSoldItem(byteSize=' . $this->byteSize . '', amount=' . $this->amount . '', id=' . $this->id . ')";
    }

}


