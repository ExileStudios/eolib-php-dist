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
use Eolib\Protocol\SerializationError;

/**
 * Reply to requesting a book
 */


class BookReplyServerPacket
{
    private int $byteSize = 0;
    /** @var CharacterDetails */
    private CharacterDetails $details;
    /** @var int */
    private int $icon;
    /** @var string[] */
    public array $questNames = [];

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



    /** @return string[] */
    public function getQuestNames(): array
    {
        return $this->questNames;
    }

    /** @param string[] $questNames */
    public function setQuestNames(array $questNames): void
    {
        $this->questNames = $questNames;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BOOK;
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
        BookReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BookReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BookReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BookReplyServerPacket $data): void {
        if ($data->getDetails() == null)
        {
            throw new SerializationError('details must be provided.');
        }
        CharacterDetails::serialize($writer, $data->getDetails());

        if ($data->getIcon() == null)
        {
            throw new SerializationError('icon must be provided.');
        }
        $writer->addChar((int) $data->getIcon());

        $writer->addByte(0xFF);
        if ($data->getQuestNames() == null)
        {
            throw new SerializationError('questNames must be provided.');
        }
        for ($i = 0; $i < count($data->questNames); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getQuestNames()[$i]);

        }

    }

    /**
     * Deserializes an instance of `BookReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BookReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BookReplyServerPacket
    {
        $data = new BookReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setDetails(CharacterDetails::deserialize($reader));
            $data->setIcon($reader->getChar());
            $reader->nextChunk();
            $data->questNames = [];
            while ($reader->getRemaining() > 0)
            {
                $data->questNames[] = $reader->getString();
                $reader->nextChunk();
            }
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
        return "BookReplyServerPacket(byteSize=$this->byteSize, details=".var_export($this->details, true).", icon=".var_export($this->icon, true).", questNames=".var_export($this->questNames, true).")";
    }

}



