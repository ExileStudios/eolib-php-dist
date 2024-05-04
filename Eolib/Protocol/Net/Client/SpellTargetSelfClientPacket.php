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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Self-targeted spell cast
 */


class SpellTargetSelfClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $direction;
    /** @var int */
    private int $spellId;
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
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
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
        return PacketAction::TARGETSELF;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SpellTargetSelfClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SpellTargetSelfClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SpellTargetSelfClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SpellTargetSelfClientPacket $data): void {
        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

        if ($data->getSpellId() == null)
        {
            throw new SerializationError('spellId must be provided.');
        }
        $writer->addShort($data->getSpellId());

        if ($data->getTimestamp() == null)
        {
            throw new SerializationError('timestamp must be provided.');
        }
        $writer->addThree($data->getTimestamp());


    }

    /**
     * Deserializes an instance of `SpellTargetSelfClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SpellTargetSelfClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SpellTargetSelfClientPacket
    {
        $data = new SpellTargetSelfClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setDirection($reader->getChar());
            $data->setSpellId($reader->getShort());
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
        return "SpellTargetSelfClientPacket(byteSize=$this->byteSize, direction=".var_export($this->direction, true).", spellId=".var_export($this->spellId, true).", timestamp=".var_export($this->timestamp, true).")";
    }

}



