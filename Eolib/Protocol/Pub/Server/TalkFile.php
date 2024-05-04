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
use Eolib\Protocol\Pub\Server\TalkRecord;
use Eolib\Protocol\SerializationError;


class TalkFile
{
    private int $byteSize = 0;
    /** @var TalkRecord[] */
    public array $npcs = [];

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

    /** @return TalkRecord[] */
    public function getNpcs(): array
    {
        return $this->npcs;
    }

    /** @param TalkRecord[] $npcs */
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

        if ($data->getNpcs() == null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            TalkRecord::serialize($writer, $data->getNpcs()[$i]);

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
            while ($reader->getRemaining() > 0)
            {
                $data->npcs[] = TalkRecord::deserialize($reader);
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
        return "TalkFile(byteSize=$this->byteSize, npcs=".var_export($this->npcs, true).")";
    }

}


