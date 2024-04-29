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
use Eolib\Protocol\Generated\Net\Version;
use Eolib\Protocol\Generated\Net\server\InitBanType;
use Eolib\Protocol\Generated\Net\server\InitReply;
use Eolib\Protocol\Generated\Net\server\MapFile;
use Eolib\Protocol\Generated\Net\server\PlayersList;
use Eolib\Protocol\Generated\Net\server\PlayersListFriends;
use Eolib\Protocol\Generated\Net\server\PubFile;
use Eolib\Protocol\SerializationError;

/**
 * 
 * Reply to connection initialization and requests for unencrypted data.
 * This packet is unencrypted.
 * 
 */


class InitInitServerPacket
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
         * InitInitServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::INIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addByte((int) $data->replyCode);

        if ($data->replyCode === InitReply::OUTOFDATE)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOutOfDate))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOutOfDate for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataOutOfDate::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::BANNED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBanned))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBanned for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataBanned::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::WARPMAP)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWarpMap))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWarpMap for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataWarpMap::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::FILEEMF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEmf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEmf for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFileEmf::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::FILEEIF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEif))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEif for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFileEif::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::FILEENF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEnf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEnf for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFileEnf::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::FILEESF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEsf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEsf for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFileEsf::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::FILEECF)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFileEcf))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFileEcf for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFileEcf::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::MAPMUTATION)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataMapMutation))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataMapMutation for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataMapMutation::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::PLAYERSLIST)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataPlayersList))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataPlayersList for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataPlayersList::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === InitReply::PLAYERSLISTFRIENDS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataPlayersListFriends))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataPlayersListFriends for replyCode " . InitReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataPlayersListFriends::serialize($writer, $data->replyCodeData);
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
            $data->replyCode = InitReply($reader->getByte());
            if ($data->replyCode === InitReply::OUTOFDATE)
            {
                $data->replyCodeData = ReplyCodeDataOutOfDate::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::OK)
            {
                $data->replyCodeData = ReplyCodeDataOk::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::BANNED)
            {
                $data->replyCodeData = ReplyCodeDataBanned::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::WARPMAP)
            {
                $data->replyCodeData = ReplyCodeDataWarpMap::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::FILEEMF)
            {
                $data->replyCodeData = ReplyCodeDataFileEmf::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::FILEEIF)
            {
                $data->replyCodeData = ReplyCodeDataFileEif::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::FILEENF)
            {
                $data->replyCodeData = ReplyCodeDataFileEnf::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::FILEESF)
            {
                $data->replyCodeData = ReplyCodeDataFileEsf::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::FILEECF)
            {
                $data->replyCodeData = ReplyCodeDataFileEcf::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::MAPMUTATION)
            {
                $data->replyCodeData = ReplyCodeDataMapMutation::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::PLAYERSLIST)
            {
                $data->replyCodeData = ReplyCodeDataPlayersList::deserialize($reader);
            }
            elseif ($data->replyCode === InitReply::PLAYERSLISTFRIENDS)
            {
                $data->replyCodeData = ReplyCodeDataPlayersListFriends::deserialize($reader);
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
        return "InitInitServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
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
    private $byteSize = 0;
    private Version $version;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

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
        if ($data->version === null)
        {
            throw new SerializationError('version must be provided.');
        }
        Version::serialize($writer, $data->version);


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
            $data->version = Version::deserialize($reader);

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
        return "ReplyCodeDataOutOfDate(byteSize=' . $this->byteSize . '', version=' . $this->version . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::OK
 */

class ReplyCodeDataOk implements ReplyCodeData
{
    private $byteSize = 0;
    private int $seq1;
    private int $seq2;
    private int $serverEncryptionMultiple;
    private int $clientEncryptionMultiple;
    private int $playerId;
    private int $challengeResponse;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSeq1(): int
    {
        return $this->seq1;
    }

    public function setSeq1(int $seq1): void
    {
        $this->seq1 = $seq1;
    }

    public function getSeq2(): int
    {
        return $this->seq2;
    }

    public function setSeq2(int $seq2): void
    {
        $this->seq2 = $seq2;
    }

    public function getServerEncryptionMultiple(): int
    {
        return $this->serverEncryptionMultiple;
    }

    public function setServerEncryptionMultiple(int $serverEncryptionMultiple): void
    {
        $this->serverEncryptionMultiple = $serverEncryptionMultiple;
    }

    public function getClientEncryptionMultiple(): int
    {
        return $this->clientEncryptionMultiple;
    }

    public function setClientEncryptionMultiple(int $clientEncryptionMultiple): void
    {
        $this->clientEncryptionMultiple = $clientEncryptionMultiple;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getChallengeResponse(): int
    {
        return $this->challengeResponse;
    }

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
        if ($data->seq1 === null)
        {
            throw new SerializationError('seq1 must be provided.');
        }
        $writer->addByte($data->seq1);

        if ($data->seq2 === null)
        {
            throw new SerializationError('seq2 must be provided.');
        }
        $writer->addByte($data->seq2);

        if ($data->serverEncryptionMultiple === null)
        {
            throw new SerializationError('serverEncryptionMultiple must be provided.');
        }
        $writer->addByte($data->serverEncryptionMultiple);

        if ($data->clientEncryptionMultiple === null)
        {
            throw new SerializationError('clientEncryptionMultiple must be provided.');
        }
        $writer->addByte($data->clientEncryptionMultiple);

        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->challengeResponse === null)
        {
            throw new SerializationError('challengeResponse must be provided.');
        }
        $writer->addThree($data->challengeResponse);


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
            $data->seq1 = $reader->getByte();
            $data->seq2 = $reader->getByte();
            $data->serverEncryptionMultiple = $reader->getByte();
            $data->clientEncryptionMultiple = $reader->getByte();
            $data->playerId = $reader->getShort();
            $data->challengeResponse = $reader->getThree();

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
        return "ReplyCodeDataOk(byteSize=' . $this->byteSize . '', seq1=' . $this->seq1 . '', seq2=' . $this->seq2 . '', serverEncryptionMultiple=' . $this->serverEncryptionMultiple . '', clientEncryptionMultiple=' . $this->clientEncryptionMultiple . '', playerId=' . $this->playerId . '', challengeResponse=' . $this->challengeResponse . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::BANNED
 */

class ReplyCodeDataBanned implements ReplyCodeData
{
    private $byteSize = 0;
    private int $banType;
    private ?banTypeData $banTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getBanType(): int
    {
        return $this->banType;
    }

    public function setBanType(int $banType): void
    {
        $this->banType = $banType;
    }

    public function banTypeData(): ?banTypeData
    {
        /**
         * ReplyCodeDataBanned::BanTypeData: Gets or sets the data associated with the `banType` field.
         */
        return $this->banTypeData;
    }

    public function setBanTypeData($banTypeData): void
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
        if ($data->banType === null)
        {
            throw new SerializationError('banType must be provided.');
        }
        $writer->addByte((int) $data->banType);

        if ($data->banType === 0)
        {
            if (!($data->banTypeData instanceof BanTypeData0))
            {
                throw new \Eolib\Protocol\SerializationError("Expected banTypeData to be of type BanTypeData0 for banType " . InitBanType($data->banType)->name . ".");
            }
            BanTypeData0::serialize($writer, $data->banTypeData);
        }
        elseif ($data->banType === InitBanType::TEMPORARY)
        {
            if (!($data->banTypeData instanceof BanTypeDataTemporary))
            {
                throw new \Eolib\Protocol\SerializationError("Expected banTypeData to be of type BanTypeDataTemporary for banType " . InitBanType($data->banType)->name . ".");
            }
            BanTypeDataTemporary::serialize($writer, $data->banTypeData);
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
            $data->banType = InitBanType($reader->getByte());
            if ($data->banType === 0)
            {
                $data->banTypeData = BanTypeData0::deserialize($reader);
            }
            elseif ($data->banType === InitBanType::TEMPORARY)
            {
                $data->banTypeData = BanTypeDataTemporary::deserialize($reader);
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
        return "ReplyCodeDataBanned(byteSize=' . $this->byteSize . '', banType=' . $this->banType . '', banTypeData=' . $this->banTypeData . ')";
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
    private $byteSize = 0;
    private int $minutesRemaining;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMinutesRemaining(): int
    {
        return $this->minutesRemaining;
    }

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
        if ($data->minutesRemaining === null)
        {
            throw new SerializationError('minutesRemaining must be provided.');
        }
        $writer->addByte($data->minutesRemaining);


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
            $data->minutesRemaining = $reader->getByte();

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
        return "BanTypeData0(byteSize=' . $this->byteSize . '', minutesRemaining=' . $this->minutesRemaining . ')";
    }

}



/**
 * Data associated with banType value InitBanType::TEMPORARY
 */

class BanTypeDataTemporary implements BanTypeData
{
    private $byteSize = 0;
    private int $minutesRemaining;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMinutesRemaining(): int
    {
        return $this->minutesRemaining;
    }

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
        if ($data->minutesRemaining === null)
        {
            throw new SerializationError('minutesRemaining must be provided.');
        }
        $writer->addByte($data->minutesRemaining);


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
            $data->minutesRemaining = $reader->getByte();

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
        return "BanTypeDataTemporary(byteSize=' . $this->byteSize . '', minutesRemaining=' . $this->minutesRemaining . ')";
    }

}





/**
 * Data associated with replyCode value InitReply::WARPMAP
 */

class ReplyCodeDataWarpMap implements ReplyCodeData
{
    private $byteSize = 0;
    private MapFile $mapFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

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
        if ($data->mapFile === null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->mapFile);


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
            $data->mapFile = MapFile::deserialize($reader);

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
        return "ReplyCodeDataWarpMap(byteSize=' . $this->byteSize . '', mapFile=' . $this->mapFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEEMF
 */

class ReplyCodeDataFileEmf implements ReplyCodeData
{
    private $byteSize = 0;
    private MapFile $mapFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

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
        if ($data->mapFile === null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->mapFile);


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
            $data->mapFile = MapFile::deserialize($reader);

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
        return "ReplyCodeDataFileEmf(byteSize=' . $this->byteSize . '', mapFile=' . $this->mapFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEEIF
 */

class ReplyCodeDataFileEif implements ReplyCodeData
{
    private $byteSize = 0;
    private PubFile $pubFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

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
        if ($data->pubFile === null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->pubFile);


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
            $data->pubFile = PubFile::deserialize($reader);

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
        return "ReplyCodeDataFileEif(byteSize=' . $this->byteSize . '', pubFile=' . $this->pubFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEENF
 */

class ReplyCodeDataFileEnf implements ReplyCodeData
{
    private $byteSize = 0;
    private PubFile $pubFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

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
        if ($data->pubFile === null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->pubFile);


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
            $data->pubFile = PubFile::deserialize($reader);

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
        return "ReplyCodeDataFileEnf(byteSize=' . $this->byteSize . '', pubFile=' . $this->pubFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEESF
 */

class ReplyCodeDataFileEsf implements ReplyCodeData
{
    private $byteSize = 0;
    private PubFile $pubFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

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
        if ($data->pubFile === null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->pubFile);


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
            $data->pubFile = PubFile::deserialize($reader);

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
        return "ReplyCodeDataFileEsf(byteSize=' . $this->byteSize . '', pubFile=' . $this->pubFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::FILEECF
 */

class ReplyCodeDataFileEcf implements ReplyCodeData
{
    private $byteSize = 0;
    private PubFile $pubFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPubFile(): PubFile
    {
        return $this->pubFile;
    }

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
        if ($data->pubFile === null)
        {
            throw new SerializationError('pubFile must be provided.');
        }
        PubFile::serialize($writer, $data->pubFile);


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
            $data->pubFile = PubFile::deserialize($reader);

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
        return "ReplyCodeDataFileEcf(byteSize=' . $this->byteSize . '', pubFile=' . $this->pubFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::MAPMUTATION
 */

class ReplyCodeDataMapMutation implements ReplyCodeData
{
    private $byteSize = 0;
    private MapFile $mapFile;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getMapFile(): MapFile
    {
        return $this->mapFile;
    }

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
        if ($data->mapFile === null)
        {
            throw new SerializationError('mapFile must be provided.');
        }
        MapFile::serialize($writer, $data->mapFile);


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
            $data->mapFile = MapFile::deserialize($reader);

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
        return "ReplyCodeDataMapMutation(byteSize=' . $this->byteSize . '', mapFile=' . $this->mapFile . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::PLAYERSLIST
 */

class ReplyCodeDataPlayersList implements ReplyCodeData
{
    private $byteSize = 0;
    private PlayersList $playersList;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayersList(): PlayersList
    {
        return $this->playersList;
    }

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
        if ($data->playersList === null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersList::serialize($writer, $data->playersList);


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
            $data->playersList = PlayersList::deserialize($reader);
            $reader->setChunkedReadingMode(false);

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
        return "ReplyCodeDataPlayersList(byteSize=' . $this->byteSize . '', playersList=' . $this->playersList . ')";
    }

}



/**
 * Data associated with replyCode value InitReply::PLAYERSLISTFRIENDS
 */

class ReplyCodeDataPlayersListFriends implements ReplyCodeData
{
    private $byteSize = 0;
    private PlayersListFriends $playersList;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayersList(): PlayersListFriends
    {
        return $this->playersList;
    }

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
        if ($data->playersList === null)
        {
            throw new SerializationError('playersList must be provided.');
        }
        PlayersListFriends::serialize($writer, $data->playersList);


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
            $data->playersList = PlayersListFriends::deserialize($reader);
            $reader->setChunkedReadingMode(false);

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
        return "ReplyCodeDataPlayersListFriends(byteSize=' . $this->byteSize . '', playersList=' . $this->playersList . ')";
    }

}





