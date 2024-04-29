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
use Eolib\Protocol\Generated\Net\QuestPage;
use Eolib\Protocol\Generated\Net\server\QuestProgressEntry;
use Eolib\Protocol\SerializationError;

/**
 * Quest history / progress reply
 */


class QuestListServerPacket
{
    private $byteSize = 0;
    private int $page;
    private int $questsCount;
    private ?pageData $pageData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getQuestsCount(): int
    {
        return $this->questsCount;
    }

    public function setQuestsCount(int $questsCount): void
    {
        $this->questsCount = $questsCount;
    }

    public function pageData(): ?pageData
    {
        /**
         * QuestListServerPacket::PageData: Gets or sets the data associated with the `page` field.
         */
        return $this->pageData;
    }

    public function setPageData($pageData): void
    {
        $this->pageData = $pageData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::QUEST;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        QuestListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestListServerPacket $data): void {
        if ($data->page === null)
        {
            throw new SerializationError('page must be provided.');
        }
        $writer->addChar((int) $data->page);

        if ($data->questsCount === null)
        {
            throw new SerializationError('questsCount must be provided.');
        }
        $writer->addShort($data->questsCount);

        if ($data->page === QuestPage::PROGRESS)
        {
            if (!($data->pageData instanceof PageDataProgress))
            {
                throw new \Eolib\Protocol\SerializationError("Expected pageData to be of type PageDataProgress for page " . QuestPage($data->page)->name . ".");
            }
            PageDataProgress::serialize($writer, $data->pageData);
        }
        elseif ($data->page === QuestPage::HISTORY)
        {
            if (!($data->pageData instanceof PageDataHistory))
            {
                throw new \Eolib\Protocol\SerializationError("Expected pageData to be of type PageDataHistory for page " . QuestPage($data->page)->name . ".");
            }
            PageDataHistory::serialize($writer, $data->pageData);
        }

    }

    /**
     * Deserializes an instance of `QuestListServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return QuestListServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): QuestListServerPacket
    {
        $data = new QuestListServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->page = QuestPage($reader->getChar());
            $data->questsCount = $reader->getShort();
            if ($data->page === QuestPage::PROGRESS)
            {
                $data->pageData = PageDataProgress::deserialize($reader);
            }
            elseif ($data->page === QuestPage::HISTORY)
            {
                $data->pageData = PageDataHistory::deserialize($reader);
            }
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
        return "QuestListServerPacket(byteSize=' . $this->byteSize . '', page=' . $this->page . '', questsCount=' . $this->questsCount . '', pageData=' . $this->pageData . ')";
    }

}

/**
 * Data associated with different values of the `page` field.
 */
interface PageData {}

/**
 * Data associated with page value QuestPage::PROGRESS
 */

class PageDataProgress implements PageData
{
    private $byteSize = 0;
    private array $questProgressEntries;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getQuestProgressEntries(): array
    {
        return $this->questProgressEntries;
    }

    public function setQuestProgressEntries(array $questProgressEntries): void
    {
        $this->questProgressEntries = $questProgressEntries;
    }


    /**
     * Serializes an instance of `PageDataProgress` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PageDataProgress $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PageDataProgress $data): void {
        if ($data->questProgressEntries === null)
        {
            throw new SerializationError('questProgressEntries must be provided.');
        }
        for ($i = 0; $i < count($data->questProgressEntries); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            QuestProgressEntry::serialize($writer, $data->questProgressEntries[$i]);

        }

    }

    /**
     * Deserializes an instance of `PageDataProgress` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PageDataProgress The deserialized data.
     */
    public static function deserialize(EoReader $reader): PageDataProgress
    {
        $data = new PageDataProgress();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->questProgressEntries = [];
            while ($reader->remaining() > 0)
            {
                $data->questProgressEntries[] = QuestProgressEntry::deserialize($reader);
                $reader->nextChunk();
            }

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
        return "PageDataProgress(byteSize=' . $this->byteSize . '', questProgressEntries=' . $this->questProgressEntries . ')";
    }

}



/**
 * Data associated with page value QuestPage::HISTORY
 */

class PageDataHistory implements PageData
{
    private $byteSize = 0;
    private array $completedQuests = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCompletedQuests(): array
    {
        return $this->completedQuests;
    }

    public function setCompletedQuests(array $completedQuests): void
    {
        $this->completedQuests = $completedQuests;
    }


    /**
     * Serializes an instance of `PageDataHistory` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PageDataHistory $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PageDataHistory $data): void {
        if ($data->completedQuests === null)
        {
            throw new SerializationError('completedQuests must be provided.');
        }
        for ($i = 0; $i < count($data->completedQuests); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->completedQuests[$i]);

        }

    }

    /**
     * Deserializes an instance of `PageDataHistory` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PageDataHistory The deserialized data.
     */
    public static function deserialize(EoReader $reader): PageDataHistory
    {
        $data = new PageDataHistory();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->completedQuests = [];
            while ($reader->remaining() > 0)
            {
                $data->completedQuests[] = $reader->getString();
                $reader->nextChunk();
            }

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
        return "PageDataHistory(byteSize=' . $this->byteSize . '', completedQuests=' . $this->completedQuests . ')";
    }

}





