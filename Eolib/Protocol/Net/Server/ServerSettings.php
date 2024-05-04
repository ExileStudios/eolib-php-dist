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
use Eolib\Protocol\Coords;
use Eolib\Protocol\SerializationError;


class ServerSettings
{
    private int $byteSize = 0;
    /** @var int */
    private int $jailMap;
    /** @var int */
    private int $rescueMap;
    /** @var Coords */
    private Coords $rescueCoords;
    /** @var int */
    private int $spyAndLightGuideFloodRate;
    /** @var int */
    private int $guardianFloodRate;
    /** @var int */
    private int $gameMasterFloodRate;
    /** @var int */
    private int $highGameMasterFloodRate;

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
    public function getJailMap(): int
    {
        return $this->jailMap;
    }

    /** @param int $jailMap */
    public function setJailMap(int $jailMap): void
    {
        $this->jailMap = $jailMap;
    }



    /** @return int */
    public function getRescueMap(): int
    {
        return $this->rescueMap;
    }

    /** @param int $rescueMap */
    public function setRescueMap(int $rescueMap): void
    {
        $this->rescueMap = $rescueMap;
    }



    /** @return Coords */
    public function getRescueCoords(): Coords
    {
        return $this->rescueCoords;
    }

    /** @param Coords $rescueCoords */
    public function setRescueCoords(Coords $rescueCoords): void
    {
        $this->rescueCoords = $rescueCoords;
    }



    /** @return int */
    public function getSpyAndLightGuideFloodRate(): int
    {
        return $this->spyAndLightGuideFloodRate;
    }

    /** @param int $spyAndLightGuideFloodRate */
    public function setSpyAndLightGuideFloodRate(int $spyAndLightGuideFloodRate): void
    {
        $this->spyAndLightGuideFloodRate = $spyAndLightGuideFloodRate;
    }



    /** @return int */
    public function getGuardianFloodRate(): int
    {
        return $this->guardianFloodRate;
    }

    /** @param int $guardianFloodRate */
    public function setGuardianFloodRate(int $guardianFloodRate): void
    {
        $this->guardianFloodRate = $guardianFloodRate;
    }



    /** @return int */
    public function getGameMasterFloodRate(): int
    {
        return $this->gameMasterFloodRate;
    }

    /** @param int $gameMasterFloodRate */
    public function setGameMasterFloodRate(int $gameMasterFloodRate): void
    {
        $this->gameMasterFloodRate = $gameMasterFloodRate;
    }



    /** @return int */
    public function getHighGameMasterFloodRate(): int
    {
        return $this->highGameMasterFloodRate;
    }

    /** @param int $highGameMasterFloodRate */
    public function setHighGameMasterFloodRate(int $highGameMasterFloodRate): void
    {
        $this->highGameMasterFloodRate = $highGameMasterFloodRate;
    }




    /**
     * Serializes an instance of `ServerSettings` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ServerSettings $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ServerSettings $data): void {
        if ($data->getJailMap() == null)
        {
            throw new SerializationError('jailMap must be provided.');
        }
        $writer->addShort($data->getJailMap());

        if ($data->getRescueMap() == null)
        {
            throw new SerializationError('rescueMap must be provided.');
        }
        $writer->addShort($data->getRescueMap());

        if ($data->getRescueCoords() == null)
        {
            throw new SerializationError('rescueCoords must be provided.');
        }
        Coords::serialize($writer, $data->getRescueCoords());

        if ($data->getSpyAndLightGuideFloodRate() == null)
        {
            throw new SerializationError('spyAndLightGuideFloodRate must be provided.');
        }
        $writer->addShort($data->getSpyAndLightGuideFloodRate());

        if ($data->getGuardianFloodRate() == null)
        {
            throw new SerializationError('guardianFloodRate must be provided.');
        }
        $writer->addShort($data->getGuardianFloodRate());

        if ($data->getGameMasterFloodRate() == null)
        {
            throw new SerializationError('gameMasterFloodRate must be provided.');
        }
        $writer->addShort($data->getGameMasterFloodRate());

        if ($data->getHighGameMasterFloodRate() == null)
        {
            throw new SerializationError('highGameMasterFloodRate must be provided.');
        }
        $writer->addShort($data->getHighGameMasterFloodRate());


    }

    /**
     * Deserializes an instance of `ServerSettings` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ServerSettings The deserialized data.
     */
    public static function deserialize(EoReader $reader): ServerSettings
    {
        $data = new ServerSettings();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setJailMap($reader->getShort());
            $data->setRescueMap($reader->getShort());
            $data->setRescueCoords(Coords::deserialize($reader));
            $data->setSpyAndLightGuideFloodRate($reader->getShort());
            $data->setGuardianFloodRate($reader->getShort());
            $data->setGameMasterFloodRate($reader->getShort());
            $data->setHighGameMasterFloodRate($reader->getShort());

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
        return "ServerSettings(byteSize=$this->byteSize, jailMap=".var_export($this->jailMap, true).", rescueMap=".var_export($this->rescueMap, true).", rescueCoords=".var_export($this->rescueCoords, true).", spyAndLightGuideFloodRate=".var_export($this->spyAndLightGuideFloodRate, true).", guardianFloodRate=".var_export($this->guardianFloodRate, true).", gameMasterFloodRate=".var_export($this->gameMasterFloodRate, true).", highGameMasterFloodRate=".var_export($this->highGameMasterFloodRate, true).")";
    }

}


