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
use Eolib\Protocol\Net\Server\PartyReplyCode;
use Eolib\Protocol\SerializationError;

/**
 * Failed party invite / join request
 */


class PartyReplyServerPacket
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
         * PartyReplyServerPacket::ReplyCodeData: Gets or sets the data associated with the `replyCode` field.
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
        return PacketFamily::PARTY;
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
        PartyReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyReplyServerPacket $data): void {
        if ($data->getReplyCode() == null)
        {
            throw new SerializationError('replyCode must be provided.');
        }
        $writer->addChar((int) $data->getReplyCode());

        if ($data->replyCode === PartyReplyCode::ALREADYINANOTHERPARTY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataAlreadyInAnotherParty))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataAlreadyInAnotherParty for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataAlreadyInAnotherParty::serialize($writer, $data->getReplyCodeData());
        }
        elseif ($data->replyCode === PartyReplyCode::ALREADYINYOURPARTY)
        {
            if (!($data->replyCodeData instanceof ReplyCodeDataAlreadyInYourParty))
            {
                throw new \Eolib\Protocol\SerializationError("Expected replyCodeData to be of type ReplyCodeDataAlreadyInYourParty for replyCode " . $data->replyCode . ".");
            }
            ReplyCodeDataAlreadyInYourParty::serialize($writer, $data->getReplyCodeData());
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
            $data->setReplyCode($reader->getChar());
            if ($data->replyCode === PartyReplyCode::ALREADYINANOTHERPARTY)
            {
                $data->setReplyCodeData(ReplyCodeDataAlreadyInAnotherParty::deserialize($reader));
            }
            elseif ($data->replyCode === PartyReplyCode::ALREADYINYOURPARTY)
            {
                $data->setReplyCodeData(ReplyCodeDataAlreadyInYourParty::deserialize($reader));
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
        return "PartyReplyServerPacket(byteSize=$this->byteSize, replyCode=".var_export($this->replyCode, true).", replyCodeData=".var_export($this->replyCodeData, true).")";
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
    private int $byteSize = 0;
    /** @var string */
    private string $playerName = "";

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
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /** @param string $playerName */
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
        if ($data->getPlayerName() == null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->getPlayerName());


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
            $data->setPlayerName($reader->getString());

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
        return "ReplyCodeDataAlreadyInAnotherParty(byteSize=$this->byteSize, playerName=$this->playerName)";
    }

}



/**
 * Data associated with replyCode value PartyReplyCode::ALREADYINYOURPARTY
 */

class ReplyCodeDataAlreadyInYourParty implements ReplyCodeData
{
    private int $byteSize = 0;
    /** @var string */
    private string $playerName = "";

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
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /** @param string $playerName */
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
        if ($data->getPlayerName() == null)
        {
            throw new SerializationError('playerName must be provided.');
        }
        $writer->addString($data->getPlayerName());


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
            $data->setPlayerName($reader->getString());

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
        return "ReplyCodeDataAlreadyInYourParty(byteSize=$this->byteSize, playerName=$this->playerName)";
    }

}





