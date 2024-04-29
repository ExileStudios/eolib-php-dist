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
use Eolib\Protocol\SerializationError;

/**
 * Nearby player doing an effect
 */


class EffectPlayerServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $effectId;

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

    public function getEffectId(): int
    {
        return $this->effectId;
    }

    public function setEffectId(int $effectId): void
    {
        $this->effectId = $effectId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::EFFECT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EffectPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectPlayerServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->effectId === null)
        {
            throw new SerializationError('effectId must be provided.');
        }
        $writer->addThree($data->effectId);


    }

    /**
     * Deserializes an instance of `EffectPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectPlayerServerPacket
    {
        $data = new EffectPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->effectId = $reader->getThree();

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
        return "EffectPlayerServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', effectId=' . $this->effectId . ')";
    }

}



