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
use Eolib\Protocol\Generated\Net\server\CharacterDetails;
use Eolib\Protocol\Generated\Net\server\CharacterIcon;
use Eolib\Protocol\Generated\Net\server\EquipmentPaperdoll;
use Eolib\Protocol\SerializationError;

/**
 * Reply to requesting a paperdoll
 */


class PaperdollReplyServerPacket
{
    private $byteSize = 0;
    private CharacterDetails $details;
    private EquipmentPaperdoll $equipment;
    private int $icon;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getDetails(): CharacterDetails
    {
        return $this->details;
    }

    public function setDetails(CharacterDetails $details): void
    {
        $this->details = $details;
    }

    public function getEquipment(): EquipmentPaperdoll
    {
        return $this->equipment;
    }

    public function setEquipment(EquipmentPaperdoll $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function getIcon(): int
    {
        return $this->icon;
    }

    public function setIcon(int $icon): void
    {
        $this->icon = $icon;
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
        if ($data->details === null)
        {
            throw new SerializationError('details must be provided.');
        }
        CharacterDetails::serialize($writer, $data->details);

        if ($data->equipment === null)
        {
            throw new SerializationError('equipment must be provided.');
        }
        EquipmentPaperdoll::serialize($writer, $data->equipment);

        if ($data->icon === null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addChar((int) $data->icon);


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
            $data->details = CharacterDetails::deserialize($reader);
            $data->equipment = EquipmentPaperdoll::deserialize($reader);
            $data->icon = CharacterIcon($reader->getChar());
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
        return "PaperdollReplyServerPacket(byteSize=' . $this->byteSize . '', details=' . $this->details . '', equipment=' . $this->equipment . '', icon=' . $this->icon . ')";
    }

}



