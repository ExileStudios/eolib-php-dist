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
use Eolib\Protocol\Generated\Net\server\WarpEffect;
use Eolib\Protocol\SerializationError;
use typing\cast;

/**
 * Nearby player has disappeared from view
 */


class AvatarRemoveServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private ?int $warpEffect;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getWarpEffect(): ?int
    {
        return $this->warpEffect;
    }

    public function setWarpEffect(?int $warpEffect): void
    {
        $this->warpEffect = $warpEffect;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::AVATAR;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REMOVE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AvatarRemoveServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AvatarRemoveServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AvatarRemoveServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AvatarRemoveServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        $reachedMissingOptional = $data->warpEffect === null;
        if (!$reachedMissingOptional)
        {
            $writer->addChar((int) $data->warpEffect);

        }

    }

    /**
     * Deserializes an instance of `AvatarRemoveServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AvatarRemoveServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AvatarRemoveServerPacket
    {
        $data = new AvatarRemoveServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            if ($reader->remaining() > 0)
            {
                $data->warpEffect = WarpEffect($reader->getChar());
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
        return "AvatarRemoveServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', warpEffect=' . $this->warpEffect . ')";
    }

}



