<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\client\SpellTargetType;
use Eolib\Protocol\SerializationError;

/**
 * Targeted spell cast
 */


class SpellTargetOtherClientPacket
{
    private $byteSize = 0;
    private int $targetType;
    private int $previousTimestamp;
    private int $spellId;
    private int $victimId;
    private int $timestamp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getTargetType(): int
    {
        return $this->targetType;
    }

    public function setTargetType(int $targetType): void
    {
        $this->targetType = $targetType;
    }

    public function getPreviousTimestamp(): int
    {
        return $this->previousTimestamp;
    }

    public function setPreviousTimestamp(int $previousTimestamp): void
    {
        $this->previousTimestamp = $previousTimestamp;
    }

    public function getSpellId(): int
    {
        return $this->spellId;
    }

    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }

    public function getVictimId(): int
    {
        return $this->victimId;
    }

    public function setVictimId(int $victimId): void
    {
        $this->victimId = $victimId;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SPELL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::TARGETOTHER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellTargetOtherClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellTargetOtherClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellTargetOtherClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellTargetOtherClientPacket $data): void {
        if ($data->targetType === null)
        {
            throw new SerializationError('targetType must be provided.');
        }
        $writer->addChar((int) $data->targetType);

        if ($data->previousTimestamp === null)
        {
            throw new SerializationError('previousTimestamp must be provided.');
        }
        $writer->addThree($data->previousTimestamp);

        if ($data->spellId === null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->spellId);

        if ($data->victimId === null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->victimId);

        if ($data->timestamp === null)
        {
            throw new SerializationError('timestamp must be provided.');
        }
        $writer->addThree($data->timestamp);


    }

    /**
     * Deserializes an instance of `SpellTargetOtherClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellTargetOtherClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellTargetOtherClientPacket
    {
        $data = new SpellTargetOtherClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->targetType = SpellTargetType($reader->getChar());
            $data->previousTimestamp = $reader->getThree();
            $data->spellId = $reader->getShort();
            $data->victimId = $reader->getShort();
            $data->timestamp = $reader->getThree();

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
        return "SpellTargetOtherClientPacket(byteSize=' . $this->byteSize . '', targetType=' . $this->targetType . '', previousTimestamp=' . $this->previousTimestamp . '', spellId=' . $this->spellId . '', victimId=' . $this->victimId . '', timestamp=' . $this->timestamp . ')";
    }

}



