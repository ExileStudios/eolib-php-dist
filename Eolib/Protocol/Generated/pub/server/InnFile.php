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
use Eolib\Protocol\Generated\Pub\server\InnRecord;
use Eolib\Protocol\SerializationError;


class InnFile
{
    private $byteSize = 0;
    private array $inns;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getInns(): array
    {
        return $this->inns;
    }

    public function setInns(array $inns): void
    {
        $this->inns = $inns;
    }


    /**
     * Serializes an instance of `InnFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InnFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InnFile $data): void {
        $writer->addFixedString('EID', 3, false);

        if ($data->inns === null)
        {
            throw new SerializationError('inns must be provided.');
        }
        for ($i = 0; $i < count($data->inns); $i++)
        {
            InnRecord::serialize($writer, $data->inns[$i]);

        }

    }

    /**
     * Deserializes an instance of `InnFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InnFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): InnFile
    {
        $data = new InnFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->inns = [];
            while ($reader->remaining() > 0)
            {
                $data->inns[] = InnRecord::deserialize($reader);
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
        return "InnFile(byteSize=' . $this->byteSize . '', inns=' . $this->inns . ')";
    }

}


