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
use Eolib\Protocol\Generated\Net\server\GuildReply;
use Eolib\Protocol\SerializationError;

/**
 * Generic guild reply messages
 */


class GuildReplyServerPacket
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
         * GuildReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::GUILD;
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
        GuildReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildReplyServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->replyCode);

        if ($data->replyCode === GuildReply::CREATEADD)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataCreateAdd))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataCreateAdd for replyCode " . GuildReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataCreateAdd::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === GuildReply::CREATEADDCONFIRM)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataCreateAddConfirm))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataCreateAddConfirm for replyCode " . GuildReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataCreateAddConfirm::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === GuildReply::JOINREQUEST)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataJoinRequest))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataJoinRequest for replyCode " . GuildReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataJoinRequest::serialize($writer, $data->replyCodeData);
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
            $data->replyCode = GuildReply($reader->getShort());
            if ($data->replyCode === GuildReply::CREATEADD)
            {
                $data->replyCodeData = ReplyCodeDataCreateAdd::deserialize($reader);
            }
            elseif ($data->replyCode === GuildReply::CREATEADDCONFIRM)
            {
                $data->replyCodeData = ReplyCodeDataCreateAddConfirm::deserialize($reader);
            }
            elseif ($data->replyCode === GuildReply::JOINREQUEST)
            {
                $data->replyCodeData = ReplyCodeDataJoinRequest::deserialize($reader);
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
        return "GuildReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
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
    private $byteSize = 0;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

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
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


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
            $data->name = $reader->getString();

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
        return "ReplyCodeDataCreateAdd(byteSize=' . $this->byteSize . '', name=' . $this->name . ')";
    }

}



/**
 * Data associated with replyCode value GuildReply::CREATEADDCONFIRM
 */

class ReplyCodeDataCreateAddConfirm implements ReplyCodeData
{
    private $byteSize = 0;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

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
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


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
            $data->name = $reader->getString();

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
        return "ReplyCodeDataCreateAddConfirm(byteSize=' . $this->byteSize . '', name=' . $this->name . ')";
    }

}



/**
 * Data associated with replyCode value GuildReply::JOINREQUEST
 */

class ReplyCodeDataJoinRequest implements ReplyCodeData
{
    private $byteSize = 0;
    private int $playerId;
    private string $name = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getName(): string
    {
        return $this->name;
    }

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
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);


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
            $data->playerId = $reader->getShort();
            $data->name = $reader->getString();

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
        return "ReplyCodeDataJoinRequest(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', name=' . $this->name . ')";
    }

}





