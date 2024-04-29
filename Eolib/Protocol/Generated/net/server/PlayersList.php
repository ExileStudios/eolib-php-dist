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
use Eolib\Protocol\Generated\Net\server\OnlinePlayer;
use Eolib\Protocol\SerializationError;


class PlayersList
{
    private $byteSize = 0;
    private int $playersCount;
    private array $players;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function setPlayers(array $players): void
    {
        $this->players = $players;
        $this->playersCount = strlen($this->players);
    }


    /**
     * Serializes an instance of `PlayersList` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PlayersList $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PlayersList $data): void {
        if ($data->playersCount === null)
        {
            throw new SerializationError('playersCount must be provided.');
        }
        $writer->addShort($data->playersCount);

        $writer->addByte(0xFF);
        if ($data->players === null)
        {
            throw new SerializationError('players must be provided.');
        }
        if (strlen($data->players) > 64008)
        {
            throw new SerializationError("Expected length of players to be 64008 or less, got {strlen($data->players)}.");
        }
        for ($i = 0; $i < $data->playersCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            OnlinePlayer::serialize($writer, $data->players[$i]);

        }

    }

    /**
     * Deserializes an instance of `PlayersList` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PlayersList The deserialized data.
     */
    public static function deserialize(EoReader $reader): PlayersList
    {
        $data = new PlayersList();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->playersCount = $reader->getShort();
            $reader->nextChunk();
            $data->players = [];
            for ($i = 0; $i < $data->playersCount; $i++)
            {
                $data->players[] = OnlinePlayer::deserialize($reader);
                if ($i + 1 < $data->playersCount)
                {
                    $reader->nextChunk();
                }
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
        return "PlayersList(byteSize=' . $this->byteSize . '', players=' . $this->players . ')";
    }

}


