<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Requesting info about nearby players
 */


class PlayerRangeRequestClientPacket
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $playerIds = [];

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

    /** @return int[] */
    public function getPlayerIds(): array
    {
        return $this->playerIds;
    }

    /** @param int[] $playerIds */
    public function setPlayerIds(array $playerIds): void
    {
        $this->playerIds = $playerIds;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PLAYERRANGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PlayerRangeRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PlayerRangeRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PlayerRangeRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PlayerRangeRequestClientPacket $data): void {
        if ($data->getPlayerIds() == null)
        {
            throw new SerializationError('playerIds must be provided.');
        }
        for ($i = 0; $i < count($data->playerIds); $i++)
        {
            $writer->addShort($data->getPlayerIds()[$i]);

        }

    }

    /**
     * Deserializes an instance of `PlayerRangeRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PlayerRangeRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PlayerRangeRequestClientPacket
    {
        $data = new PlayerRangeRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $playerIds_length = (int) $reader->getRemaining() / 2;
            $data->playerIds = [];
            for ($i = 0; $i < $playerIds_length; $i++)
            {
                $data->playerIds[] = $reader->getShort();
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
        return "PlayerRangeRequestClientPacket(byteSize=$this->byteSize, playerIds=".var_export($this->playerIds, true).")";
    }

}



