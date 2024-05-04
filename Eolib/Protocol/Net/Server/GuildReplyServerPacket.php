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
use Eolib\Protocol\Net\Server\GuildReply;
use Eolib\Protocol\SerializationError;

/**
 * Generic guild reply messages
 */


class GuildReplyServerPacket
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
         * GuildReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::GUILD;
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
        GuildReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildReplyServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->getReplyCode());

        if ($data->replyCode === GuildReply::CREATEADD)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataCreateAdd))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataCreateAdd for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataCreateAdd::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === GuildReply::CREATEADDCONFIRM)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataCreateAddConfirm))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataCreateAddConfirm for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataCreateAddConfirm::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === GuildReply::JOINREQUEST)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataJoinRequest))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataJoinRequest for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataJoinRequest::serialize($writer, $data->getReplyCodeData());
        }

    }

    /**
     * Deserializes an instance of `GuildReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildReplyServerPacket
    {
        $data = new GuildReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === GuildReply::CREATEADD)
            {
                $data->setReplyCodeData(ReplyCodeDataCreateAdd::deserialize($reader));
            }
            elseif ($data->replyCode === GuildReply::CREATEADDCONFIRM)
            {
                $data->setReplyCodeData(ReplyCodeDataCreateAddConfirm::deserialize($reader));
            }
            elseif ($data->replyCode === GuildReply::JOINREQUEST)
            {
                $data->setReplyCodeData(ReplyCodeDataJoinRequest::deserialize($reader));
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
        return "GuildReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value GuildReply::CREATEADD
 */

class ReplyCodeDataCreateAdd implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }




    /**
     * Serializes an instance of `ReplyCodeDataCreateAdd` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataCreateAdd $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataCreateAdd $data): void {
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataCreateAdd` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataCreateAdd The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataCreateAdd
    {
        $data = new ReplyCodeDataCreateAdd();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setName($reader->getString());

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
        return "ReplyCodeDataCreateAdd(byteSize=$this->byteSize, name=$this->name)";
    }

}



/**
 * Data associated with replyCode value GuildReply::CREATEADDCONFIRM
 */

class ReplyCodeDataCreateAddConfirm implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }




    /**
     * Serializes an instance of `ReplyCodeDataCreateAddConfirm` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataCreateAddConfirm $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataCreateAddConfirm $data): void {
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataCreateAddConfirm` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataCreateAddConfirm The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataCreateAddConfirm
    {
        $data = new ReplyCodeDataCreateAddConfirm();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setName($reader->getString());

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
        return "ReplyCodeDataCreateAddConfirm(byteSize=$this->byteSize, name=$this->name)";
    }

}



/**
 * Data associated with replyCode value GuildReply::JOINREQUEST
 */

class ReplyCodeDataJoinRequest implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var string */
    private string $name = "";

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }




    /**
     * Serializes an instance of `ReplyCodeDataJoinRequest` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataJoinRequest $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataJoinRequest $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataJoinRequest` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataJoinRequest The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataJoinRequest
    {
        $data = new ReplyCodeDataJoinRequest();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPlayerId($reader->getShort());
            $data->setName($reader->getString());

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
        return "ReplyCodeDataJoinRequest(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", name=$this->name)";
    }

}





