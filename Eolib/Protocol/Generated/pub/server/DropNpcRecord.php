<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Pub\server\DropRecord;
use Eolib\Protocol\SerializationError;


class DropNpcRecord
{
    private $byteSize = 0;
    private int $npcId;
    private int $dropsCount;
    private array $drops;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcId(): int
    {
        return $this->npcId;
    }

    public function setNpcId(int $npcId): void
    {
        $this->npcId = $npcId;
    }

    public function getDrops(): array
    {
        return $this->drops;
    }

    public function setDrops(array $drops): void
    {
        $this->drops = $drops;
        $this->dropsCount = strlen($this->drops);
    }


    /**
     * Serializes an instance of `DropNpcRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DropNpcRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DropNpcRecord $data): void {
        if ($data->npcId === null)
        {
            throw new SerializationError('npcId must be provided.');
        }
        $writer->addShort($data->npcId);

        if ($data->dropsCount === null)
        {
            throw new SerializationError('dropsCount must be provided.');
        }
        $writer->addShort($data->dropsCount);

        if ($data->drops === null)
        {
            throw new SerializationError('drops must be provided.');
        }
        if (strlen($data->drops) > 64008)
        {
            throw new SerializationError("Expected length of drops to be 64008 or less, got {strlen($data->drops)}.");
        }
        for ($i = 0; $i < $data->dropsCount; $i++)
        {
            DropRecord::serialize($writer, $data->drops[$i]);

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
            $data->npcId = $reader->getShort();
            $data->dropsCount = $reader->getShort();
            $data->drops = [];
            for ($i = 0; $i < $data->dropsCount; $i++)
            {
                $data->drops[] = DropRecord::deserialize($reader);
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
        return "DropNpcRecord(byteSize=' . $this->byteSize . '', npcId=' . $this->npcId . '', drops=' . $this->drops . ')";
    }

}


