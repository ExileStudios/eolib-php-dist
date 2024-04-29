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
use Eolib\Protocol\Generated\Net\server\InnUnsubscribeReply;
use Eolib\Protocol\SerializationError;

/**
 * Response to giving up citizenship of a town
 */


class CitizenRemoveServerPacket
{
    private $byteSize = 0;
    private int $replyCode;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getReplyCode(): int
    {
        return $this->replyCode;
    }

    public function setReplyCode(int $replyCode): void
    {
        $this->replyCode = $replyCode;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CITIZEN;
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
        CitizenRemoveServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CitizenRemoveServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CitizenRemoveServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CitizenRemoveServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addChar((int) $data->replyCode);


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
            $data->replyCode = InnUnsubscribeReply($reader->getChar());

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
        return "CitizenRemoveServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . ')";
    }

}



