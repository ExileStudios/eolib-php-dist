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


class CharacterElementalStats
{
    private $byteSize = 0;
    private int $light;
    private int $dark;
    private int $fire;
    private int $water;
    private int $earth;
    private int $wind;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getLight(): int
    {
        return $this->light;
    }

    public function setLight(int $light): void
    {
        $this->light = $light;
    }

    public function getDark(): int
    {
        return $this->dark;
    }

    public function setDark(int $dark): void
    {
        $this->dark = $dark;
    }

    public function getFire(): int
    {
        return $this->fire;
    }

    public function setFire(int $fire): void
    {
        $this->fire = $fire;
    }

    public function getWater(): int
    {
        return $this->water;
    }

    public function setWater(int $water): void
    {
        $this->water = $water;
    }

    public function getEarth(): int
    {
        return $this->earth;
    }

    public function setEarth(int $earth): void
    {
        $this->earth = $earth;
    }

    public function getWind(): int
    {
        return $this->wind;
    }

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
        if ($data->light === null)
        {
            throw new SerializationError('light must be provided.');
        }
        $writer->addShort($data->light);

        if ($data->dark === null)
        {
            throw new SerializationError('dark must be provided.');
        }
        $writer->addShort($data->dark);

        if ($data->fire === null)
        {
            throw new SerializationError('fire must be provided.');
        }
        $writer->addShort($data->fire);

        if ($data->water === null)
        {
            throw new SerializationError('water must be provided.');
        }
        $writer->addShort($data->water);

        if ($data->earth === null)
        {
            throw new SerializationError('earth must be provided.');
        }
        $writer->addShort($data->earth);

        if ($data->wind === null)
        {
            throw new SerializationError('wind must be provided.');
        }
        $writer->addShort($data->wind);


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
            $data->light = $reader->getShort();
            $data->dark = $reader->getShort();
            $data->fire = $reader->getShort();
            $data->water = $reader->getShort();
            $data->earth = $reader->getShort();
            $data->wind = $reader->getShort();

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
        return "CharacterElementalStats(byteSize=' . $this->byteSize . '', light=' . $this->light . '', dark=' . $this->dark . '', fire=' . $this->fire . '', water=' . $this->water . '', earth=' . $this->earth . '', wind=' . $this->wind . ')";
    }

}


