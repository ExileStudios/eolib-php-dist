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
use Eolib\Protocol\Net\Server\MarriageReply;
use Eolib\Protocol\SerializationError;

/**
 * Reply to client Marriage-family packets
 */


class MarriageReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $replyCode;
    private ?ReplyCodeData $replyCodeData = null;

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



    public function getReplyCodeData(): ?ReplyCodeData
    {
        /**
         * MarriageReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
         */
        return $this->replyCodeData;
    }

    public function setReplyCodeData(?ReplyCodeData $replyCodeData): void
    {
        $this->replyCodeData = $replyCodeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::MARRIAGE;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->getReplyCode());

        if ($data->replyCode === MarriageReply::SUCCESS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataSuccess))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataSuccess for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataSuccess::serialize($writer, $data->getReplyCodeData());
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
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === MarriageReply::SUCCESS)
            {
                $data->setReplyCodeData(ReplyCodeDataSuccess::deserialize($reader));
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
        return "MarriageReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
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
    private int $byteSize = 0;
    /** @var int */
    private int $goldAmount;

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
    public function getGoldAmount(): int
    {
        return $this->goldAmount;
    }

    /** @param int $goldAmount */
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
        if ($data->getGoldAmount() == null)
        {
            throw new SerializationError('goldAmount must be provided.');
        }
        $writer->addInt($data->getGoldAmount());


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
            $data->setGoldAmount($reader->getInt());

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
        return "ReplyCodeDataSuccess(byteSize=$this->byteSize, goldAmount=".var_export($this->goldAmount, true).")";
    }

}





