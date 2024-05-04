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
use Eolib\Protocol\Direction;
use Eolib\Protocol\Net\Server\PlayerKilledState;
use Eolib\Protocol\SerializationError;


class NpcUpdateAttack
{
    private int $byteSize = 0;
    /** @var int */
    private int $npcIndex;
    /** @var int */
    private int $killed;
    /** @var int */
    private int $direction;
    /** @var int */
    private int $playerId;
    /** @var int */
    private int $damage;
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
    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    /** @param int $npcIndex */
    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }



    /** @return int */
    public function getKilled(): int
    {
        return $this->killed;
    }

    /** @param int $killed */
    public function setKilled(int $killed): void
    {
        $this->killed = $killed;
    }



    /** @return int */
    public function getDirection(): int
    {
        return $this->direction;
    }

    /** @param int $direction */
    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
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
    public function getDamage(): int
    {
        return $this->damage;
    }

    /** @param int $damage */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
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
     * Serializes an instance of `NpcUpdateAttack` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcUpdateAttack $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcUpdateAttack $data): void {
        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addChar($data->getNpcIndex());

        if ($data->getKilled() == null)
        {
            throw new SerializationError('killed must be provided.');
        }
        $writer->addChar((int) $data->getKilled());

        if ($data->getDirection() == null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->getDirection());

        if ($data->getPlayerId() == null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->getPlayerId());

        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->getDamage());

        if ($data->getHpPercentage() == null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->getHpPercentage());


    }

    /**
     * Deserializes an instance of `NpcUpdateAttack` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcUpdateAttack The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcUpdateAttack
    {
        $data = new NpcUpdateAttack();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setNpcIndex($reader->getChar());
            $data->setKilled($reader->getChar());
            $data->setDirection($reader->getChar());
            $data->setPlayerId($reader->getShort());
            $data->setDamage($reader->getThree());
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
        return "NpcUpdateAttack(byteSize=$this->byteSize, npcIndex=".var_export($this->npcIndex, true).", killed=".var_export($this->killed, true).", direction=".var_export($this->direction, true).", playerId=".var_export($this->playerId, true).", damage=".var_export($this->damage, true).", hpPercentage=".var_export($this->hpPercentage, true).")";
    }

}


