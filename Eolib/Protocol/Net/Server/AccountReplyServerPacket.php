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
use Eolib\Protocol\Net\Server\AccountReply;
use Eolib\Protocol\SerializationError;

/**
 * Reply to client Account-family packets
 */


class AccountReplyServerPacket
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
         * AccountReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::ACCOUNT;
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
        AccountReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AccountReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AccountReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AccountReplyServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->getReplyCode());

        if ($data->replyCode === 0)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . $data->replyCode . ".");
            }
        }
        elseif ($data->replyCode === AccountReply::EXISTS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataExists))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataExists for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataExists::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === AccountReply::NOTAPPROVED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataNotApproved))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataNotApproved for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataNotApproved::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === AccountReply::CREATED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataCreated))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataCreated for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataCreated::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === 4)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . $data->replyCode . ".");
            }
        }
        elseif ($data->replyCode === AccountReply::CHANGEFAILED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataChangeFailed))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataChangeFailed for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataChangeFailed::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === AccountReply::CHANGED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataChanged))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataChanged for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataChanged::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === AccountReply::REQUESTDENIED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataRequestDenied))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataRequestDenied for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataRequestDenied::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === 8)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . $data->replyCode . ".");
            }
        }
        elseif ($data->replyCode === 9)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . $data->replyCode . ".");
            }
        }
        else
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataDefault))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataDefault for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataDefault::serialize($writer, $data->getReplyCodeData());
        }

    }

    /**
     * Deserializes an instance of `AccountReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AccountReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AccountReplyServerPacket
    {
        $data = new AccountReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === 0)
            {
                $data->setReplyCodeData(null);
            }
            elseif ($data->replyCode === AccountReply::EXISTS)
            {
                $data->setReplyCodeData(ReplyCodeDataExists::deserialize($reader));
            }
            elseif ($data->replyCode === AccountReply::NOTAPPROVED)
            {
                $data->setReplyCodeData(ReplyCodeDataNotApproved::deserialize($reader));
            }
            elseif ($data->replyCode === AccountReply::CREATED)
            {
                $data->setReplyCodeData(ReplyCodeDataCreated::deserialize($reader));
            }
            elseif ($data->replyCode === 4)
            {
                $data->setReplyCodeData(null);
            }
            elseif ($data->replyCode === AccountReply::CHANGEFAILED)
            {
                $data->setReplyCodeData(ReplyCodeDataChangeFailed::deserialize($reader));
            }
            elseif ($data->replyCode === AccountReply::CHANGED)
            {
                $data->setReplyCodeData(ReplyCodeDataChanged::deserialize($reader));
            }
            elseif ($data->replyCode === AccountReply::REQUESTDENIED)
            {
                $data->setReplyCodeData(ReplyCodeDataRequestDenied::deserialize($reader));
            }
            elseif ($data->replyCode === 8)
            {
                $data->setReplyCodeData(null);
            }
            elseif ($data->replyCode === 9)
            {
                $data->setReplyCodeData(null);
            }
            else
            {
                $data->setReplyCodeData(ReplyCodeDataDefault::deserialize($reader));
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
        return "AccountReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value AccountReply::EXISTS
 */

class ReplyCodeDataExists implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataExists` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataExists $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataExists $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataExists` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataExists The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataExists
    {
        $data = new ReplyCodeDataExists();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataExists(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value AccountReply::NOTAPPROVED
 */

class ReplyCodeDataNotApproved implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataNotApproved` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataNotApproved $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataNotApproved $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataNotApproved` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataNotApproved The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataNotApproved
    {
        $data = new ReplyCodeDataNotApproved();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataNotApproved(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value AccountReply::CREATED
 */

class ReplyCodeDataCreated implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataCreated` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataCreated $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataCreated $data): void {
        $writer->addString('GO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataCreated` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataCreated The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataCreated
    {
        $data = new ReplyCodeDataCreated();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataCreated(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value AccountReply::CHANGEFAILED
 */

class ReplyCodeDataChangeFailed implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataChangeFailed` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataChangeFailed $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataChangeFailed $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataChangeFailed` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataChangeFailed The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataChangeFailed
    {
        $data = new ReplyCodeDataChangeFailed();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataChangeFailed(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value AccountReply::CHANGED
 */

class ReplyCodeDataChanged implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataChanged` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataChanged $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataChanged $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataChanged` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataChanged The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataChanged
    {
        $data = new ReplyCodeDataChanged();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataChanged(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value AccountReply::REQUESTDENIED
 */

class ReplyCodeDataRequestDenied implements ReplyCodeData
{
    private int $byteSize = 0;

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


    /**
     * Serializes an instance of `ReplyCodeDataRequestDenied` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataRequestDenied $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataRequestDenied $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataRequestDenied` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataRequestDenied The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataRequestDenied
    {
        $data = new ReplyCodeDataRequestDenied();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataRequestDenied(byteSize=$this->byteSize)";
    }

}



/**
 * Default data associated with replyCode
 * 
 * 
 * In this case (reply_code &gt; 9), reply_code is a session ID for account creation
 * 
 */

class ReplyCodeDataDefault implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $sequenceStart;

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
    public function getSequenceStart(): int
    {
        return $this->sequenceStart;
    }

    /** @param int $sequenceStart */
    public function setSequenceStart(int $sequenceStart): void
    {
        $this->sequenceStart = $sequenceStart;
    }




    /**
     * Serializes an instance of `ReplyCodeDataDefault` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataDefault $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataDefault $data): void {
        if ($data->getSequenceStart() == null)
        {
            throw new SerializationError('sequenceStart must be provided.');
        }
        $writer->addChar($data->getSequenceStart());

        $writer->addString('OK');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataDefault` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataDefault The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataDefault
    {
        $data = new ReplyCodeDataDefault();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSequenceStart($reader->getChar());
            $reader->getString();

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
        return "ReplyCodeDataDefault(byteSize=$this->byteSize, sequenceStart=".var_export($this->sequenceStart, true).")";
    }

}





