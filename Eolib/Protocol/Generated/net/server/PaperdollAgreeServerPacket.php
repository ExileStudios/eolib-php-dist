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
use Eolib\Protocol\Generated\Net\server\AvatarChange;
use Eolib\Protocol\Generated\Net\server\CharacterStatsEquipmentChange;
use Eolib\Protocol\SerializationError;

/**
 * Reply to equipping an item
 */


class PaperdollAgreeServerPacket
{
    private $byteSize = 0;
    private AvatarChange $change;
    private int $itemId;
    private int $remainingAmount;
    private int $subLoc;
    private CharacterStatsEquipmentChange $stats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getChange(): AvatarChange
    {
        return $this->change;
    }

    public function setChange(AvatarChange $change): void
    {
        $this->change = $change;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getRemainingAmount(): int
    {
        return $this->remainingAmount;
    }

    public function setRemainingAmount(int $remainingAmount): void
    {
        $this->remainingAmount = $remainingAmount;
    }

    public function getSubLoc(): int
    {
        return $this->subLoc;
    }

    public function setSubLoc(int $subLoc): void
    {
        $this->subLoc = $subLoc;
    }

    public function getStats(): CharacterStatsEquipmentChange
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsEquipmentChange $stats): void
    {
        $this->stats = $stats;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PAPERDOLL;
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
        PaperdollAgreeServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PaperdollAgreeServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PaperdollAgreeServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PaperdollAgreeServerPacket $data): void {
        if ($data->change === null)
        {
            throw new SerializationError('change must be provided.');
        }
        AvatarChange::serialize($writer, $data->change);

        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->remainingAmount === null)
        {
            throw new SerializationError('remainingAmount must be provided.');
        }
        $writer->addThree($data->remainingAmount);

        if ($data->subLoc === null)
        {
            throw new SerializationError('subLoc must be provided.');
        }
        $writer->addChar($data->subLoc);

        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsEquipmentChange::serialize($writer, $data->stats);


    }

    /**
     * Deserializes an instance of `PaperdollAgreeServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PaperdollAgreeServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PaperdollAgreeServerPacket
    {
        $data = new PaperdollAgreeServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->change = AvatarChange::deserialize($reader);
            $data->itemId = $reader->getShort();
            $data->remainingAmount = $reader->getThree();
            $data->subLoc = $reader->getChar();
            $data->stats = CharacterStatsEquipmentChange::deserialize($reader);

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
        return "PaperdollAgreeServerPacket(byteSize=' . $this->byteSize . '', change=' . $this->change . '', itemId=' . $this->itemId . '', remainingAmount=' . $this->remainingAmount . '', subLoc=' . $this->subLoc . '', stats=' . $this->stats . ')";
    }

}



