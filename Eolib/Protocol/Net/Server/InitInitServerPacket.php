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
use Eolib\Protocol\Net\Server\InitBanType;
use Eolib\Protocol\Net\Server\InitReply;
use Eolib\Protocol\Net\Server\MapFile;
use Eolib\Protocol\Net\Server\PlayersList;
use Eolib\Protocol\Net\Server\PlayersListFriends;
use Eolib\Protocol\Net\Server\PubFile;
use Eolib\Protocol\Net\Version;
use Eolib\Protocol\SerializationError;

/**
 * 
 * Reply to connection initialization and requests for unencrypted data.
 * This packet is unencrypted.
 * 
 */


class InitInitServerPacket
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
         * InitInitServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::INIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::INIT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        InitInitServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `InitInitServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InitInitServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InitInitServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addByte((int) $data->getReplyCode());

        if ($data->replyCode === InitReply::OUTOFDATE)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOutOfDate))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOutOfDate for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataOutOfDate::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::BANNED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBanned))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBanned for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataBanned::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::WARPMAP)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWarpMap))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWarpMap for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataWarpMap::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::FILEEMF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEmf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEmf for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFileEmf::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::FILEEIF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEif))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEif for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFileEif::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::FILEENF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEnf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEnf for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFileEnf::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::FILEESF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEsf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEsf for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFileEsf::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::FILEECF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEcf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEcf for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFileEcf::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::MAPMUTATION)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataMapMutation))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataMapMutation for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataMapMutation::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::PLAYERSLIST)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataPlayersList))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataPlayersList for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataPlayersList::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === InitReply::PLAYERSLISTFRIENDS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataPlayersListFriends))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataPlayersListFriends for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataPlayersListFriends::serialize($writer, $data->getReplyCodeData());
        }

    }

    /**
     * Deserializes an instance of `InitInitServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InitInitServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): InitInitServerPacket
    {
        $data = new InitInitServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setReplyCode($reader->getByte());
            if ($data->replyCode === InitReply::OUTOFDATE)
            {
                $data->setReplyCodeData(ReplyCodeDataOutOfDate::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::OK)
            {
                $data->setReplyCodeData(ReplyCodeDataOk::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::BANNED)
            {
                $data->setReplyCodeData(ReplyCodeDataBanned::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::WARPMAP)
            {
                $data->setReplyCodeData(ReplyCodeDataWarpMap::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::FILEEMF)
            {
                $data->setReplyCodeData(ReplyCodeDataFileEmf::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::FILEEIF)
            {
                $data->setReplyCodeData(ReplyCodeDataFileEif::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::FILEENF)
            {
                $data->setReplyCodeData(ReplyCodeDataFileEnf::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::FILEESF)
            {
                $data->setReplyCodeData(ReplyCodeDataFileEsf::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::FILEECF)
            {
                $data->setReplyCodeData(ReplyCodeDataFileEcf::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::MAPMUTATION)
            {
                $data->setReplyCodeData(ReplyCodeDataMapMutation::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::PLAYERSLIST)
            {
                $data->setReplyCodeData(ReplyCodeDataPlayersList::deserialize($reader));
            }
            elseif ($data->replyCode === InitReply::PLAYERSLISTFRIENDS)
            {
                $data->setReplyCodeData(ReplyCodeDataPlayersListFriends::deserialize($reader));
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
        return "InitInitServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value InitReply::OUTOFDATE
 */

class ReplyCodeDataOutOfDate implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var Version */
    private Version $version;

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

    /** @return Version */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /** @param Version $version */
    public function setVersion(Version $version): void
    {
        $this->version = $version;
    }




    /**
     * Serializes an instance of `ReplyCodeDataOutOfDate` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataOutOfDate $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataOutOfDate $data): void {
        if ($data->getVersion() == null)
        {
            throw new SerializationError('version must be provided.');
        }
        Version::serialize($writer, $data->getVersion());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataOutOfDate` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataOutOfDate The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataOutOfDate
    {
        $data = new ReplyCodeDataOutOfDate();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setVersion(Version::deserialize($reader));

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
        return "ReplyCodeDataOutOfDate(byteSize=$this->byteSize, version=".var_export($this->version, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::OK
 */

class ReplyCodeDataOk implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $seq1;
    /** @var int */
    private int $seq2;
    /** @var int */
    private int $serverEncryptionMultiple;
    /** @var int */
    private int $clientEncryptionMultiple;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $challengeResponse;

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
    public function getSeq1(): int
    {
        return $this->seq1;
    }

    /** @param int $seq1 */
    public function setSeq1(int $seq1): void
    {
        $this->seq1 = $seq1;
    }



    /** @return int */
    public function getSeq2(): int
    {
        return $this->seq2;
    }

    /** @param int $seq2 */
    public function setSeq2(int $seq2): void
    {
        $this->seq2 = $seq2;
    }



    /** @return int */
    public function getServerEncryptionMultiple(): int
    {
        return $this->serverEncryptionMultiple;
    }

    /** @param int $serverEncryptionMultiple */
    public function setServerEncryptionMultiple(int $serverEncryptionMultiple): void
    {
        $this->serverEncryptionMultiple = $serverEncryptionMultiple;
    }



    /** @return int */
    public function getClientEncryptionMultiple(): int
    {
        return $this->clientEncryptionMultiple;
    }

    /** @param int $clientEncryptionMultiple */
    public function setClientEncryptionMultiple(int $clientEncryptionMultiple): void
    {
        $this->clientEncryptionMultiple = $clientEncryptionMultiple;
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



    /** @return int */
    public function getChallengeResponse(): int
    {
        return $this->challengeResponse;
    }

    /** @param int $challengeResponse */
    public function setChallengeResponse(int $challengeResponse): void
    {
        $this->challengeResponse = $challengeResponse;
    }




    /**
     * Serializes an instance of `ReplyCodeDataOk` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataOk $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataOk $data): void {
        if ($data->getSeq1() == null)
        {
            throw new SerializationError('seq1 must be provided.');
        }
        $writer->addByte($data->getSeq1());

        if ($data->getSeq2() == null)
        {
            throw new SerializationError('seq2 must be provided.');
        }
        $writer->addByte($data->getSeq2());

        if ($data->getServerEncryptionMultiple() == null)
        {
            throw new SerializationError('serverEncryptionMultiple must be provided.');
        }
        $writer->addByte($data->getServerEncryptionMultiple());

        if ($data->getClientEncryptionMultiple() == null)
        {
            throw new SerializationError('clientEncryptionMultiple must be provided.');
        }
        $writer->addByte($data->getClientEncryptionMultiple());

        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getChallengeResponse() == null)
        {
            throw new SerializationError('challengeResponse must be provided.');
        }
        $writer->addThree($data->getChallengeResponse());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataOk` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataOk The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataOk
    {
        $data = new ReplyCodeDataOk();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setSeq1($reader->getByte());
            $data->setSeq2($reader->getByte());
            $data->setServerEncryptionMultiple($reader->getByte());
            $data->setClientEncryptionMultiple($reader->getByte());
            $data->setPlayerId($reader->getShort());
            $data->setChallengeResponse($reader->getThree());

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
        return "ReplyCodeDataOk(byteSize=$this->byteSize, seq1=".var_export($this->seq1, true).", seq2=".var_export($this->seq2, true).", serverEncryptionMultiple=".var_export($this->serverEncryptionMultiple, true).", clientEncryptionMultiple=".var_export($this->clientEncryptionMultiple, true).", playerId=".var_export($this->playerId, true).", challengeResponse=".var_export($this->challengeResponse, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::BANNED
 */

class ReplyCodeDataBanned implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $banType;
    private ?BanTypeData $banTypeData = null;

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
    public function getBanType(): int
    {
        return $this->banType;
    }

    /** @param int $banType */
    public function setBanType(int $banType): void
    {
        $this->banType = $banType;
    }



    public function getBanTypeData(): ?BanTypeData
    {
        /**
         * ReplyCodeDataBanned::BanTypeData: Gets or sets the data associated with the `banType` field.
         */
        return $this->banTypeData;
    }

    public function setBanTypeData(?BanTypeData $banTypeData): void
    {
        $this->banTypeData = $banTypeData;
    }


    /**
     * Serializes an instance of `ReplyCodeDataBanned` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataBanned $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataBanned $data): void {
        if ($data->getBanType() == null)
        {
            throw new SerializationError('banType must be provided.');
        }
        $writer->addByte((int) $data->getBanType());

        if ($data->banType === 0)
        {
            if (!($data->banTypeData instanceof BanTypeData0))
            {
                throw new \Eolib\Protocol\SerializationError("Expected banTypeData to be of type BanTypeData0 for banType " . $data->banType . ".");
            }
            BanTypeData0::serialize($writer, $data->getBanTypeData());
        }
        elseif ($data->banType === InitBanType::TEMPORARY)
        {
            if (!($data->banTypeData instanceof BanTypeDataTemporary))
            {
                throw new \Eolib\Protocol\SerializationError("Expected banTypeData to be of type BanTypeDataTemporary for banType " . $data->banType . ".");
            }
            BanTypeDataTemporary::serialize($writer, $data->getBanTypeData());
        }

    }

    /**
     * Deserializes an instance of `ReplyCodeDataBanned` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataBanned The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataBanned
    {
        $data = new ReplyCodeDataBanned();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setBanType($reader->getByte());
            if ($data->banType === 0)
            {
                $data->setBanTypeData(BanTypeData0::deserialize($reader));
            }
            elseif ($data->banType === InitBanType::TEMPORARY)
            {
                $data->setBanTypeData(BanTypeDataTemporary::deserialize($reader));
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
        return "ReplyCodeDataBanned(byteSize=$this->byteSize, banType=".var_export($this->banType, true).", banTypeData=".var_export($this->banTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `banType` field.
 */
interface BanTypeData {}

/**
 * Data associated with banType value 0
 * 
 * 
 * The official client treats any value below 2 as a temporary ban.
 * The official server sends 1, but some game server implementations
 * erroneously send 0.
 * 
 */

class BanTypeData0 implements BanTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $minutesRemaining;

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
    public function getMinutesRemaining(): int
    {
        return $this->minutesRemaining;
    }

    /** @param int $minutesRemaining */
    public function setMinutesRemaining(int $minutesRemaining): void
    {
        $this->minutesRemaining = $minutesRemaining;
    }




    /**
     * Serializes an instance of `BanTypeData0` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BanTypeData0 $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BanTypeData0 $data): void {
        if ($data->getMinutesRemaining() == null)
        {
            throw new SerializationError('minutesRemaining must be provided.');
        }
        $writer->addByte($data->getMinutesRemaining());


    }

    /**
     * Deserializes an instance of `BanTypeData0` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BanTypeData0 The deserialized data.
     */
    public static function deserialize(EoReader $reader): BanTypeData0
    {
        $data = new BanTypeData0();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMinutesRemaining($reader->getByte());

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
        return "BanTypeData0(byteSize=$this->byteSize, minutesRemaining=".var_export($this->minutesRemaining, true).")";
    }

}



/**
 * Data associated with banType value InitBanType::TEMPORARY
 */

class BanTypeDataTemporary implements BanTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $minutesRemaining;

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
    public function getMinutesRemaining(): int
    {
        return $this->minutesRemaining;
    }

    /** @param int $minutesRemaining */
    public function setMinutesRemaining(int $minutesRemaining): void
    {
        $this->minutesRemaining = $minutesRemaining;
    }




    /**
     * Serializes an instance of `BanTypeDataTemporary` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BanTypeDataTemporary $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BanTypeDataTemporary $data): void {
        if ($data->getMinutesRemaining() == null)
        {
            throw new SerializationError('minutesRemaining must be provided.');
        }
        $writer->addByte($data->getMinutesRemaining());


    }

    /**
     * Deserializes an instance of `BanTypeDataTemporary` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BanTypeDataTemporary The deserialized data.
     */
    public static function deserialize(EoReader $reader): BanTypeDataTemporary
    {
        $data = new BanTypeDataTemporary();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMinutesRemaining($reader->getByte());

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
        return "BanTypeDataTemporary(byteSize=$this->byteSize, minutesRemaining=".var_export($this->minutesRemaining, true).")";
    }

}





/**
 * Data associated with replyCode value InitReply::WARPMAP
 */

class ReplyCodeDataWarpMap implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var MapFile */
    private MapFile $mapFile;

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

    /** @return MapFile */
    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

    /** @param MapFile $mapFile */
    public function setMapFile(MapFile $mapFile): void
    {
        $this->mapFile = $mapFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataWarpMap` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataWarpMap $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataWarpMap $data): void {
        if ($data->getMapFile() == null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->getMapFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataWarpMap` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataWarpMap The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataWarpMap
    {
        $data = new ReplyCodeDataWarpMap();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapFile(MapFile::deserialize($reader));

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
        return "ReplyCodeDataWarpMap(byteSize=$this->byteSize, mapFile=".var_export($this->mapFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEEMF
 */

class ReplyCodeDataFileEmf implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var MapFile */
    private MapFile $mapFile;

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

    /** @return MapFile */
    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

    /** @param MapFile $mapFile */
    public function setMapFile(MapFile $mapFile): void
    {
        $this->mapFile = $mapFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataFileEmf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFileEmf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFileEmf $data): void {
        if ($data->getMapFile() == null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->getMapFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFileEmf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFileEmf The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFileEmf
    {
        $data = new ReplyCodeDataFileEmf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapFile(MapFile::deserialize($reader));

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
        return "ReplyCodeDataFileEmf(byteSize=$this->byteSize, mapFile=".var_export($this->mapFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEEIF
 */

class ReplyCodeDataFileEif implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PubFile */
    private PubFile $pubFile;

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

    /** @return PubFile */
    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    /** @param PubFile $pubFile */
    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataFileEif` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFileEif $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFileEif $data): void {
        if ($data->getPubFile() == null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->getPubFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFileEif` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFileEif The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFileEif
    {
        $data = new ReplyCodeDataFileEif();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPubFile(PubFile::deserialize($reader));

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
        return "ReplyCodeDataFileEif(byteSize=$this->byteSize, pubFile=".var_export($this->pubFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEENF
 */

class ReplyCodeDataFileEnf implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PubFile */
    private PubFile $pubFile;

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

    /** @return PubFile */
    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    /** @param PubFile $pubFile */
    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataFileEnf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFileEnf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFileEnf $data): void {
        if ($data->getPubFile() == null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->getPubFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFileEnf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFileEnf The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFileEnf
    {
        $data = new ReplyCodeDataFileEnf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPubFile(PubFile::deserialize($reader));

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
        return "ReplyCodeDataFileEnf(byteSize=$this->byteSize, pubFile=".var_export($this->pubFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEESF
 */

class ReplyCodeDataFileEsf implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PubFile */
    private PubFile $pubFile;

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

    /** @return PubFile */
    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    /** @param PubFile $pubFile */
    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataFileEsf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFileEsf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFileEsf $data): void {
        if ($data->getPubFile() == null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->getPubFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFileEsf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFileEsf The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFileEsf
    {
        $data = new ReplyCodeDataFileEsf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPubFile(PubFile::deserialize($reader));

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
        return "ReplyCodeDataFileEsf(byteSize=$this->byteSize, pubFile=".var_export($this->pubFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEECF
 */

class ReplyCodeDataFileEcf implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PubFile */
    private PubFile $pubFile;

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

    /** @return PubFile */
    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

    /** @param PubFile $pubFile */
    public function setPubFile(PubFile $pubFile): void
    {
        $this->pubFile = $pubFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataFileEcf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFileEcf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFileEcf $data): void {
        if ($data->getPubFile() == null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->getPubFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFileEcf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFileEcf The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFileEcf
    {
        $data = new ReplyCodeDataFileEcf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPubFile(PubFile::deserialize($reader));

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
        return "ReplyCodeDataFileEcf(byteSize=$this->byteSize, pubFile=".var_export($this->pubFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::MAPMUTATION
 */

class ReplyCodeDataMapMutation implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var MapFile */
    private MapFile $mapFile;

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

    /** @return MapFile */
    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

    /** @param MapFile $mapFile */
    public function setMapFile(MapFile $mapFile): void
    {
        $this->mapFile = $mapFile;
    }




    /**
     * Serializes an instance of `ReplyCodeDataMapMutation` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataMapMutation $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataMapMutation $data): void {
        if ($data->getMapFile() == null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->getMapFile());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataMapMutation` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataMapMutation The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataMapMutation
    {
        $data = new ReplyCodeDataMapMutation();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setMapFile(MapFile::deserialize($reader));

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
        return "ReplyCodeDataMapMutation(byteSize=$this->byteSize, mapFile=".var_export($this->mapFile, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::PLAYERSLIST
 */

class ReplyCodeDataPlayersList implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PlayersList */
    private PlayersList $playersList;

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

    /** @return PlayersList */
    public function getPlayersList(): PlayersList
    {
        return $this->playersList;
    }

    /** @param PlayersList $playersList */
    public function setPlayersList(PlayersList $playersList): void
    {
        $this->playersList = $playersList;
    }




    /**
     * Serializes an instance of `ReplyCodeDataPlayersList` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataPlayersList $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataPlayersList $data): void {
        if ($data->getPlayersList() == null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersList::serialize($writer, $data->getPlayersList());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataPlayersList` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataPlayersList The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataPlayersList
    {
        $data = new ReplyCodeDataPlayersList();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPlayersList(PlayersList::deserialize($reader));
            $reader->setChunkedReadingMode(false);

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
        return "ReplyCodeDataPlayersList(byteSize=$this->byteSize, playersList=".var_export($this->playersList, true).")";
    }

}



/**
 * Data associated with replyCode value InitReply::PLAYERSLISTFRIENDS
 */

class ReplyCodeDataPlayersListFriends implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var PlayersListFriends */
    private PlayersListFriends $playersList;

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

    /** @return PlayersListFriends */
    public function getPlayersList(): PlayersListFriends
    {
        return $this->playersList;
    }

    /** @param PlayersListFriends $playersList */
    public function setPlayersList(PlayersListFriends $playersList): void
    {
        $this->playersList = $playersList;
    }




    /**
     * Serializes an instance of `ReplyCodeDataPlayersListFriends` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataPlayersListFriends $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataPlayersListFriends $data): void {
        if ($data->getPlayersList() == null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersListFriends::serialize($writer, $data->getPlayersList());


    }

    /**
     * Deserializes an instance of `ReplyCodeDataPlayersListFriends` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataPlayersListFriends The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataPlayersListFriends
    {
        $data = new ReplyCodeDataPlayersListFriends();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPlayersList(PlayersListFriends::deserialize($reader));
            $reader->setChunkedReadingMode(false);

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
        return "ReplyCodeDataPlayersListFriends(byteSize=$this->byteSize, playersList=".var_export($this->playersList, true).")";
    }

}





