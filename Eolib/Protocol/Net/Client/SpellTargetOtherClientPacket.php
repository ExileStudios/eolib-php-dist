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
use Eolib\Protocol\Net\Client\SpellTargetType;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Targeted spell cast
 */


class SpellTargetOtherClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $targetType;
    /** @var int */
    private int $previousTimestamp;
    /** @var int */
    private int $spellId;
    /** @var int */
    private int $victimId;
    /** @var int */
    private int $timestamp;

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

    /** @return int */
    public function getTargetType(): int
    {
        return $this->targetType;
    }

    /** @param int $targetType */
    public function setTargetType(int $targetType): void
    {
        $this->targetType = $targetType;
    }



    /** @return int */
    public function getPreviousTimestamp(): int
    {
        return $this->previousTimestamp;
    }

    /** @param int $previousTimestamp */
    public function setPreviousTimestamp(int $previousTimestamp): void
    {
        $this->previousTimestamp = $previousTimestamp;
    }



    /** @return int */
    public function getSpellId(): int
    {
        return $this->spellId;
    }

    /** @param int $spellId */
    public function setSpellId(int $spellId): void
    {
        $this->spellId = $spellId;
    }



    /** @return int */
    public function getVictimId(): int
    {
        return $this->victimId;
    }

    /** @param int $victimId */
    public function setVictimId(int $victimId): void
    {
        $this->victimId = $victimId;
    }



    /** @return int */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /** @param int $timestamp */
    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SPELL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getTargetType() == null)
        {
            throw new SerializationError('targetType must be provided.');
        }
        $writer->addChar((int) $data->getTargetType());

        if ($data->getPreviousTimestamp() == null)
        {
            throw new SerializationError('previousTimestamp must be provided.');
        }
        $writer->addThree($data->getPreviousTimestamp());

        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());

        if ($data->getVictimId() == null)
        {
            throw new SerializationError('victimId must be provided.');
        }
        $writer->addShort($data->getVictimId());

        if ($data->getTimestamp() == null)
        {
            throw new SerializationError('timestamp must be provided.');
        }
        $writer->addThree($data->getTimestamp());


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
            $data->setTargetType($reader->getChar());
            $data->setPreviousTimestamp($reader->getThree());
            $data->setSpellId($reader->getShort());
            $data->setVictimId($reader->getShort());
            $data->setTimestamp($reader->getThree());

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
        return "SpellTargetOtherClientPacket(byteSize=$this->byteSize, targetType=".var_export($this->targetType, true).", previousTimestamp=".var_export($this->previousTimestamp, true).", spellId=".var_export($this->spellId, true).", victimId=".var_export($this->victimId, true).", timestamp=".var_export($this->timestamp, true).")";
    }

}



