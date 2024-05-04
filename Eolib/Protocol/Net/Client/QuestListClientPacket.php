<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\QuestPage;
use Eolib\Protocol\SerializationError;

/**
 * Quest history / progress request
 */


class QuestListClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $page;

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
    public function getPage(): int
    {
        return $this->page;
    }

    /** @param int $page */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::QUEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::LIST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        QuestListClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestListClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestListClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestListClientPacket $data): void {
        if ($data->getPage() == null)
        {
            throw new SerializationError('page must be provided.');
        }
        $writer->addChar((int) $data->getPage());


    }

    /**
     * Deserializes an instance of `QuestListClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestListClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestListClientPacket
    {
        $data = new QuestListClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setPage($reader->getChar());

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
        return "QuestListClientPacket(byteSize=$this->byteSize, page=".var_export($this->page, true).")";
    }

}



