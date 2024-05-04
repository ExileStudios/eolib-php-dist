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
use Eolib\Protocol\Net\Server\AvatarChange;
use Eolib\Protocol\Net\Server\CharacterStatsEquipmentChange;
use Eolib\Protocol\SerializationError;

/**
 * Reply to unequipping an item
 */


class PaperdollRemoveServerPacket
{
    private int $byteSize = 0;
    /** @var AvatarChange */
    private AvatarChange $change;
    /** @var int */
    private int $itemId;
    /** @var int */
    private int $subLoc;
    /** @var CharacterStatsEquipmentChange */
    private CharacterStatsEquipmentChange $stats;

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

    /** @return AvatarChange */
    public function getChange(): AvatarChange
    {
        return $this->change;
    }

    /** @param AvatarChange $change */
    public function setChange(AvatarChange $change): void
    {
        $this->change = $change;
    }



    /** @return int */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /** @param int $itemId */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }



    /** @return int */
    public function getSubLoc(): int
    {
        return $this->subLoc;
    }

    /** @param int $subLoc */
    public function setSubLoc(int $subLoc): void
    {
        $this->subLoc = $subLoc;
    }



    /** @return CharacterStatsEquipmentChange */
    public function getStats(): CharacterStatsEquipmentChange
    {
        return $this->stats;
    }

    /** @param CharacterStatsEquipmentChange $stats */
    public function setStats(CharacterStatsEquipmentChange $stats): void
    {
        $this->stats = $stats;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PAPERDOLL;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REMOVE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PaperdollRemoveServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PaperdollRemoveServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PaperdollRemoveServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PaperdollRemoveServerPacket $data): void {
        if ($data->getChange() == null)
        {
            throw new SerializationError('change must be provided.');
        }
        AvatarChange::serialize($writer, $data->getChange());

        if ($data->getItemId() == null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->getItemId());

        if ($data->getSubLoc() == null)
        {
            throw new SerializationError('subLoc must be provided.');
        }
        $writer->addChar($data->getSubLoc());

        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsEquipmentChange::serialize($writer, $data->getStats());


    }

    /**
     * Deserializes an instance of `PaperdollRemoveServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PaperdollRemoveServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PaperdollRemoveServerPacket
    {
        $data = new PaperdollRemoveServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setChange(AvatarChange::deserialize($reader));
            $data->setItemId($reader->getShort());
            $data->setSubLoc($reader->getChar());
            $data->setStats(CharacterStatsEquipmentChange::deserialize($reader));

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
        return "PaperdollRemoveServerPacket(byteSize=$this->byteSize, change=".var_export($this->change, true).", itemId=".var_export($this->itemId, true).", subLoc=".var_export($this->subLoc, true).", stats=".var_export($this->stats, true).")";
    }

}



