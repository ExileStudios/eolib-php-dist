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
use Eolib\Protocol\Generated\Net\server\CharacterSelectionListEntry;
use Eolib\Protocol\Generated\Net\server\LoginReply;
use Eolib\Protocol\SerializationError;

/**
 * Login reply
 */


class LoginReplyServerPacket
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
         * LoginReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::LOGIN;
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
        LoginReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LoginReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LoginReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LoginReplyServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->replyCode);

        if ($data->replyCode === LoginReply::WRONGUSER)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongUser))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongUser for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataWrongUser::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === LoginReply::WRONGUSERPASSWORD)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongUserPassword))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongUserPassword for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataWrongUserPassword::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === LoginReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === LoginReply::BANNED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBanned))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBanned for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataBanned::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === LoginReply::LOGGEDIN)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataLoggedIn))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataLoggedIn for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataLoggedIn::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === LoginReply::BUSY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBusy))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBusy for replyCode " . LoginReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataBusy::serialize($writer, $data->replyCodeData);
        }

    }

    /**
     * Deserializes an instance of `LoginReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return LoginReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): LoginReplyServerPacket
    {
        $data = new LoginReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->replyCode = LoginReply($reader->getShort());
            if ($data->replyCode === LoginReply::WRONGUSER)
            {
                $data->replyCodeData = ReplyCodeDataWrongUser::deserialize($reader);
            }
            elseif ($data->replyCode === LoginReply::WRONGUSERPASSWORD)
            {
                $data->replyCodeData = ReplyCodeDataWrongUserPassword::deserialize($reader);
            }
            elseif ($data->replyCode === LoginReply::OK)
            {
                $data->replyCodeData = ReplyCodeDataOk::deserialize($reader);
            }
            elseif ($data->replyCode === LoginReply::BANNED)
            {
                $data->replyCodeData = ReplyCodeDataBanned::deserialize($reader);
            }
            elseif ($data->replyCode === LoginReply::LOGGEDIN)
            {
                $data->replyCodeData = ReplyCodeDataLoggedIn::deserialize($reader);
            }
            elseif ($data->replyCode === LoginReply::BUSY)
            {
                $data->replyCodeData = ReplyCodeDataBusy::deserialize($reader);
            }
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
        return "LoginReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value LoginReply::WRONGUSER
 */

class ReplyCodeDataWrongUser implements ReplyCodeData
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }


    /**
     * Serializes an instance of `ReplyCodeDataWrongUser` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataWrongUser $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataWrongUser $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataWrongUser` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataWrongUser The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataWrongUser
    {
        $data = new ReplyCodeDataWrongUser();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataWrongUser(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value LoginReply::WRONGUSERPASSWORD
 */

class ReplyCodeDataWrongUserPassword implements ReplyCodeData
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }


    /**
     * Serializes an instance of `ReplyCodeDataWrongUserPassword` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataWrongUserPassword $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataWrongUserPassword $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataWrongUserPassword` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataWrongUserPassword The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataWrongUserPassword
    {
        $data = new ReplyCodeDataWrongUserPassword();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataWrongUserPassword(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value LoginReply::OK
 */

class ReplyCodeDataOk implements ReplyCodeData
{
    private $byteSize = 0;
    private int $charactersCount;
    private array $characters;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): void
    {
        $this->characters = $characters;
        $this->charactersCount = strlen($this->characters);
    }


    /**
     * Serializes an instance of `ReplyCodeDataOk` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataOk $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataOk $data): void {
        if ($data->charactersCount === null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->charactersCount);

        $writer->addChar(0);

        $writer->addByte(0xFF);
        if ($data->characters === null)
        {
            throw new SerializationError('characters must be provided.');
        }
        if (strlen($data->characters) > 252)
        {
            throw new SerializationError("Expected length of characters to be 252 or less, got {strlen($data->characters)}.");
        }
        for ($i = 0; $i < $data->charactersCount; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            CharacterSelectionListEntry::serialize($writer, $data->characters[$i]);

        }

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
            $data->charactersCount = $reader->getChar();
            $reader->getChar();
            $reader->nextChunk();
            $data->characters = [];
            for ($i = 0; $i < $data->charactersCount; $i++)
            {
                $data->characters[] = CharacterSelectionListEntry::deserialize($reader);
                if ($i + 1 < $data->charactersCount)
                {
                    $reader->nextChunk();
                }
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
        return "ReplyCodeDataOk(byteSize=' . $this->byteSize . '', characters=' . $this->characters . ')";
    }

}



/**
 * Data associated with replyCode value LoginReply::BANNED
 */

class ReplyCodeDataBanned implements ReplyCodeData
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }


    /**
     * Serializes an instance of `ReplyCodeDataBanned` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataBanned $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataBanned $data): void {
        $writer->addString('NO');


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
            $reader->getString();

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
        return "ReplyCodeDataBanned(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value LoginReply::LOGGEDIN
 */

class ReplyCodeDataLoggedIn implements ReplyCodeData
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }


    /**
     * Serializes an instance of `ReplyCodeDataLoggedIn` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataLoggedIn $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataLoggedIn $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataLoggedIn` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataLoggedIn The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataLoggedIn
    {
        $data = new ReplyCodeDataLoggedIn();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataLoggedIn(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value LoginReply::BUSY
 */

class ReplyCodeDataBusy implements ReplyCodeData
{
    private $byteSize = 0;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }


    /**
     * Serializes an instance of `ReplyCodeDataBusy` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataBusy $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataBusy $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataBusy` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataBusy The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataBusy
    {
        $data = new ReplyCodeDataBusy();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getString();

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
        return "ReplyCodeDataBusy(byteSize=' . $this->byteSize . ')";
    }

}





