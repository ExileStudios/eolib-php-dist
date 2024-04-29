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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\SerializationError;


class ServerSettings
{
    private $byteSize = 0;
    private int $jailMap;
    private int $rescueMap;
    private Coords $rescueCoords;
    private int $spyAndLightGuideFloodRate;
    private int $guardianFloodRate;
    private int $gameMasterFloodRate;
    private int $highGameMasterFloodRate;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getJailMap(): int
    {
        return $this->jailMap;
    }

    public function setJailMap(int $jailMap): void
    {
        $this->jailMap = $jailMap;
    }

    public function getRescueMap(): int
    {
        return $this->rescueMap;
    }

    public function setRescueMap(int $rescueMap): void
    {
        $this->rescueMap = $rescueMap;
    }

    public function getRescueCoords(): Coords
    {
        return $this->rescueCoords;
    }

    public function setRescueCoords(Coords $rescueCoords): void
    {
        $this->rescueCoords = $rescueCoords;
    }

    public function getSpyAndLightGuideFloodRate(): int
    {
        return $this->spyAndLightGuideFloodRate;
    }

    public function setSpyAndLightGuideFloodRate(int $spyAndLightGuideFloodRate): void
    {
        $this->spyAndLightGuideFloodRate = $spyAndLightGuideFloodRate;
    }

    public function getGuardianFloodRate(): int
    {
        return $this->guardianFloodRate;
    }

    public function setGuardianFloodRate(int $guardianFloodRate): void
    {
        $this->guardianFloodRate = $guardianFloodRate;
    }

    public function getGameMasterFloodRate(): int
    {
        return $this->gameMasterFloodRate;
    }

    public function setGameMasterFloodRate(int $gameMasterFloodRate): void
    {
        $this->gameMasterFloodRate = $gameMasterFloodRate;
    }

    public function getHighGameMasterFloodRate(): int
    {
        return $this->highGameMasterFloodRate;
    }

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
        if ($data->jailMap === null)
        {
            throw new SerializationError('jailMap must be provided.');
        }
        $writer->addShort($data->jailMap);

        if ($data->rescueMap === null)
        {
            throw new SerializationError('rescueMap must be provided.');
        }
        $writer->addShort($data->rescueMap);

        if ($data->rescueCoords === null)
        {
            throw new SerializationError('rescueCoords must be provided.');
        }
        Coords::serialize($writer, $data->rescueCoords);

        if ($data->spyAndLightGuideFloodRate === null)
        {
            throw new SerializationError('spyAndLightGuideFloodRate must be provided.');
        }
        $writer->addShort($data->spyAndLightGuideFloodRate);

        if ($data->guardianFloodRate === null)
        {
            throw new SerializationError('guardianFloodRate must be provided.');
        }
        $writer->addShort($data->guardianFloodRate);

        if ($data->gameMasterFloodRate === null)
        {
            throw new SerializationError('gameMasterFloodRate must be provided.');
        }
        $writer->addShort($data->gameMasterFloodRate);

        if ($data->highGameMasterFloodRate === null)
        {
            throw new SerializationError('highGameMasterFloodRate must be provided.');
        }
        $writer->addShort($data->highGameMasterFloodRate);


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
            $data->jailMap = $reader->getShort();
            $data->rescueMap = $reader->getShort();
            $data->rescueCoords = Coords::deserialize($reader);
            $data->spyAndLightGuideFloodRate = $reader->getShort();
            $data->guardianFloodRate = $reader->getShort();
            $data->gameMasterFloodRate = $reader->getShort();
            $data->highGameMasterFloodRate = $reader->getShort();

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
        return "ServerSettings(byteSize=' . $this->byteSize . '', jailMap=' . $this->jailMap . '', rescueMap=' . $this->rescueMap . '', rescueCoords=' . $this->rescueCoords . '', spyAndLightGuideFloodRate=' . $this->spyAndLightGuideFloodRate . '', guardianFloodRate=' . $this->guardianFloodRate . '', gameMasterFloodRate=' . $this->gameMasterFloodRate . '', highGameMasterFloodRate=' . $this->highGameMasterFloodRate . ')";
    }

}


