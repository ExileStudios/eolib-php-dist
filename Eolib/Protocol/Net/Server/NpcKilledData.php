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
use Eolib\Protocol\Coords;
use Eolib\Protocol\Direction;
use Eolib\Protocol\SerializationError;


class NpcKilledData
{
    private int $byteSize = 0;
    /** @var int */
    private int $killerId;
    /** @var int */
    private int $killerDirection;
    /** @var int */
    private int $npcIndex;
    /** @var int */
    private int $dropIndex;
    /** @var int */
    private int $dropId;
    /** @var Coords */
    private Coords $dropCoords;
    /** @var int */
    private int $dropAmount;
    /** @var int */
    private int $damage;

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
    public function getKillerId(): int
    {
        return $this->killerId;
    }

    /** @param int $killerId */
    public function setKillerId(int $killerId): void
    {
        $this->killerId = $killerId;
    }



    /** @return int */
    public function getKillerDirection(): int
    {
        return $this->killerDirection;
    }

    /** @param int $killerDirection */
    public function setKillerDirection(int $killerDirection): void
    {
        $this->killerDirection = $killerDirection;
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
    public function getDropIndex(): int
    {
        return $this->dropIndex;
    }

    /** @param int $dropIndex */
    public function setDropIndex(int $dropIndex): void
    {
        $this->dropIndex = $dropIndex;
    }



    /** @return int */
    public function getDropId(): int
    {
        return $this->dropId;
    }

    /** @param int $dropId */
    public function setDropId(int $dropId): void
    {
        $this->dropId = $dropId;
    }



    /** @return Coords */
    public function getDropCoords(): Coords
    {
        return $this->dropCoords;
    }

    /** @param Coords $dropCoords */
    public function setDropCoords(Coords $dropCoords): void
    {
        $this->dropCoords = $dropCoords;
    }



    /** @return int */
    public function getDropAmount(): int
    {
        return $this->dropAmount;
    }

    /** @param int $dropAmount */
    public function setDropAmount(int $dropAmount): void
    {
        $this->dropAmount = $dropAmount;
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




    /**
     * Serializes an instance of `NpcKilledData` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcKilledData $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcKilledData $data): void {
        if ($data->getKillerId() == null)
        {
            throw new SerializationError('killerId must be provided.');
        }
        $writer->addShort($data->getKillerId());

        if ($data->getKillerDirection() == null)
        {
            throw new SerializationError('killerDirection must be provided.');
        }
        $writer->addChar((int) $data->getKillerDirection());

        if ($data->getNpcIndex() == null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->getNpcIndex());

        if ($data->getDropIndex() == null)
        {
            throw new SerializationError('dropIndex must be provided.');
        }
        $writer->addShort($data->getDropIndex());

        if ($data->getDropId() == null)
        {
            throw new SerializationError('dropId must be provided.');
        }
        $writer->addShort($data->getDropId());

        if ($data->getDropCoords() == null)
        {
            throw new SerializationError('dropCoords must be provided.');
        }
        Coords::serialize($writer, $data->getDropCoords());

        if ($data->getDropAmount() == null)
        {
            throw new SerializationError('dropAmount must be provided.');
        }
        $writer->addInt($data->getDropAmount());

        if ($data->getDamage() == null)
        {
            throw new SerializationError('damage must be provided.');
        }
        $writer->addThree($data->getDamage());


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
            $data->setKillerId($reader->getShort());
            $data->setKillerDirection($reader->getChar());
            $data->setNpcIndex($reader->getShort());
            $data->setDropIndex($reader->getShort());
            $data->setDropId($reader->getShort());
            $data->setDropCoords(Coords::deserialize($reader));
            $data->setDropAmount($reader->getInt());
            $data->setDamage($reader->getThree());

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
        return "NpcKilledData(byteSize=$this->byteSize, killerId=".var_export($this->killerId, true).", killerDirection=".var_export($this->killerDirection, true).", npcIndex=".var_export($this->npcIndex, true).", dropIndex=".var_export($this->dropIndex, true).", dropId=".var_export($this->dropId, true).", dropCoords=".var_export($this->dropCoords, true).", dropAmount=".var_export($this->dropAmount, true).", damage=".var_export($this->damage, true).")";
    }

}


