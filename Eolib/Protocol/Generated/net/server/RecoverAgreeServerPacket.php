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
use Eolib\Protocol\SerializationError;

/**
 * Nearby player gained HP
 */


class RecoverAgreeServerPacket
{
    private $byteSize = 0;
    private int $playerId;
    private int $healHp;
    private int $hpPercentage;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getHealHp(): int
    {
        return $this->healHp;
    }

    public function setHealHp(int $healHp): void
    {
        $this->healHp = $healHp;
    }

    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RECOVER;
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
        RecoverAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RecoverAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RecoverAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RecoverAgreeServerPacket $data): void {
        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->healHp === null)
        {
            throw new SerializationError('healHp must be provided.');
        }
        $writer->addInt($data->healHp);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);


    }

    /**
     * Deserializes an instance of `RecoverAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return RecoverAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): RecoverAgreeServerPacket
    {
        $data = new RecoverAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->playerId = $reader->getShort();
            $data->healHp = $reader->getInt();
            $data->hpPercentage = $reader->getChar();

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
        return "RecoverAgreeServerPacket(byteSize=' . $this->byteSize . '', playerId=' . $this->playerId . '', healHp=' . $this->healHp . '', hpPercentage=' . $this->hpPercentage . ')";
    }

}



