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
use Eolib\Protocol\Net\Server\InnUnsubscribeReply;
use Eolib\Protocol\SerializationError;

/**
 * Response to giving up citizenship of a town
 */


class CitizenRemoveServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $replyCode;

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
    public function getReplyCode(): int
    {
        return $this->replyCode;
    }

    /** @param int $replyCode */
    public function setReplyCode(int $replyCode): void
    {
        $this->replyCode = $replyCode;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CITIZEN;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        CitizenRemoveServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CitizenRemoveServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CitizenRemoveServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CitizenRemoveServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addChar((int) $data->getReplyCode());


    }

    /**
     * Deserializes an instance of `CitizenRemoveServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CitizenRemoveServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CitizenRemoveServerPacket
    {
        $data = new CitizenRemoveServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setReplyCode($reader->getChar());

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
        return "CitizenRemoveServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).")";
    }

}



