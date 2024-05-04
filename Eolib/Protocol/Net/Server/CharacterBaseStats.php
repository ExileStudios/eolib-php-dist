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
use Eolib\Protocol\SerializationError;


class CharacterBaseStats
{
    private int $byteSize = 0;
    /** @var int */
    private int $str;
    /** @var int */
    private int $intl;
    /** @var int */
    private int $wis;
    /** @var int */
    private int $agi;
    /** @var int */
    private int $con;
    /** @var int */
    private int $cha;

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
    public function getStr(): int
    {
        return $this->str;
    }

    /** @param int $str */
    public function setStr(int $str): void
    {
        $this->str = $str;
    }



    /** @return int */
    public function getIntl(): int
    {
        return $this->intl;
    }

    /** @param int $intl */
    public function setIntl(int $intl): void
    {
        $this->intl = $intl;
    }



    /** @return int */
    public function getWis(): int
    {
        return $this->wis;
    }

    /** @param int $wis */
    public function setWis(int $wis): void
    {
        $this->wis = $wis;
    }



    /** @return int */
    public function getAgi(): int
    {
        return $this->agi;
    }

    /** @param int $agi */
    public function setAgi(int $agi): void
    {
        $this->agi = $agi;
    }



    /** @return int */
    public function getCon(): int
    {
        return $this->con;
    }

    /** @param int $con */
    public function setCon(int $con): void
    {
        $this->con = $con;
    }



    /** @return int */
    public function getCha(): int
    {
        return $this->cha;
    }

    /** @param int $cha */
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
        if ($data->getStr() == null)
        {
            throw new SerializationError('str must be provided.');
        }
        $writer->addShort($data->getStr());

        if ($data->getIntl() == null)
        {
            throw new SerializationError('intl must be provided.');
        }
        $writer->addShort($data->getIntl());

        if ($data->getWis() == null)
        {
            throw new SerializationError('wis must be provided.');
        }
        $writer->addShort($data->getWis());

        if ($data->getAgi() == null)
        {
            throw new SerializationError('agi must be provided.');
        }
        $writer->addShort($data->getAgi());

        if ($data->getCon() == null)
        {
            throw new SerializationError('con must be provided.');
        }
        $writer->addShort($data->getCon());

        if ($data->getCha() == null)
        {
            throw new SerializationError('cha must be provided.');
        }
        $writer->addShort($data->getCha());


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
            $data->setStr($reader->getShort());
            $data->setIntl($reader->getShort());
            $data->setWis($reader->getShort());
            $data->setAgi($reader->getShort());
            $data->setCon($reader->getShort());
            $data->setCha($reader->getShort());

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
        return "CharacterBaseStats(byteSize=$this->byteSize, str=".var_export($this->str, true).", intl=".var_export($this->intl, true).", wis=".var_export($this->wis, true).", agi=".var_export($this->agi, true).", con=".var_export($this->con, true).", cha=".var_export($this->cha, true).")";
    }

}


