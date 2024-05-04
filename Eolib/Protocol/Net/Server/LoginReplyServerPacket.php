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
use Eolib\Protocol\Net\Server\CharacterSelectionListEntry;
use Eolib\Protocol\Net\Server\LoginReply;
use Eolib\Protocol\SerializationError;

/**
 * Login reply
 */


class LoginReplyServerPacket
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
         * LoginReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::LOGIN;
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
        LoginReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `LoginReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param LoginReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, LoginReplyServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->getReplyCode());

        if ($data->replyCode === LoginReply::WRONGUSER)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongUser))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongUser for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataWrongUser::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === LoginReply::WRONGUSERPASSWORD)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataWrongUserPassword))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataWrongUserPassword for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataWrongUserPassword::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === LoginReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === LoginReply::BANNED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBanned))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBanned for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataBanned::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === LoginReply::LOGGEDIN)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataLoggedIn))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataLoggedIn for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataLoggedIn::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === LoginReply::BUSY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataBusy))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataBusy for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataBusy::serialize($writer, $data->getReplyCodeData());
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
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === LoginReply::WRONGUSER)
            {
                $data->setReplyCodeData(ReplyCodeDataWrongUser::deserialize($reader));
            }
            elseif ($data->replyCode === LoginReply::WRONGUSERPASSWORD)
            {
                $data->setReplyCodeData(ReplyCodeDataWrongUserPassword::deserialize($reader));
            }
            elseif ($data->replyCode === LoginReply::OK)
            {
                $data->setReplyCodeData(ReplyCodeDataOk::deserialize($reader));
            }
            elseif ($data->replyCode === LoginReply::BANNED)
            {
                $data->setReplyCodeData(ReplyCodeDataBanned::deserialize($reader));
            }
            elseif ($data->replyCode === LoginReply::LOGGEDIN)
            {
                $data->setReplyCodeData(ReplyCodeDataLoggedIn::deserialize($reader));
            }
            elseif ($data->replyCode === LoginReply::BUSY)
            {
                $data->setReplyCodeData(ReplyCodeDataBusy::deserialize($reader));
            }
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
        return "LoginReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
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
        return "ReplyCodeDataWrongUser(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value LoginReply::WRONGUSERPASSWORD
 */

class ReplyCodeDataWrongUserPassword implements ReplyCodeData
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
        return "ReplyCodeDataWrongUserPassword(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value LoginReply::OK
 */

class ReplyCodeDataOk implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $charactersCount;
    /** @var CharacterSelectionListEntry[] */
    public array $characters = [];

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

    /** @return CharacterSelectionListEntry[] */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /** @param CharacterSelectionListEntry[] $characters */
    public function setCharacters(array $characters): void
    {
        $this->characters = $characters;
        $this->charactersCount = count($this->characters);
    }

    /** @return int */
    public function getCharactersCount(): int
    {
        return $this->charactersCount;
    }

    /** @param int $charactersCount */
    public function setCharactersCount(int $charactersCount): void
    {
        $this->charactersCount = $charactersCount;
    }


    /**
     * Serializes an instance of `ReplyCodeDataOk` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataOk $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataOk $data): void {
        if ($data->getCharactersCount() == null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->getCharactersCount());

        $writer->addChar(0);

        $writer->addByte(0xFF);
        if ($data->getCharacters() == null)
        {
            throw new SerializationError('characters must be provided.');
        }
        if (count($data->characters) > 252)
        {
            throw new SerializationError("Expected length of characters to be 252 or less, got " . count($data->characters) . ".");
        }
        for ($i = 0; $i < $data->getCharactersCount(); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            CharacterSelectionListEntry::serialize($writer, $data->getCharacters()[$i]);

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
            $data->setCharactersCount($reader->getChar());
            $reader->getChar();
            $reader->nextChunk();
            $data->characters = [];
            for ($i = 0; $i < $data->getCharactersCount(); $i++)
            {
                $data->characters[] = CharacterSelectionListEntry::deserialize($reader);
                if ($i + 1 < $data->getCharactersCount())
                {
                    $reader->nextChunk();
                }
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
        return "ReplyCodeDataOk(byteSize=$this->byteSize, characters=".var_export($this->characters, true).")";
    }

}



/**
 * Data associated with replyCode value LoginReply::BANNED
 */

class ReplyCodeDataBanned implements ReplyCodeData
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
        return "ReplyCodeDataBanned(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value LoginReply::LOGGEDIN
 */

class ReplyCodeDataLoggedIn implements ReplyCodeData
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
        return "ReplyCodeDataLoggedIn(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value LoginReply::BUSY
 */

class ReplyCodeDataBusy implements ReplyCodeData
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
        return "ReplyCodeDataBusy(byteSize=$this->byteSize)";
    }

}





