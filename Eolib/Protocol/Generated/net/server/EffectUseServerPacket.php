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
use Eolib\Protocol\Generated\Net\server\MapEffect;
use Eolib\Protocol\SerializationError;

/**
 * Map effect
 */


class EffectUseServerPacket
{
    private $byteSize = 0;
    private int $effect;
    private ?effectData $effectData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getEffect(): int
    {
        return $this->effect;
    }

    public function setEffect(int $effect): void
    {
        $this->effect = $effect;
    }

    public function effectData(): ?effectData
    {
        /**
         * EffectUseServerPacket::EffectData: Gets or sets the data associated with the `effect` field.
         */
        return $this->effectData;
    }

    public function setEffectData($effectData): void
    {
        $this->effectData = $effectData;
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
        return PacketAction::USE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EffectUseServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EffectUseServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectUseServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectUseServerPacket $data): void {
        if ($data->effect === null)
        {
            throw new SerializationError('effect must be provided.');
        }
        $writer->addChar((int) $data->effect);

        if ($data->effect === MapEffect::QUAKE)
        {
            if (!($data->effectData instanceof EffectDataQuake))
            {
                throw new \Eolib\Protocol\SerializationError("Expected effectData to be of type EffectDataQuake for effect " . MapEffect($data->effect)->name . ".");
            }
            EffectDataQuake::serialize($writer, $data->effectData);
        }

    }

    /**
     * Deserializes an instance of `EffectUseServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectUseServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectUseServerPacket
    {
        $data = new EffectUseServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->effect = MapEffect($reader->getChar());
            if ($data->effect === MapEffect::QUAKE)
            {
                $data->effectData = EffectDataQuake::deserialize($reader);
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
        return "EffectUseServerPacket(byteSize=' . $this->byteSize . '', effect=' . $this->effect . '', effectData=' . $this->effectData . ')";
    }

}

/**
 * Data associated with different values of the `effect` field.
 */
interface EffectData {}

/**
 * Data associated with effect value MapEffect::QUAKE
 */

class EffectDataQuake implements EffectData
{
    private $byteSize = 0;
    private int $quakeStrength;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getQuakeStrength(): int
    {
        return $this->quakeStrength;
    }

    public function setQuakeStrength(int $quakeStrength): void
    {
        $this->quakeStrength = $quakeStrength;
    }


    /**
     * Serializes an instance of `EffectDataQuake` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EffectDataQuake $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EffectDataQuake $data): void {
        if ($data->quakeStrength === null)
        {
            throw new SerializationError('quakeStrength must be provided.');
        }
        $writer->addChar($data->quakeStrength);


    }

    /**
     * Deserializes an instance of `EffectDataQuake` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EffectDataQuake The deserialized data.
     */
    public static function deserialize(EoReader $reader): EffectDataQuake
    {
        $data = new EffectDataQuake();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->quakeStrength = $reader->getChar();

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
        return "EffectDataQuake(byteSize=' . $this->byteSize . '', quakeStrength=' . $this->quakeStrength . ')";
    }

}





