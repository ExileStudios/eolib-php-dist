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
use Eolib\Protocol\SerializationError;

/**
 * Nearby player gained HP
 */


class RecoverAgreeServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $healHp;
    /** @var int */
    private int $hpPercentage;

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
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /** @param int $playerId */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }



    /** @return int */
    public function getHealHp(): int
    {
        return $this->healHp;
    }

    /** @param int $healHp */
    public function setHealHp(int $healHp): void
    {
        $this->healHp = $healHp;
    }



    /** @return int */
    public function getHpPercentage(): int
    {
        return $this->hpPercentage;
    }

    /** @param int $hpPercentage */
    public function setHpPercentage(int $hpPercentage): void
    {
        $this->hpPercentage = $hpPercentage;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::RECOVER;
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
        RecoverAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `RecoverAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param RecoverAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, RecoverAgreeServerPacket $data): void {
        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getHealHp() == null)
        {
            throw new SerializationError('healHp must be provided.');
        }
        $writer->addInt($data->getHealHp());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());


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
            $data->setPlayerId($reader->getShort());
            $data->setHealHp($reader->getInt());
            $data->setHpPercentage($reader->getChar());

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
        return "RecoverAgreeServerPacket(byteSize=$this->byteSize, playerId=".var_export($this->playerId, true).", healHp=".var_export($this->healHp, true).", hpPercentage=".var_export($this->hpPercentage, true).")";
    }

}



