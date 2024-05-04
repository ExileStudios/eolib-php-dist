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
use Eolib\Protocol\SerializationError;

/**
 * Reply to reading a post on a town board
 */


class BoardPlayerServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $postId;
    /** @var string */
    private string $postBody = "";

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
    public function getPostId(): int
    {
        return $this->postId;
    }

    /** @param int $postId */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }



    /** @return string */
    public function getPostBody(): string
    {
        return $this->postBody;
    }

    /** @param string $postBody */
    public function setPostBody(string $postBody): void
    {
        $this->postBody = $postBody;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::BOARD;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::PLAYER;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        BoardPlayerServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `BoardPlayerServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param BoardPlayerServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, BoardPlayerServerPacket $data): void {
        if ($data->getPostId() == null)
        {
            throw new SerializationError('postId must be provided.');
        }
        $writer->addShort($data->getPostId());

        if ($data->getPostBody() == null)
        {
            throw new SerializationError('postBody must be provided.');
        }
        $writer->addString($data->getPostBody());


    }

    /**
     * Deserializes an instance of `BoardPlayerServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return BoardPlayerServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): BoardPlayerServerPacket
    {
        $data = new BoardPlayerServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->setPostId($reader->getShort());
            $data->setPostBody($reader->getString());
            $reader->setChunkedReadingMode(false);

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
        return "BoardPlayerServerPacket(byteSize=$this->byteSize, postId=".var_export($this->postId, true).", postBody=$this->postBody)";
    }

}



