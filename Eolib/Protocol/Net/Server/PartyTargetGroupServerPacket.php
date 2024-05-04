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
use Eolib\Protocol\Net\Server\PartyExpShare;
use Eolib\Protocol\SerializationError;

/**
 * Updated experience and level-ups from party experience
 */


class PartyTargetGroupServerPacket
{
    private int $byteSize = 0;
    /** @var PartyExpShare[] */
    public array $gains = [];

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

    /** @return PartyExpShare[] */
    public function getGains(): array
    {
        return $this->gains;
    }

    /** @param PartyExpShare[] $gains */
    public function setGains(array $gains): void
    {
        $this->gains = $gains;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::TARGETGROUP;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        PartyTargetGroupServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `PartyTargetGroupServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param PartyTargetGroupServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, PartyTargetGroupServerPacket $data): void {
        if ($data->getGains() == null)
        {
            throw new SerializationError('gains must be provided.');
        }
        for ($i = 0; $i < count($data->gains); $i++)
        {
            PartyExpShare::serialize($writer, $data->getGains()[$i]);

        }

    }

    /**
     * Deserializes an instance of `PartyTargetGroupServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return PartyTargetGroupServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): PartyTargetGroupServerPacket
    {
        $data = new PartyTargetGroupServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $gains_length = (int) $reader->getRemaining() / 7;
            $data->gains = [];
            for ($i = 0; $i < $gains_length; $i++)
            {
                $data->gains[] = PartyExpShare::deserialize($reader);
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
        return "PartyTargetGroupServerPacket(byteSize=$this->byteSize, gains=".var_export($this->gains, true).")";
    }

}



