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
use Eolib\Protocol\Generated\Pub\server\TalkRecord;
use Eolib\Protocol\SerializationError;


class TalkFile
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
     * Serializes an instance of `TalkFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param TalkFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, TalkFile $data): void {
        $writer->addFixedString('ETF', 3, false);

        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            TalkRecord::serialize($writer, $data->npcs[$i]);

        }

    }

    /**
     * Deserializes an instance of `TalkFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return TalkFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): TalkFile
    {
        $data = new TalkFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->npcs = [];
            while ($reader->remaining() > 0)
            {
                $data->npcs[] = TalkRecord::deserialize($reader);
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
        return "TalkFile(byteSize=' . $this->byteSize . '', npcs=' . $this->npcs . ')";
    }

}


