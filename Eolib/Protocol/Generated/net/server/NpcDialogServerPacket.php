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
use Eolib\Protocol\SerializationError;

/**
 * NPC chat message
 */


class NpcDialogServerPacket
{
    private $byteSize = 0;
    private int $npcIndex;
    private string $message = "";

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

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::NPC;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::DIALOG;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        NpcDialogServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `NpcDialogServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param NpcDialogServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, NpcDialogServerPacket $data): void {
        if ($data->npcIndex === null)
        {
            throw new SerializationError('npcIndex must be provided.');
        }
        $writer->addShort($data->npcIndex);

        if ($data->message === null)
        {
            throw new SerializationError('message must be provided.');
        }
        $writer->addString($data->message);


    }

    /**
     * Deserializes an instance of `NpcDialogServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return NpcDialogServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): NpcDialogServerPacket
    {
        $data = new NpcDialogServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->npcIndex = $reader->getShort();
            $data->message = $reader->getString();

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
        return "NpcDialogServerPacket(byteSize=' . $this->byteSize . '', npcIndex=' . $this->npcIndex . '', message=' . $this->message . ')";
    }

}



