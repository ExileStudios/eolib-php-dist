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
use Eolib\Protocol\Generated\Net\server\PartyReplyCode;
use Eolib\Protocol\SerializationError;

/**
 * Failed party invite / join request
 */


class PartyReplyServerPacket
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
         * PartyReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::PARTY;
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
        PartyReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyReplyServerPacket $data): void {
        if ($data->replyCode === null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addChar((int) $data->replyCode);

        if ($data->replyCode === PartyReplyCode::ALREADYINANOTHERPARTY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataAlreadyInAnotherParty))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataAlreadyInAnotherParty for replyCode " . PartyReplyCode($data->replyCode)->name . ".");
            }
            ReplyCodeDataAlreadyInAnotherParty::serialize($writer, $data->replyCodeData);
        }
        elseif ($data->replyCode === PartyReplyCode::ALREADYINYOURPARTY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataAlreadyInYourParty))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataAlreadyInYourParty for replyCode " . PartyReplyCode($data->replyCode)->name . ".");
            }
            ReplyCodeDataAlreadyInYourParty::serialize($writer, $data->replyCodeData);
        }

    }

    /**
     * Deserializes an instance of `PartyReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyReplyServerPacket
    {
        $data = new PartyReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->replyCode = PartyReplyCode($reader->getChar());
            if ($data->replyCode === PartyReplyCode::ALREADYINANOTHERPARTY)
            {
                $data->replyCodeData = ReplyCodeDataAlreadyInAnotherParty::deserialize($reader);
            }
            elseif ($data->replyCode === PartyReplyCode::ALREADYINYOURPARTY)
            {
                $data->replyCodeData = ReplyCodeDataAlreadyInYourParty::deserialize($reader);
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
        return "PartyReplyServerPacket(byteSize=' . $this->byteSize . '', replyCode=' . $this->replyCode . '', replyCodeData=' . $this->replyCodeData . ')";
    }

}

/**
 * Data associated with different values of the `replyCode` field.
 */
interface ReplyCodeData {}

/**
 * Data associated with replyCode value PartyReplyCode::ALREADYINANOTHERPARTY
 */

class ReplyCodeDataAlreadyInAnotherParty implements ReplyCodeData
{
    private $byteSize = 0;
    private string $playerName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }


    /**
     * Serializes an instance of `ReplyCodeDataAlreadyInAnotherParty` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataAlreadyInAnotherParty $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataAlreadyInAnotherParty $data): void {
        if ($data->playerName === null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->playerName);


    }

    /**
     * Deserializes an instance of `ReplyCodeDataAlreadyInAnotherParty` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataAlreadyInAnotherParty The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataAlreadyInAnotherParty
    {
        $data = new ReplyCodeDataAlreadyInAnotherParty();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerName = $reader->getString();

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
        return "ReplyCodeDataAlreadyInAnotherParty(byteSize=' . $this->byteSize . '', playerName=' . $this->playerName . ')";
    }

}



/**
 * Data associated with replyCode value PartyReplyCode::ALREADYINYOURPARTY
 */

class ReplyCodeDataAlreadyInYourParty implements ReplyCodeData
{
    private $byteSize = 0;
    private string $playerName = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }


    /**
     * Serializes an instance of `ReplyCodeDataAlreadyInYourParty` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ReplyCodeDataAlreadyInYourParty $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ReplyCodeDataAlreadyInYourParty $data): void {
        if ($data->playerName === null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->playerName);


    }

    /**
     * Deserializes an instance of `ReplyCodeDataAlreadyInYourParty` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ReplyCodeDataAlreadyInYourParty The deserialized data.
     */
    public static function deserialize(EoReader $reader): ReplyCodeDataAlreadyInYourParty
    {
        $data = new ReplyCodeDataAlreadyInYourParty();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerName = $reader->getString();

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
        return "ReplyCodeDataAlreadyInYourParty(byteSize=' . $this->byteSize . '', playerName=' . $this->playerName . ')";
    }

}





