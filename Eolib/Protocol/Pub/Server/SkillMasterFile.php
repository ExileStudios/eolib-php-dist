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
use Eolib\Protocol\Pub\Server\SkillMasterRecord;
use Eolib\Protocol\SerializationError;


class SkillMasterFile
{
    private int $byteSize = 0;
    /** @var SkillMasterRecord[] */
    public array $skillMasters = [];

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

    /** @return SkillMasterRecord[] */
    public function getSkillMasters(): array
    {
        return $this->skillMasters;
    }

    /** @param SkillMasterRecord[] $skillMasters */
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

        if ($data->getSkillMasters() == null)
        {
            throw new SerializationError('skillMasters must be provided.');
        }
        for ($i = 0; $i < count($data->skillMasters); $i++)
        {
            SkillMasterRecord::serialize($writer, $data->getSkillMasters()[$i]);

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
            while ($reader->getRemaining() > 0)
            {
                $data->skillMasters[] = SkillMasterRecord::deserialize($reader);
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
        return "SkillMasterFile(byteSize=$this->byteSize, skillMasters=".var_export($this->skillMasters, true).")";
    }

}


