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


class CharacterElementalStats
{
    private int $byteSize = 0;
    /** @var int */
    private int $light;
    /** @var int */
    private int $dark;
    /** @var int */
    private int $fire;
    /** @var int */
    private int $water;
    /** @var int */
    private int $earth;
    /** @var int */
    private int $wind;

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
    public function getLight(): int
    {
        return $this->light;
    }

    /** @param int $light */
    public function setLight(int $light): void
    {
        $this->light = $light;
    }



    /** @return int */
    public function getDark(): int
    {
        return $this->dark;
    }

    /** @param int $dark */
    public function setDark(int $dark): void
    {
        $this->dark = $dark;
    }



    /** @return int */
    public function getFire(): int
    {
        return $this->fire;
    }

    /** @param int $fire */
    public function setFire(int $fire): void
    {
        $this->fire = $fire;
    }



    /** @return int */
    public function getWater(): int
    {
        return $this->water;
    }

    /** @param int $water */
    public function setWater(int $water): void
    {
        $this->water = $water;
    }



    /** @return int */
    public function getEarth(): int
    {
        return $this->earth;
    }

    /** @param int $earth */
    public function setEarth(int $earth): void
    {
        $this->earth = $earth;
    }



    /** @return int */
    public function getWind(): int
    {
        return $this->wind;
    }

    /** @param int $wind */
    public function setWind(int $wind): void
    {
        $this->wind = $wind;
    }




    /**
     * Serializes an instance of `CharacterElementalStats` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param CharacterElementalStats $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, CharacterElementalStats $data): void {
        if ($data->getLight() == null)
        {
            throw new SerializationError('light must be provided.');
        }
        $writer->addShort($data->getLight());

        if ($data->getDark() == null)
        {
            throw new SerializationError('dark must be provided.');
        }
        $writer->addShort($data->getDark());

        if ($data->getFire() == null)
        {
            throw new SerializationError('fire must be provided.');
        }
        $writer->addShort($data->getFire());

        if ($data->getWater() == null)
        {
            throw new SerializationError('water must be provided.');
        }
        $writer->addShort($data->getWater());

        if ($data->getEarth() == null)
        {
            throw new SerializationError('earth must be provided.');
        }
        $writer->addShort($data->getEarth());

        if ($data->getWind() == null)
        {
            throw new SerializationError('wind must be provided.');
        }
        $writer->addShort($data->getWind());


    }

    /**
     * Deserializes an instance of `CharacterElementalStats` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return CharacterElementalStats The deserialized data.
     */
    public static function deserialize(EoReader $reader): CharacterElementalStats
    {
        $data = new CharacterElementalStats();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setLight($reader->getShort());
            $data->setDark($reader->getShort());
            $data->setFire($reader->getShort());
            $data->setWater($reader->getShort());
            $data->setEarth($reader->getShort());
            $data->setWind($reader->getShort());

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
        return "CharacterElementalStats(byteSize=$this->byteSize, light=".var_export($this->light, true).", dark=".var_export($this->dark, true).", fire=".var_export($this->fire, true).", water=".var_export($this->water, true).", earth=".var_export($this->earth, true).", wind=".var_export($this->wind, true).")";
    }

}


