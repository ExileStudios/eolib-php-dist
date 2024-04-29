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
use Eolib\Protocol\Generated\Net\server\PartyExpShare;
use Eolib\Protocol\SerializationError;

/**
 * Updated experience and level-ups from party experience
 */


class PartyTargetGroupServerPacket
{
    private $byteSize = 0;
    private array $gains;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getGains(): array
    {
        return $this->gains;
    }

    public function setGains(array $gains): void
    {
        $this->gains = $gains;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::PARTY;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
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
        if ($data->gains === null)
        {
            throw new SerializationError('gains must be provided.');
        }
        for ($i = 0; $i < count($data->gains); $i++)
        {
            PartyExpShare::serialize($writer, $data->gains[$i]);

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
            $gains_length = (int) $reader->remaining() / 7;
            $data->gains = [];
            for ($i = 0; $i < $gains_length; $i++)
            {
                $data->gains[] = PartyExpShare::deserialize($reader);
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
        return "PartyTargetGroupServerPacket(byteSize=' . $this->byteSize . '', gains=' . $this->gains . ')";
    }

}



