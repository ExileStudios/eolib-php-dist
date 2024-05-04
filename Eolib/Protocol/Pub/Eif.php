<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\EifRecord;
use Eolib\Protocol\SerializationError;


class Eif
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $rid = [];
    /** @var int */
    private int $totalItemsCount;
    /** @var int */
    private int $version;
    /** @var EifRecord[] */
    public array $items = [];

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

    /** @return int[] */
    public function getRid(): array
    {
        return $this->rid;
    }

    /** @param int[] $rid */
    public function setRid(array $rid): void
    {
        $this->rid = $rid;
    }



    /** @return int */
    public function getTotalItemsCount(): int
    {
        return $this->totalItemsCount;
    }

    /** @param int $totalItemsCount */
    public function setTotalItemsCount(int $totalItemsCount): void
    {
        $this->totalItemsCount = $totalItemsCount;
    }



    /** @return int */
    public function getVersion(): int
    {
        return $this->version;
    }

    /** @param int $version */
    public function setVersion(int $version): void
    {
        $this->version = $version;
    }



    /** @return EifRecord[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param EifRecord[] $items */
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

        if ($data->getRid() == null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (count($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got " . count($data->rid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getRid()[$i]);

        }
        if ($data->getTotalItemsCount() == null)
        {
            throw new SerializationError('totalItemsCount must be provided.');
        }
        $writer->addShort($data->getTotalItemsCount());

        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        $writer->addChar($data->getVersion());

        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            EifRecord::serialize($writer, $data->getItems()[$i]);

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
            $data->setTotalItemsCount($reader->getShort());
            $data->setVersion($reader->getChar());
            $items_length = (int) $reader->getRemaining() / 58;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = EifRecord::deserialize($reader);
            }

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
        return "Eif(byteSize=$this->byteSize, rid=".var_export($this->rid, true).", totalItemsCount=".var_export($this->totalItemsCount, true).", version=".var_export($this->version, true).", items=".var_export($this->items, true).")";
    }

}


