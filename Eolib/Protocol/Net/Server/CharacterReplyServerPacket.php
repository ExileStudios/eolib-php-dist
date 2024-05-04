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
use Eolib\Protocol\Net\Server\CharacterReply;
use Eolib\Protocol\Net\Server\CharacterSelectionListEntry;
use Eolib\Protocol\SerializationError;

/**
 * Reply to client Character-family packets
 */


class CharacterReplyServerPacket
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
         * CharacterReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::CHARACTER;
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
        CharacterReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CharacterReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterReplyServerPacket $data): void {
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
        elseif ($data->replyCode === CharacterReply::EXISTS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataExists))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataExists for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataExists::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === CharacterReply::FULL)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFull))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFull for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFull::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === CharacterReply::FULL3)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFull3))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFull3 for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataFull3::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === CharacterReply::NOTAPPROVED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataNotApproved))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataNotApproved for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataNotApproved::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === CharacterReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === CharacterReply::DELETED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataDeleted))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataDeleted for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataDeleted::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === 7)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . $data->replyCode . ".");
            }
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
     * Deserializes an instance of `CharacterReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterReplyServerPacket
    {
        $data = new CharacterReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setReplyCode($reader->getShort());
            if ($data->replyCode === 0)
            {
                $data->setReplyCodeData(null);
            }
            elseif ($data->replyCode === CharacterReply::EXISTS)
            {
                $data->setReplyCodeData(ReplyCodeDataExists::deserialize($reader));
            }
            elseif ($data->replyCode === CharacterReply::FULL)
            {
                $data->setReplyCodeData(ReplyCodeDataFull::deserialize($reader));
            }
            elseif ($data->replyCode === CharacterReply::FULL3)
            {
                $data->setReplyCodeData(ReplyCodeDataFull3::deserialize($reader));
            }
            elseif ($data->replyCode === CharacterReply::NOTAPPROVED)
            {
                $data->setReplyCodeData(ReplyCodeDataNotApproved::deserialize($reader));
            }
            elseif ($data->replyCode === CharacterReply::OK)
            {
                $data->setReplyCodeData(ReplyCodeDataOk::deserialize($reader));
            }
            elseif ($data->replyCode === CharacterReply::DELETED)
            {
                $data->setReplyCodeData(ReplyCodeDataDeleted::deserialize($reader));
            }
            elseif ($data->replyCode === 7)
            {
                $data->setReplyCodeData(null);
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
        return "CharacterReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value CharacterReply::EXISTS
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
 * Data associated with replyCode value CharacterReply::FULL
 */

class ReplyCodeDataFull implements ReplyCodeData
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
     * Serializes an instance of `ReplyCodeDataFull` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFull $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFull $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFull` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFull The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFull
    {
        $data = new ReplyCodeDataFull();
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
        return "ReplyCodeDataFull(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value CharacterReply::FULL3
 */

class ReplyCodeDataFull3 implements ReplyCodeData
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
     * Serializes an instance of `ReplyCodeDataFull3` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataFull3 $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataFull3 $data): void {
        $writer->addString('NO');


    }

    /**
     * Deserializes an instance of `ReplyCodeDataFull3` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataFull3 The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataFull3
    {
        $data = new ReplyCodeDataFull3();
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
        return "ReplyCodeDataFull3(byteSize=$this->byteSize)";
    }

}



/**
 * Data associated with replyCode value CharacterReply::NOTAPPROVED
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
 * Data associated with replyCode value CharacterReply::OK
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
 * Data associated with replyCode value CharacterReply::DELETED
 */

class ReplyCodeDataDeleted implements ReplyCodeData
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
     * Serializes an instance of `ReplyCodeDataDeleted` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataDeleted $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataDeleted $data): void {
        if ($data->getCharactersCount() == null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->getCharactersCount());

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
     * Deserializes an instance of `ReplyCodeDataDeleted` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataDeleted The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataDeleted
    {
        $data = new ReplyCodeDataDeleted();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setCharactersCount($reader->getChar());
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
        return "ReplyCodeDataDeleted(byteSize=$this->byteSize, characters=".var_export($this->characters, true).")";
    }

}



/**
 * Default data associated with replyCode
 * 
 * 
 * In this case (reply_code &gt; 9), reply_code is a session ID for character creation
 * 
 */

class ReplyCodeDataDefault implements ReplyCodeData
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
     * Serializes an instance of `ReplyCodeDataDefault` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataDefault $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataDefault $data): void {
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
        return "ReplyCodeDataDefault(byteSize=$this->byteSize)";
    }

}





