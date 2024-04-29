<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\server\CharacterMapInfo;
use Eolib\Protocol\Generated\Net\server\ItemMapInfo;
use Eolib\Protocol\Generated\Net\server\NpcMapInfo;
use Eolib\Protocol\SerializationError;


class NearbyInfo
{
    private $byteSize = 0;
    private int $charactersCount;
    private array $characters;
    private array $npcs;
    private array $items;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): void
    {
        $this->characters = $characters;
        $this->charactersCount = strlen($this->characters);
    }

    public function getNpcs(): array
    {
        return $this->npcs;
    }

    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Serializes an instance of `NearbyInfo` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NearbyInfo $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NearbyInfo $data): void {
        if ($data->charactersCount === null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->charactersCount);

        $writer->addByte(0xFF);
        if ($data->characters === null)
        {
            throw new SerializationError('characters must be provided.');
        }
        if (strlen($data->characters) > 252)
        {
            throw new SerializationError("Expected length of characters to be 252 or less, got {strlen($data->characters)}.");
        }
        for ($i = 0; $i < $data->charactersCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            CharacterMapInfo::serialize($writer, $data->characters[$i]);

        }
        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            NpcMapInfo::serialize($writer, $data->npcs[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ItemMapInfo::serialize($writer, $data->items[$i]);

        }

    }

    /**
     * Deserializes an instance of `NearbyInfo` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NearbyInfo The deserialized data.
     */
    public static function deserialize(EoReader $reader): NearbyInfo
    {
        $data = new NearbyInfo();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->charactersCount = $reader->getChar();
            $reader->setChunkedReadingMode(true);
            $reader->nextChunk();
            $data->characters = [];
            for ($i = 0; $i < $data->charactersCount; $i++)
            {
                $data->characters[] = CharacterMapInfo::deserialize($reader);
                if ($i + 1 < $data->charactersCount)
                {
                    $reader->nextChunk();
                }
            }
            $npcs_length = (int) $reader->remaining() / 6;
            $data->npcs = [];
            for ($i = 0; $i < $npcs_length; $i++)
            {
                $data->npcs[] = NpcMapInfo::deserialize($reader);
            }
            $reader->nextChunk();
            $items_length = (int) $reader->remaining() / 9;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ItemMapInfo::deserialize($reader);
            }
            $reader->setChunkedReadingMode(false);

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
        return "NearbyInfo(byteSize=' . $this->byteSize . '', characters=' . $this->characters . '', npcs=' . $this->npcs . '', items=' . $this->items . ')";
    }

}


