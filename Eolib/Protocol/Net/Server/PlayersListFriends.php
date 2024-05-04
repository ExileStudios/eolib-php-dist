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
use Eolib\Protocol\SerializationError;


class PlayersListFriends
{
    private int $byteSize = 0;
    /** @var int */
    private int $playersCount;
    /** @var string[] */
    public array $players = [];

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

    /** @return string[] */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /** @param string[] $players */
    public function setPlayers(array $players): void
    {
        $this->players = $players;
        $this->playersCount = count($this->players);
    }

    /** @return int */
    public function getPlayersCount(): int
    {
        return $this->playersCount;
    }

    /** @param int $playersCount */
    public function setPlayersCount(int $playersCount): void
    {
        $this->playersCount = $playersCount;
    }


    /**
     * Serializes an instance of `PlayersListFriends` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PlayersListFriends $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PlayersListFriends $data): void {
        if ($data->getPlayersCount() == null)
        {
            throw new SerializationError('playersCount must be provided.');
        }
        $writer->addShort($data->getPlayersCount());

        $writer->addByte(0xFF);
        if ($data->getPlayers() == null)
        {
            throw new SerializationError('players must be provided.');
        }
        if (count($data->players) > 64008)
        {
            throw new SerializationError("Expected length of players to be 64008 or less, got " . count($data->players) . ".");
        }
        for ($i = 0; $i < $data->getPlayersCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getPlayers()[$i]);

        }

    }

    /**
     * Deserializes an instance of `PlayersListFriends` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PlayersListFriends The deserialized data.
     */
    public static function deserialize(EoReader $reader): PlayersListFriends
    {
        $data = new PlayersListFriends();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPlayersCount($reader->getShort());
            $reader->nextChunk();
            $data->players = [];
            for ($i = 0; $i < $data->getPlayersCount(); $i++)
            {
                $data->players[] = $reader->getString();
                if ($i + 1 < $data->getPlayersCount())
                {
                    $reader->nextChunk();
                }
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
        return "PlayersListFriends(byteSize=$this->byteSize, players=".var_export($this->players, true).")";
    }

}


