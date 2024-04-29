<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class CharItem
{
    private $byteSize = 0;
    private int $id;
    private int $amount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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
     * Serializes an instance of `CharItem` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharItem $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharItem $data): void {
        if ($data->id === null)
        {
            throw new SerializationError('id must be provided.');
        }
        $writer->addShort($data->id);

        if ($data->amount === null)
        {
            throw new SerializationError('amount must be provided.');
        }
        $writer->addChar($data->amount);


    }

    /**
     * Deserializes an instance of `CharItem` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharItem The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharItem
    {
        $data = new CharItem();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->id = $reader->getShort();
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
        return "CharItem(byteSize=' . $this->byteSize . '', id=' . $this->id . '', amount=' . $this->amount . ')";
    }

}


