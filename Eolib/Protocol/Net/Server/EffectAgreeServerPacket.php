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
use Eolib\Protocol\Net\Server\TileEffect;
use Eolib\Protocol\SerializationError;

/**
 * Effects playing on nearby tiles
 */


class EffectAgreeServerPacket
{
    private int $byteSize = 0;
    /** @var TileEffect[] */
    public array $effects = [];

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

    /** @return TileEffect[] */
    public function getEffects(): array
    {
        return $this->effects;
    }

    /** @param TileEffect[] $effects */
    public function setEffects(array $effects): void
    {
        $this->effects = $effects;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::EFFECT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EffectAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectAgreeServerPacket $data): void {
        if ($data->getEffects() == null)
        {
            throw new SerializationError('effects must be provided.');
        }
        for ($i = 0; $i < count($data->effects); $i++)
        {
            TileEffect::serialize($writer, $data->getEffects()[$i]);

        }

    }

    /**
     * Deserializes an instance of `EffectAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectAgreeServerPacket
    {
        $data = new EffectAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $effects_length = (int) $reader->getRemaining() / 4;
            $data->effects = [];
            for ($i = 0; $i < $effects_length; $i++)
            {
                $data->effects[] = TileEffect::deserialize($reader);
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
        return "EffectAgreeServerPacket(byteSize=$this->byteSize, effects=".var_export($this->effects, true).")";
    }

}



