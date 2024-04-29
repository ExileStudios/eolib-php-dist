<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Confirm initialization data
 */


class ConnectionAcceptClientPacket
{
    private $byteSize = 0;
    private int $clientEncryptionMultiple;
    private int $serverEncryptionMultiple;
    private int $playerId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getClientEncryptionMultiple(): int
    {
        return $this->clientEncryptionMultiple;
    }

    public function setClientEncryptionMultiple(int $clientEncryptionMultiple): void
    {
        $this->clientEncryptionMultiple = $clientEncryptionMultiple;
    }

    public function getServerEncryptionMultiple(): int
    {
        return $this->serverEncryptionMultiple;
    }

    public function setServerEncryptionMultiple(int $serverEncryptionMultiple): void
    {
        $this->serverEncryptionMultiple = $serverEncryptionMultiple;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::CONNECTION;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::ACCEPT;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ConnectionAcceptClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ConnectionAcceptClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ConnectionAcceptClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ConnectionAcceptClientPacket $data): void {
        if ($data->clientEncryptionMultiple === null)
        {
            throw new SerializationError('clientEncryptionMultiple must be provided.');
        }
        $writer->addShort($data->clientEncryptionMultiple);

        if ($data->serverEncryptionMultiple === null)
        {
            throw new SerializationError('serverEncryptionMultiple must be provided.');
        }
        $writer->addShort($data->serverEncryptionMultiple);

        if ($data->playerId === null)
        {
            throw new SerializationError('playerId must be provided.');
        }
        $writer->addShort($data->playerId);


    }

    /**
     * Deserializes an instance of `ConnectionAcceptClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ConnectionAcceptClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ConnectionAcceptClientPacket
    {
        $data = new ConnectionAcceptClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->clientEncryptionMultiple = $reader->getShort();
            $data->serverEncryptionMultiple = $reader->getShort();
            $data->playerId = $reader->getShort();

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
        return "ConnectionAcceptClientPacket(byteSize=' . $this->byteSize . '', clientEncryptionMultiple=' . $this->clientEncryptionMultiple . '', serverEncryptionMultiple=' . $this->serverEncryptionMultiple . '', playerId=' . $this->playerId . ')";
    }

}



