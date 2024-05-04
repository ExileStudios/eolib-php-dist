<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Pub\Server\DropRecord;
use Eolib\Protocol\SerializationError;


class DropNpcRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcId;
    /** @var int */
    private int $dropsCount;
    /** @var DropRecord[] */
    public array $drops = [];

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
    public function getNpcId(): int
    {
        return $this->npcId;
    }

    /** @param int $npcId */
    public function setNpcId(int $npcId): void
    {
        $this->npcId = $npcId;
    }



    /** @return DropRecord[] */
    public function getDrops(): array
    {
        return $this->drops;
    }

    /** @param DropRecord[] $drops */
    public function setDrops(array $drops): void
    {
        $this->drops = $drops;
        $this->dropsCount = count($this->drops);
    }

    /** @return int */
    public function getDropsCount(): int
    {
        return $this->dropsCount;
    }

    /** @param int $dropsCount */
    public function setDropsCount(int $dropsCount): void
    {
        $this->dropsCount = $dropsCount;
    }


    /**
     * Serializes an instance of `DropNpcRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DropNpcRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DropNpcRecord $data): void {
        if ($data->getNpcId() == null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->getNpcId());

        if ($data->getDropsCount() == null)
        {
            throw new SerializationError('dropsCount must be provided.');
        }
        $writer->addShort($data->getDropsCount());

        if ($data->getDrops() == null)
        {
            throw new SerializationError('drops must be provided.');
        }
        if (count($data->drops) > 64008)
        {
            throw new SerializationError("Expected length of drops to be 64008 or less, got " . count($data->drops) . ".");
        }
        for ($i = 0; $i < $data->getDropsCount(); $i++)
        {
            DropRecord::serialize($writer, $data->getDrops()[$i]);

        }

    }

    /**
     * Deserializes an instance of `DropNpcRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DropNpcRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): DropNpcRecord
    {
        $data = new DropNpcRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcId($reader->getShort());
            $data->setDropsCount($reader->getShort());
            $data->drops = [];
            for ($i = 0; $i < $data->getDropsCount(); $i++)
            {
                $data->drops[] = DropRecord::deserialize($reader);
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
        return "DropNpcRecord(byteSize=$this->byteSize, npcId=".var_export($this->npcId, true).", drops=".var_export($this->drops, true).")";
    }

}


