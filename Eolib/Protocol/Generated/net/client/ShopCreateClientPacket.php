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
 * Crafting an item from a shop
 */


class ShopCreateClientPacket
{
    private $byteSize = 0;
    private int $craftItemId;
    private int $sessionId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCraftItemId(): int
    {
        return $this->craftItemId;
    }

    public function setCraftItemId(int $craftItemId): void
    {
        $this->craftItemId = $craftItemId;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SHOP;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::CREATE;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ShopCreateClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ShopCreateClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ShopCreateClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ShopCreateClientPacket $data): void {
        if ($data->craftItemId === null)
        {
            throw new SerializationError('craftItemId must be provided.');
        }
        $writer->addShort($data->craftItemId);

        if ($data->sessionId === null)
        {
            throw new SerializationError('sessionId must be provided.');
        }
        $writer->addInt($data->sessionId);


    }

    /**
     * Deserializes an instance of `ShopCreateClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ShopCreateClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ShopCreateClientPacket
    {
        $data = new ShopCreateClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->craftItemId = $reader->getShort();
            $data->sessionId = $reader->getInt();

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
        return "ShopCreateClientPacket(byteSize=' . $this->byteSize . '', craftItemId=' . $this->craftItemId . '', sessionId=' . $this->sessionId . ')";
    }

}



