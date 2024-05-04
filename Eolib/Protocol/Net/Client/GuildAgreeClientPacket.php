<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\Client\GuildInfoType;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Update the guild description or rank list
 */


class GuildAgreeClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sessionId;
    /** @var int */
    private int $infoType;
    private ?InfoTypeData $infoTypeData = null;

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
    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    /** @param int $sessionId */
    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }



    /** @return int */
    public function getInfoType(): int
    {
        return $this->infoType;
    }

    /** @param int $infoType */
    public function setInfoType(int $infoType): void
    {
        $this->infoType = $infoType;
    }



    public function getInfoTypeData(): ?InfoTypeData
    {
        /**
         * GuildAgreeClientPacket::InfoTypeData: Gets or sets the data associated with the `infoType` field.
         */
        return $this->infoTypeData;
    }

    public function setInfoTypeData(?InfoTypeData $infoTypeData): void
    {
        $this->infoTypeData = $infoTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::GUILD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::AGREE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        GuildAgreeClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `GuildAgreeClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param GuildAgreeClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, GuildAgreeClientPacket $data): void {
        if ($data->getSessionId() == null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->getSessionId());

        if ($data->getInfoType() == null)
        {
            throw new SerializationError('infoType must be provided.');
        }
        $writer->addShort((int) $data->getInfoType());

        if ($data->infoType === GuildInfoType::DESCRIPTION)
        {
            if (!($data->infoTypeData instanceof InfoTypeDataDescription))
            {
                throw new \Eolib\Protocol\SerializationError("Expected infoTypeData to be of type InfoTypeDataDescription for infoType " . $data->infoType . ".");
            }
            InfoTypeDataDescription::serialize($writer, $data->getInfoTypeData());
        }
        elseif ($data->infoType === GuildInfoType::RANKS)
        {
            if (!($data->infoTypeData instanceof InfoTypeDataRanks))
            {
                throw new \Eolib\Protocol\SerializationError("Expected infoTypeData to be of type InfoTypeDataRanks for infoType " . $data->infoType . ".");
            }
            InfoTypeDataRanks::serialize($writer, $data->getInfoTypeData());
        }

    }

    /**
     * Deserializes an instance of `GuildAgreeClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return GuildAgreeClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): GuildAgreeClientPacket
    {
        $data = new GuildAgreeClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setSessionId($reader->getInt());
            $data->setInfoType($reader->getShort());
            if ($data->infoType === GuildInfoType::DESCRIPTION)
            {
                $data->setInfoTypeData(InfoTypeDataDescription::deserialize($reader));
            }
            elseif ($data->infoType === GuildInfoType::RANKS)
            {
                $data->setInfoTypeData(InfoTypeDataRanks::deserialize($reader));
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
        return "GuildAgreeClientPacket(byteSize=$this->byteSize, sessionId=".var_export($this->sessionId, true).", infoType=".var_export($this->infoType, true).", infoTypeData=".var_export($this->infoTypeData, true).")";
    }

}

/**
 * Data associated with different values of the `infoType` field.
 */
interface InfoTypeData {}

/**
 * Data associated with infoType value GuildInfoType::DESCRIPTION
 */

class InfoTypeDataDescription implements InfoTypeData
{
    private int $byteSize = 0;
    /** @var string */
    private string $description = "";

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /** @param string $description */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }




    /**
     * Serializes an instance of `InfoTypeDataDescription` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InfoTypeDataDescription $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InfoTypeDataDescription $data): void {
        if ($data->getDescription() == null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->getDescription());


    }

    /**
     * Deserializes an instance of `InfoTypeDataDescription` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InfoTypeDataDescription The deserialized data.
     */
    public static function deserialize(EoReader $reader): InfoTypeDataDescription
    {
        $data = new InfoTypeDataDescription();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setDescription($reader->getString());

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
        return "InfoTypeDataDescription(byteSize=$this->byteSize, description=$this->description)";
    }

}



/**
 * Data associated with infoType value GuildInfoType::RANKS
 */

class InfoTypeDataRanks implements InfoTypeData
{
    private int $byteSize = 0;
    /** @var string[] */
    public array $ranks = [];

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

    /** @return string[] */
    public function getRanks(): array
    {
        return $this->ranks;
    }

    /** @param string[] $ranks */
    public function setRanks(array $ranks): void
    {
        $this->ranks = $ranks;
    }




    /**
     * Serializes an instance of `InfoTypeDataRanks` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InfoTypeDataRanks $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InfoTypeDataRanks $data): void {
        if ($data->getRanks() == null)
        {
            throw new SerializationError('ranks must be provided.');
        }
        if (count($data->ranks) != 9)
        {
            throw new SerializationError("Expected length of ranks to be exactly 9, got " . count($data->ranks) . ".");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getRanks()[$i]);

        }

    }

    /**
     * Deserializes an instance of `InfoTypeDataRanks` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InfoTypeDataRanks The deserialized data.
     */
    public static function deserialize(EoReader $reader): InfoTypeDataRanks
    {
        $data = new InfoTypeDataRanks();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->ranks = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->ranks[] = $reader->getString();
                if ($i + 1 < 9)
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
        return "InfoTypeDataRanks(byteSize=$this->byteSize, ranks=".var_export($this->ranks, true).")";
    }

}





