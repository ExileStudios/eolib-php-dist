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
use Eolib\Protocol\Generated\Pub\server\DropNpcRecord;
use Eolib\Protocol\SerializationError;


class DropFile
{
    private $byteSize = 0;
    private array $npcs;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcs(): array
    {
        return $this->npcs;
    }

    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
    }


    /**
     * Serializes an instance of `DropFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param DropFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, DropFile $data): void {
        $writer->addFixedString('EDF', 3, false);

        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            DropNpcRecord::serialize($writer, $data->npcs[$i]);

        }

    }

    /**
     * Deserializes an instance of `DropFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return DropFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): DropFile
    {
        $data = new DropFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->npcs = [];
            while ($reader->remaining() > 0)
            {
                $data->npcs[] = DropNpcRecord::deserialize($reader);
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
        return "DropFile(byteSize=' . $this->byteSize . '', npcs=' . $this->npcs . ')";
    }

}


