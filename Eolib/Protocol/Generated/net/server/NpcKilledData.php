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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Direction;
use Eolib\Protocol\SerializationError;


class NpcKilledData
{
    private $byteSize = 0;
    private int $killerId;
    private int $killerDirection;
    private int $npcIndex;
    private int $dropIndex;
    private int $dropId;
    private Coords $dropCoords;
    private int $dropAmount;
    private int $damage;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getKillerId(): int
    {
        return $this->killerId;
    }

    public function setKillerId(int $killerId): void
    {
        $this->killerId = $killerId;
    }

    public function getKillerDirection(): int
    {
        return $this->killerDirection;
    }

    public function setKillerDirection(int $killerDirection): void
    {
        $this->killerDirection = $killerDirection;
    }

    public function getNpcIndex(): int
    {
        return $this->npcIndex;
    }

    public function setNpcIndex(int $npcIndex): void
    {
        $this->npcIndex = $npcIndex;
    }

    public function getDropIndex(): int
    {
        return $this->dropIndex;
    }

    public function setDropIndex(int $dropIndex): void
    {
        $this->dropIndex = $dropIndex;
    }

    public function getDropId(): int
    {
        return $this->dropId;
    }

    public function setDropId(int $dropId): void
    {
        $this->dropId = $dropId;
    }

    public function getDropCoords(): Coords
    {
        return $this->dropCoords;
    }

    public function setDropCoords(Coords $dropCoords): void
    {
        $this->dropCoords = $dropCoords;
    }

    public function getDropAmount(): int
    {
        return $this->dropAmount;
    }

    public function setDropAmount(int $dropAmount): void
    {
        $this->dropAmount = $dropAmount;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }


    /**
     * Serializes an instance of `NpcKilledData` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcKilledData $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcKilledData $data): void {
        if ($data->killerId === null)
        {
            throw new SerializationError('killerId must be provided.');
        }
        $writer->addShort($data->killerId);

        if ($data->killerDirection === null)
        {
            throw new SerializationError('killerDirection must be provided.');
        }
        $writer->addChar((int) $data->killerDirection);

        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->npcIndex);

        if ($data->dropIndex === null)
        {
            throw new SerializationError('dropIndex must be provided.');
        }
        $writer->addShort($data->dropIndex);

        if ($data->dropId === null)
        {
            throw new SerializationError('dropId must be provided.');
        }
        $writer->addShort($data->dropId);

        if ($data->dropCoords === null)
        {
            throw new SerializationError('dropCoords must be provided.');
        }
        Coords::serialize($writer, $data->dropCoords);

        if ($data->dropAmount === null)
        {
            throw new SerializationError('dropAmount must be provided.');
        }
        $writer->addInt($data->dropAmount);

        if ($data->damage === null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->damage);


    }

    /**
     * Deserializes an instance of `NpcKilledData` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcKilledData The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcKilledData
    {
        $data = new NpcKilledData();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->killerId = $reader->getShort();
            $data->killerDirection = Direction($reader->getChar());
            $data->npcIndex = $reader->getShort();
            $data->dropIndex = $reader->getShort();
            $data->dropId = $reader->getShort();
            $data->dropCoords = Coords::deserialize($reader);
            $data->dropAmount = $reader->getInt();
            $data->damage = $reader->getThree();

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
        return "NpcKilledData(byteSize=' . $this->byteSize . '', killerId=' . $this->killerId . '', killerDirection=' . $this->killerDirection . '', npcIndex=' . $this->npcIndex . '', dropIndex=' . $this->dropIndex . '', dropId=' . $this->dropId . '', dropCoords=' . $this->dropCoords . '', dropAmount=' . $this->dropAmount . '', damage=' . $this->damage . ')";
    }

}


