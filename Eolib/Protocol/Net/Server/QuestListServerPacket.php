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
use Eolib\Protocol\Net\QuestPage;
use Eolib\Protocol\Net\Server\QuestProgressEntry;
use Eolib\Protocol\SerializationError;

/**
 * Quest history / progress reply
 */


class QuestListServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $page;
    /** @var int */
    private int $questsCount;
    private ?PageData $pageData = null;

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



    /** @return int */
    public function getQuestsCount(): int
    {
        return $this->questsCount;
    }

    /** @param int $questsCount */
    public function setQuestsCount(int $questsCount): void
    {
        $this->questsCount = $questsCount;
    }



    public function getPageData(): ?PageData
    {
        /**
         * QuestListServerPacket::PageData: Gets or sets the data associated with the `page` field.
         */
        return $this->pageData;
    }

    public function setPageData(?PageData $pageData): void
    {
        $this->pageData = $pageData;
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
        QuestListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `QuestListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param QuestListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, QuestListServerPacket $data): void {
        if ($data->getPage() == null)
        {
            throw new SerializationError('page must be provided.');
        }
        $writer->addChar((int) $data->getPage());

        if ($data->getQuestsCount() == null)
        {
            throw new SerializationError('questsCount must be provided.');
        }
        $writer->addShort($data->getQuestsCount());

        if ($data->page === QuestPage::PROGRESS)
        {
            if (!($data->pageData instanceof PageDataProgress))
            {
                throw new \Eolib\Protocol\SerializationError("Expected pageData to be of type PageDataProgress for page " . $data->page . ".");
            }
            PageDataProgress::serialize($writer, $data->getPageData());
        }
        elseif ($data->page === QuestPage::HISTORY)
        {
            if (!($data->pageData instanceof PageDataHistory))
            {
                throw new \Eolib\Protocol\SerializationError("Expected pageData to be of type PageDataHistory for page " . $data->page . ".");
            }
            PageDataHistory::serialize($writer, $data->getPageData());
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
            $data->setPage($reader->getChar());
            $data->setQuestsCount($reader->getShort());
            if ($data->page === QuestPage::PROGRESS)
            {
                $data->setPageData(PageDataProgress::deserialize($reader));
            }
            elseif ($data->page === QuestPage::HISTORY)
            {
                $data->setPageData(PageDataHistory::deserialize($reader));
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
        return "QuestListServerPacket(byteSize=$this->byteSize, page=".var_export($this->page, true).", questsCount=".var_export($this->questsCount, true).", pageData=".var_export($this->pageData, true).")";
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
    private int $byteSize = 0;
    /** @var QuestProgressEntry[] */
    public array $questProgressEntries = [];

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

    /** @return QuestProgressEntry[] */
    public function getQuestProgressEntries(): array
    {
        return $this->questProgressEntries;
    }

    /** @param QuestProgressEntry[] $questProgressEntries */
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
        if ($data->getQuestProgressEntries() == null)
        {
            throw new SerializationError('questProgressEntries must be provided.');
        }
        for ($i = 0; $i < count($data->questProgressEntries); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            QuestProgressEntry::serialize($writer, $data->getQuestProgressEntries()[$i]);

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
            while ($reader->getRemaining() > 0)
            {
                $data->questProgressEntries[] = QuestProgressEntry::deserialize($reader);
                $reader->nextChunk();
            }

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
        return "PageDataProgress(byteSize=$this->byteSize, questProgressEntries=".var_export($this->questProgressEntries, true).")";
    }

}



/**
 * Data associated with page value QuestPage::HISTORY
 */

class PageDataHistory implements PageData
{
    private int $byteSize = 0;
    /** @var string[] */
    public array $completedQuests = [];

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

    /** @return string[] */
    public function getCompletedQuests(): array
    {
        return $this->completedQuests;
    }

    /** @param string[] $completedQuests */
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
        if ($data->getCompletedQuests() == null)
        {
            throw new SerializationError('completedQuests must be provided.');
        }
        for ($i = 0; $i < count($data->completedQuests); $i++)
        {
            if ($i > 0)
            {
                $writer->addByte(0xFF);
            }
            $writer->addString($data->getCompletedQuests()[$i]);

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
            while ($reader->getRemaining() > 0)
            {
                $data->completedQuests[] = $reader->getString();
                $reader->nextChunk();
            }

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
        return "PageDataHistory(byteSize=$this->byteSize, completedQuests=".var_export($this->completedQuests, true).")";
    }

}





