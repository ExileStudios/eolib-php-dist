<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\EifRecord;
use Eolib\Protocol\SerializationError;


class Eif
{
    private $byteSize = 0;
    private array $rid;
    private int $totalItemsCount;
    private int $version;
    private array $items;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRid(): array
    {
        return $this->rid;
    }

    public function setRid(array $rid): void
    {
        $this->rid = $rid;
    }

    public function getTotalItemsCount(): int
    {
        return $this->totalItemsCount;
    }

    public function setTotalItemsCount(int $totalItemsCount): void
    {
        $this->totalItemsCount = $totalItemsCount;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Serializes an instance of `Eif` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Eif $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Eif $data): void {
        $writer->addFixedString('EIF', 3, false);

        if ($data->rid === null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (strlen($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got {strlen($data->rid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->rid[$i]);

        }
        if ($data->totalItemsCount === null)
        {
            throw new SerializationError('totalItemsCount must be provided.');
        }
        $writer->addShort($data->totalItemsCount);

        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->version);

        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            EifRecord::serialize($writer, $data->items[$i]);

        }

    }

    /**
     * Deserializes an instance of `Eif` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Eif The deserialized data.
     */
    public static function deserialize(EoReader $reader): Eif
    {
        $data = new Eif();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->rid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->rid[] = $reader->getShort();
            }
            $data->totalItemsCount = $reader->getShort();
            $data->version = $reader->getChar();
            $data->items = [];
            while ($reader->remaining() > 0)
            {
                $data->items[] = EifRecord::deserialize($reader);
            }

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
        return "Eif(byteSize=' . $this->byteSize . '', rid=' . $this->rid . '', totalItemsCount=' . $this->totalItemsCount . '', version=' . $this->version . '', items=' . $this->items . ')";
    }

}


