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
use Eolib\Protocol\SerializationError;


class CharacterBaseStats
{
    private $byteSize = 0;
    private int $str;
    private int $intl;
    private int $wis;
    private int $agi;
    private int $con;
    private int $cha;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getStr(): int
    {
        return $this->str;
    }

    public function setStr(int $str): void
    {
        $this->str = $str;
    }

    public function getIntl(): int
    {
        return $this->intl;
    }

    public function setIntl(int $intl): void
    {
        $this->intl = $intl;
    }

    public function getWis(): int
    {
        return $this->wis;
    }

    public function setWis(int $wis): void
    {
        $this->wis = $wis;
    }

    public function getAgi(): int
    {
        return $this->agi;
    }

    public function setAgi(int $agi): void
    {
        $this->agi = $agi;
    }

    public function getCon(): int
    {
        return $this->con;
    }

    public function setCon(int $con): void
    {
        $this->con = $con;
    }

    public function getCha(): int
    {
        return $this->cha;
    }

    public function setCha(int $cha): void
    {
        $this->cha = $cha;
    }


    /**
     * Serializes an instance of `CharacterBaseStats` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterBaseStats $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterBaseStats $data): void {
        if ($data->str === null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addShort($data->str);

        if ($data->intl === null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addShort($data->intl);

        if ($data->wis === null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addShort($data->wis);

        if ($data->agi === null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addShort($data->agi);

        if ($data->con === null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addShort($data->con);

        if ($data->cha === null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addShort($data->cha);


    }

    /**
     * Deserializes an instance of `CharacterBaseStats` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterBaseStats The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterBaseStats
    {
        $data = new CharacterBaseStats();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->str = $reader->getShort();
            $data->intl = $reader->getShort();
            $data->wis = $reader->getShort();
            $data->agi = $reader->getShort();
            $data->con = $reader->getShort();
            $data->cha = $reader->getShort();

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
        return "CharacterBaseStats(byteSize=' . $this->byteSize . '', str=' . $this->str . '', intl=' . $this->intl . '', wis=' . $this->wis . '', agi=' . $this->agi . '', con=' . $this->con . '', cha=' . $this->cha . ')";
    }

}


