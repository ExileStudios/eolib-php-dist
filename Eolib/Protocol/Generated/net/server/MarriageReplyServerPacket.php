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
use Eolib\Protocol\Generated\Net\server\MarriageReply;
use Eolib\Protocol\SerializationError;

/**
 * Reply to client Marriage-family packets
 */


class MarriageReplyServerPacket
{
    private $byteSize = 0;
    private int $replyCode;
    private ?replyCodeData $replyCodeData = null;

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

    public function replyCodeData(): ?replyCodeData
    {
        /**
         * MarriageReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
         */
        return $this->replyCodeData;
    }

    public function setReplyCodeData($replyCodeData): void
    {
        $this->replyCodeData = $replyCodeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MARRIAGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        MarriageReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `MarriageReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param MarriageReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, MarriageReplyServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->replyCode);

        if ($data->replyCode === MarriageReply::SUCCESS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataSuccess))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataSuccess for replyCode " . MarriageReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataSuccess::serialize($writer, $data->replyCodeData);
        }

    }

    /**
     * Deserializes an instance of `MarriageReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return MarriageReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): MarriageReplyServerPacket
    {
        $data = new MarriageReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->replyCode = MarriageReply($reader->getShort());
            if ($data->replyCode === MarriageReply::SUCCESS)
            {
                $data->replyCodeData = ReplyCodeDataSuccess::deserialize($reader);
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
        return "MarriageReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value MarriageReply::SUCCESS
 */

class ReplyCodeDataSuccess implements ReplyCodeData
{
    private $byteSize = 0;
    private int $goldAmount;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    public function setGoldAmount(int $goldAmount): void
    {
        $this->goldAmount = $goldAmount;
    }


    /**
     * Serializes an instance of `ReplyCodeDataSuccess` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataSuccess $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataSuccess $data): void {
        if ($data->goldAmount === null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->goldAmount);


    }

    /**
     * Deserializes an instance of `ReplyCodeDataSuccess` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataSuccess The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataSuccess
    {
        $data = new ReplyCodeDataSuccess();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->goldAmount = $reader->getInt();

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
        return "ReplyCodeDataSuccess(byteSize=' . $this->byteSize . '', goldAmount=' . $this->goldAmount . ')";
    }

}





