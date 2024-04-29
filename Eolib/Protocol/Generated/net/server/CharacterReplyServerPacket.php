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
use Eolib\Protocol\Generated\Net\server\CharacterReply;
use Eolib\Protocol\Generated\Net\server\CharacterSelectionListEntry;
use Eolib\Protocol\SerializationError;

/**
 * Reply to client Character-family packets
 */


class CharacterReplyServerPacket
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
         * CharacterReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::CHARACTER;
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
        CharacterReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `CharacterReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterReplyServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addShort((int) $data->replyCode);

        if ($data->replyCode === 0)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
        }
        elseif ($data->replyCode === CharacterReply::EXISTS)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataExists))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataExists for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataExists::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === CharacterReply::FULL)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFull))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFull for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFull::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === CharacterReply::FULL3)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataFull3))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataFull3 for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataFull3::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === CharacterReply::NOTAPPROVED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataNotApproved))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataNotApproved for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataNotApproved::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === CharacterReply::OK)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataOk))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataOk for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataOk::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === CharacterReply::DELETED)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataDeleted))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataDeleted for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataDeleted::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === 7)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
        }
        elseif ($data->replyCode === 8)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
        }
        elseif ($data->replyCode === 9)
        {
            if ($data->replyCodeData !== null)
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be null for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
        }
        else
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataDefault))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataDefault for replyCode " . CharacterReply($data->replyCode)->name . ".");
            }
            ReplyCodeDataDefault::serialize($writer, $data->replyCodeData);
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
            $data->replyCode = CharacterReply($reader->getShort());
            if ($data->replyCode === 0)
            {
                $data->replyCodeData = null;
            }
            elseif ($data->replyCode === CharacterReply::EXISTS)
            {
                $data->replyCodeData = ReplyCodeDataExists::deserialize($reader);
            }
            elseif ($data->replyCode === CharacterReply::FULL)
            {
                $data->replyCodeData = ReplyCodeDataFull::deserialize($reader);
            }
            elseif ($data->replyCode === CharacterReply::FULL3)
            {
                $data->replyCodeData = ReplyCodeDataFull3::deserialize($reader);
            }
            elseif ($data->replyCode === CharacterReply::NOTAPPROVED)
            {
                $data->replyCodeData = ReplyCodeDataNotApproved::deserialize($reader);
            }
            elseif ($data->replyCode === CharacterReply::OK)
            {
                $data->replyCodeData = ReplyCodeDataOk::deserialize($reader);
            }
            elseif ($data->replyCode === CharacterReply::DELETED)
            {
                $data->replyCodeData = ReplyCodeDataDeleted::deserialize($reader);
            }
            elseif ($data->replyCode === 7)
            {
                $data->replyCodeData = null;
            }
            elseif ($data->replyCode === 8)
            {
                $data->replyCodeData = null;
            }
            elseif ($data->replyCode === 9)
            {
                $data->replyCodeData = null;
            }
            else
            {
                $data->replyCodeData = ReplyCodeDataDefault::deserialize($reader);
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
        return "CharacterReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
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
        return "ReplyCodeDataExists(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value CharacterReply::FULL
 */

class ReplyCodeDataFull implements ReplyCodeData
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
        return "ReplyCodeDataFull(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value CharacterReply::FULL3
 */

class ReplyCodeDataFull3 implements ReplyCodeData
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
        return "ReplyCodeDataFull3(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value CharacterReply::NOTAPPROVED
 */

class ReplyCodeDataNotApproved implements ReplyCodeData
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
        return "ReplyCodeDataNotApproved(byteSize=' . $this->byteSize . ')";
    }

}



/**
 * Data associated with replyCode value CharacterReply::OK
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
 * Data associated with replyCode value CharacterReply::DELETED
 */

class ReplyCodeDataDeleted implements ReplyCodeData
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
     * Serializes an instance of `ReplyCodeDataDeleted` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataDeleted $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataDeleted $data): void {
        if ($data->charactersCount === null)
        {
            throw new SerializationError('charactersCount must be provided.');
        }
        $writer->addChar($data->charactersCount);

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
            $data->charactersCount = $reader->getChar();
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
        return "ReplyCodeDataDeleted(byteSize=' . $this->byteSize . '', characters=' . $this->characters . ')";
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
        return "ReplyCodeDataDefault(byteSize=' . $this->byteSize . ')";
    }

}





