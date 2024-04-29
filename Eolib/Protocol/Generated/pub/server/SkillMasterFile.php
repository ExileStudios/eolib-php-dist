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
use Eolib\Protocol\Generated\Pub\server\SkillMasterRecord;
use Eolib\Protocol\SerializationError;


class SkillMasterFile
{
    private $byteSize = 0;
    private array $skillMasters;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSkillMasters(): array
    {
        return $this->skillMasters;
    }

    public function setSkillMasters(array $skillMasters): void
    {
        $this->skillMasters = $skillMasters;
    }


    /**
     * Serializes an instance of `SkillMasterFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SkillMasterFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SkillMasterFile $data): void {
        $writer->addFixedString('EMF', 3, false);

        if ($data->skillMasters === null)
        {
            throw new SerializationError('skillMasters must be provided.');
        }
        for ($i = 0; $i < count($data->skillMasters); $i++)
        {
            SkillMasterRecord::serialize($writer, $data->skillMasters[$i]);

        }

    }

    /**
     * Deserializes an instance of `SkillMasterFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SkillMasterFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): SkillMasterFile
    {
        $data = new SkillMasterFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->skillMasters = [];
            while ($reader->remaining() > 0)
            {
                $data->skillMasters[] = SkillMasterRecord::deserialize($reader);
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
        return "SkillMasterFile(byteSize=' . $this->byteSize . '', skillMasters=' . $this->skillMasters . ')";
    }

}


