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
use Eolib\Protocol\Generated\Pub\server\ShopRecord;
use Eolib\Protocol\SerializationError;


class ShopFile
{
    private $byteSize = 0;
    private array $shops;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getShops(): array
    {
        return $this->shops;
    }

    public function setShops(array $shops): void
    {
        $this->shops = $shops;
    }


    /**
     * Serializes an instance of `ShopFile` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopFile $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopFile $data): void {
        $writer->addFixedString('ESF', 3, false);

        if ($data->shops === null)
        {
            throw new SerializationError('shops must be provided.');
        }
        for ($i = 0; $i < count($data->shops); $i++)
        {
            ShopRecord::serialize($writer, $data->shops[$i]);

        }

    }

    /**
     * Deserializes an instance of `ShopFile` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopFile The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopFile
    {
        $data = new ShopFile();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->shops = [];
            while ($reader->remaining() > 0)
            {
                $data->shops[] = ShopRecord::deserialize($reader);
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
        return "ShopFile(byteSize=' . $this->byteSize . '', shops=' . $this->shops . ')";
    }

}


