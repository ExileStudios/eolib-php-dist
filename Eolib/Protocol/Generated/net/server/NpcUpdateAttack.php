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
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\Generated\Net\server\PlayerKilledState;
use Eolib\Protocol\SerializationError;


class NpcUpdateAttack
{
    private $byteSize = 0;
    private int $npcIndex;
    private int $killed;
    private int $direction;
    private int $playerId;
    private int $damage;
    private int $hpPercentage;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }

    public function getKilled(): int
    {
        return $this->killed;
    }

    public function setKilled(int $killed): void
    {
        $this->killed = $killed;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }

    public function setDirection(int $direction): void
    {
        $this->direction = $direction;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
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
     * Serializes an instance of `NpcUpdateAttack` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcUpdateAttack $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcUpdateAttack $data): void {
        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addChar($data->npcIndex);

        if ($data->killed === null)
        {
            throw new SerializationError('killed must be provided.');
        }
        $writer->addChar((int) $data->killed);

        if ($data->direction === null)
        {
            throw new SerializationError('direction must be provided.');
        }
        $writer->addChar((int) $data->direction);

        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);

        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->damage);

        if ($data->hpPercentage === null)
        {
            throw new SerializationError('hpPercentage must be provided.');
        }
        $writer->addChar($data->hpPercentage);


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
            $data->npcIndex = $reader->getChar();
            $data->killed = PlayerKilledState($reader->getChar());
            $data->direction = Direction($reader->getChar());
            $data->playerId = $reader->getShort();
            $data->damage = $reader->getThree();
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
        return "NpcUpdateAttack(byteSize=' . $this->byteSize . '', npcIndex=' . $this->npcIndex . '', killed=' . $this->killed . '', direction=' . $this->direction . '', playerId=' . $this->playerId . '', damage=' . $this->damage . '', hpPercentage=' . $this->hpPercentage . ')";
    }

}


