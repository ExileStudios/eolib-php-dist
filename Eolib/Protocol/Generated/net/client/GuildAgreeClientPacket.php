<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\client\GuildInfoType;
use Eolib\Protocol\SerializationError;

/**
 * Update the guild description or rank list
 */


class GuildAgreeClientPacket
{
    private $byteSize = 0;
    private int $sessionId;
    private int $infoType;
    private ?infoTypeData $infoTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getInfoType(): int
    {
        return $this->infoType;
    }

    public function setInfoType(int $infoType): void
    {
        $this->infoType = $infoType;
    }

    public function infoTypeData(): ?infoTypeData
    {
        /**
         * GuildAgreeClientPacket::InfoTypeData: Gets or sets the data associated with the `infoType` field.
         */
        return $this->infoTypeData;
    }

    public function setInfoTypeData($infoTypeData): void
    {
        $this->infoTypeData = $infoTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::GUILD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);

        if ($data->infoType === null)
        {
            throw new SerializationError('infoType must be provided.');
        }
        $writer->addShort((int) $data->infoType);

        if ($data->infoType === GuildInfoType::DESCRIPTION)
        {
            if (!($data->infoTypeData instanceof InfoTypeDataDescription))
            {
                throw new \Eolib\Protocol\SerializationError("Expected infoTypeData to be of type InfoTypeDataDescription for infoType " . GuildInfoType($data->infoType)->name . ".");
            }
            InfoTypeDataDescription::serialize($writer, $data->infoTypeData);
        }
        elseif ($data->infoType === GuildInfoType::RANKS)
        {
            if (!($data->infoTypeData instanceof InfoTypeDataRanks))
            {
                throw new \Eolib\Protocol\SerializationError("Expected infoTypeData to be of type InfoTypeDataRanks for infoType " . GuildInfoType($data->infoType)->name . ".");
            }
            InfoTypeDataRanks::serialize($writer, $data->infoTypeData);
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
            $data->sessionId = $reader->getInt();
            $data->infoType = GuildInfoType($reader->getShort());
            if ($data->infoType === GuildInfoType::DESCRIPTION)
            {
                $data->infoTypeData = InfoTypeDataDescription::deserialize($reader);
            }
            elseif ($data->infoType === GuildInfoType::RANKS)
            {
                $data->infoTypeData = InfoTypeDataRanks::deserialize($reader);
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
        return "GuildAgreeClientPacket(byteSize=' . $this->byteSize . '', sessionId=' . $this->sessionId . '', infoType=' . $this->infoType . '', infoTypeData=' . $this->infoTypeData . ')";
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
    private $byteSize = 0;
    private string $description = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

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
        if ($data->description === null)
        {
            throw new SerializationError('description must be provided.');
        }
        $writer->addString($data->description);


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
            $data->description = $reader->getString();

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
        return "InfoTypeDataDescription(byteSize=' . $this->byteSize . '', description=' . $this->description . ')";
    }

}



/**
 * Data associated with infoType value GuildInfoType::RANKS
 */

class InfoTypeDataRanks implements InfoTypeData
{
    private $byteSize = 0;
    private array $ranks = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRanks(): array
    {
        return $this->ranks;
    }

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
        if ($data->ranks === null)
        {
            throw new SerializationError('ranks must be provided.');
        }
        if (strlen($data->ranks) != 9)
        {
            throw new SerializationError("Expected length of ranks to be exactly 9, got {strlen($data->ranks)}.");
        }
        for ($i = 0; $i < 9; $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->ranks[$i]);

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
        return "InfoTypeDataRanks(byteSize=' . $this->byteSize . '', ranks=' . $this->ranks . ')";
    }

}





