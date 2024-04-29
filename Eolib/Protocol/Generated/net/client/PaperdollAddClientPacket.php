<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Equipping an item
 */


class PaperdollAddClientPacket
{
    private $byteSize = 0;
    private int $itemId;
    private int $subLoc;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getSubLoc(): int
    {
        return $this->subLoc;
    }

    public function setSubLoc(int $subLoc): void
    {
        $this->subLoc = $subLoc;
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
        return PacketAction::ADD;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PaperdollAddClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PaperdollAddClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PaperdollAddClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PaperdollAddClientPacket $data): void {
        if ($data->itemId === null)
        {
            throw new SerializationError('itemId must be provided.');
        }
        $writer->addShort($data->itemId);

        if ($data->subLoc === null)
        {
            throw new SerializationError('subLoc must be provided.');
        }
        $writer->addChar($data->subLoc);


    }

    /**
     * Deserializes an instance of `PaperdollAddClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PaperdollAddClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PaperdollAddClientPacket
    {
        $data = new PaperdollAddClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemId = $reader->getShort();
            $data->subLoc = $reader->getChar();

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
        return "PaperdollAddClientPacket(byteSize=' . $this->byteSize . '', itemId=' . $this->itemId . '', subLoc=' . $this->subLoc . ')";
    }

}



