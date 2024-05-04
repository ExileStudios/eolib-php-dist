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
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\Server\PlayersListFriends;
use Eolib\Protocol\SerializationError;

/**
 * Equivalent to INIT_INIT with InitReply.PlayersListFriends
 */


class PlayersReplyServerPacket
{
    private int $byteSize = 0;
    /** @var PlayersListFriends */
    private PlayersListFriends $playersList;

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

    /** @return PlayersListFriends */
    public function getPlayersList(): PlayersListFriends
    {
        return $this->playersList;
    }

    /** @param PlayersListFriends $playersList */
    public function setPlayersList(PlayersListFriends $playersList): void
    {
        $this->playersList = $playersList;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PLAYERS;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PlayersReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PlayersReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PlayersReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PlayersReplyServerPacket $data): void {
        if ($data->getPlayersList() == null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersListFriends::serialize($writer, $data->getPlayersList());


    }

    /**
     * Deserializes an instance of `PlayersReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PlayersReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PlayersReplyServerPacket
    {
        $data = new PlayersReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPlayersList(PlayersListFriends::deserialize($reader));
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
        return "PlayersReplyServerPacket(byteSize=$this->byteSize, playersList=".var_export($this->playersList, true).")";
    }

}



