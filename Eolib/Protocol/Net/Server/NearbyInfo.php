<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\Server\CharacterMapInfo;
use Eolib\Protocol\Net\Server\ItemMapInfo;
use Eolib\Protocol\Net\Server\NpcMapInfo;
use Eolib\Protocol\SerializationError;


class NearbyInfo
{
    private int $byteSize = 0;
    /** @var int */
    private int $charactersCount;
    /** @var CharacterMapInfo[] */
    public array $characters = [];
    /** @var NpcMapInfo[] */
    public array $npcs = [];
    /** @var ItemMapInfo[] */
    public array $items = [];

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

    /** @return CharacterMapInfo[] */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /** @param CharacterMapInfo[] $characters */
    public function setCharacters(array $characters): void
    {
        $this->characters = $characters;
        $this->charactersCount = count($this->characters);
    }

    /** @return int */
    public function getCharactersCount(): int
    {
        return $this->charactersCount;
    }

    /** @param int $charactersCount */
    public function setCharactersCount(int $charactersCount): void
    {
        $this->charactersCount = $charactersCount;
    }

    /** @return NpcMapInfo[] */
    public function getNpcs(): array
    {
        return $this->npcs;
    }

    /** @param NpcMapInfo[] $npcs */
    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
    }



    /** @return ItemMapInfo[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param ItemMapInfo[] $items */
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
        if ($data->getCharactersCount() == null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->getCharactersCount());

        $writer->addByte(0xFF);
        if ($data->getCharacters() == null)
        {
            throw new SerializationError('characters must be provided.');
        }
        if (count($data->characters) > 252)
        {
            throw new SerializationError("Expected length of characters to be 252 or less, got " . count($data->characters) . ".");
        }
        for ($i = 0; $i < $data->getCharactersCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            CharacterMapInfo::serialize($writer, $data->getCharacters()[$i]);

        }
        if ($data->getNpcs() == null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        for ($i = 0; $i < count($data->npcs); $i++)
        {
            NpcMapInfo::serialize($writer, $data->getNpcs()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        for ($i = 0; $i < count($data->items); $i++)
        {
            ItemMapInfo::serialize($writer, $data->getItems()[$i]);

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
            $data->setCharactersCount($reader->getChar());
            $reader->setChunkedReadingMode(true);
            $reader->nextChunk();
            $data->characters = [];
            for ($i = 0; $i < $data->getCharactersCount(); $i++)
            {
                $data->characters[] = CharacterMapInfo::deserialize($reader);
                if ($i + 1 < $data->getCharactersCount())
                {
                    $reader->nextChunk();
                }
            }
            $npcs_length = (int) $reader->getRemaining() / 6;
            $data->npcs = [];
            for ($i = 0; $i < $npcs_length; $i++)
            {
                $data->npcs[] = NpcMapInfo::deserialize($reader);
            }
            $reader->nextChunk();
            $items_length = (int) $reader->getRemaining() / 9;
            $data->items = [];
            for ($i = 0; $i < $items_length; $i++)
            {
                $data->items[] = ItemMapInfo::deserialize($reader);
            }
            $reader->setChunkedReadingMode(false);

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
        return "NearbyInfo(byteSize=$this->byteSize, characters=".var_export($this->characters, true).", npcs=".var_export($this->npcs, true).", items=".var_export($this->items, true).")";
    }

}


