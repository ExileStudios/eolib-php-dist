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
use Eolib\Protocol\Net\Server\CharacterDetails;
use Eolib\Protocol\Net\Server\CharacterIcon;
use Eolib\Protocol\Net\Server\EquipmentPaperdoll;
use Eolib\Protocol\SerializationError;

/**
 * Reply to requesting a paperdoll
 */


class PaperdollReplyServerPacket
{
    private int $byteSize = 0;
    /** @var CharacterDetails */
    private CharacterDetails $details;
    /** @var EquipmentPaperdoll */
    private EquipmentPaperdoll $equipment;
    /** @var int */
    private int $icon;

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

    /** @return CharacterDetails */
    public function getDetails(): CharacterDetails
    {
        return $this->details;
    }

    /** @param CharacterDetails $details */
    public function setDetails(CharacterDetails $details): void
    {
        $this->details = $details;
    }



    /** @return EquipmentPaperdoll */
    public function getEquipment(): EquipmentPaperdoll
    {
        return $this->equipment;
    }

    /** @param EquipmentPaperdoll $equipment */
    public function setEquipment(EquipmentPaperdoll $equipment): void
    {
        $this->equipment = $equipment;
    }



    /** @return int */
    public function getIcon(): int
    {
        return $this->icon;
    }

    /** @param int $icon */
    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
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
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PaperdollReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PaperdollReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PaperdollReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PaperdollReplyServerPacket $data): void {
        if ($data->getDetails() == null)
        {
            throw new SerializationError('details must be provided.');
        }
        CharacterDetails::serialize($writer, $data->getDetails());

        if ($data->getEquipment() == null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentPaperdoll::serialize($writer, $data->getEquipment());

        if ($data->getIcon() == null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addChar((int) $data->getIcon());


    }

    /**
     * Deserializes an instance of `PaperdollReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PaperdollReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PaperdollReplyServerPacket
    {
        $data = new PaperdollReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setDetails(CharacterDetails::deserialize($reader));
            $data->setEquipment(EquipmentPaperdoll::deserialize($reader));
            $data->setIcon($reader->getChar());
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
        return "PaperdollReplyServerPacket(byteSize=$this->byteSize, details=".var_export($this->details, true).", equipment=".var_export($this->equipment, true).", icon=".var_export($this->icon, true).")";
    }

}



