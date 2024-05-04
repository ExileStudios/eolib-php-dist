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
use Eolib\Protocol\Emote;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Doing an emote
 */


class EmoteReportClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $emote;

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
    public function getEmote(): int
    {
        return $this->emote;
    }

    /** @param int $emote */
    public function setEmote(int $emote): void
    {
        $this->emote = $emote;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::EMOTE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPORT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        EmoteReportClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `EmoteReportClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param EmoteReportClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, EmoteReportClientPacket $data): void {
        if ($data->getEmote() == null)
        {
            throw new SerializationError('emote must be provided.');
        }
        $writer->addChar((int) $data->getEmote());


    }

    /**
     * Deserializes an instance of `EmoteReportClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return EmoteReportClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): EmoteReportClientPacket
    {
        $data = new EmoteReportClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setEmote($reader->getChar());

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
        return "EmoteReportClientPacket(byteSize=$this->byteSize, emote=".var_export($this->emote, true).")";
    }

}



