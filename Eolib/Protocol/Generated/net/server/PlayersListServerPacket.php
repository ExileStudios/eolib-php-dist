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
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\server\PlayersList;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.PlayersList
 */


class PlayersListServerPacket
{
    private $byteSize = 0;
    private PlayersList $playersList;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayersList(): PlayersList
    {
        return $this->playersList;
    }

    public function setPlayersList(PlayersList $playersList): void
    {
        $this->playersList = $playersList;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PLAYERS;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::LIST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PlayersListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PlayersListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PlayersListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PlayersListServerPacket $data): void {
        if ($data->playersList === null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersList::serialize($writer, $data->playersList);


    }

    /**
     * Deserializes an instance of `PlayersListServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PlayersListServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PlayersListServerPacket
    {
        $data = new PlayersListServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->playersList = PlayersList::deserialize($reader);
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
        return "PlayersListServerPacket(byteSize=' . $this->byteSize . '', playersList=' . $this->playersList . ')";
    }

}



