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
use Eolib\Protocol\Generated\Coords;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\client\SitAction;
use Eolib\Protocol\SerializationError;

/**
 * Sit/stand request
 */


class SitRequestClientPacket
{
    private $byteSize = 0;
    private int $sitAction;
    private ?sitActionData $sitActionData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getSitAction(): int
    {
        return $this->sitAction;
    }

    public function setSitAction(int $sitAction): void
    {
        $this->sitAction = $sitAction;
    }

    public function sitActionData(): ?sitActionData
    {
        /**
         * SitRequestClientPacket::SitActionData: Gets or sets the data associated with the `sitAction` field.
         */
        return $this->sitActionData;
    }

    public function setSitActionData($sitActionData): void
    {
        $this->sitActionData = $sitActionData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REQUEST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        SitRequestClientPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `SitRequestClientPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SitRequestClientPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SitRequestClientPacket $data): void {
        if ($data->sitAction === null)
        {
            throw new SerializationError('sitAction must be provided.');
        }
        $writer->addChar((int) $data->sitAction);

        if ($data->sitAction === SitAction::SIT)
        {
            if (!($data->sitActionData instanceof SitActionDataSit))
            {
                throw new \Eolib\Protocol\SerializationError("Expected sitActionData to be of type SitActionDataSit for sitAction " . SitAction($data->sitAction)->name . ".");
            }
            SitActionDataSit::serialize($writer, $data->sitActionData);
        }

    }

    /**
     * Deserializes an instance of `SitRequestClientPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SitRequestClientPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): SitRequestClientPacket
    {
        $data = new SitRequestClientPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->sitAction = SitAction($reader->getChar());
            if ($data->sitAction === SitAction::SIT)
            {
                $data->sitActionData = SitActionDataSit::deserialize($reader);
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
        return "SitRequestClientPacket(byteSize=' . $this->byteSize . '', sitAction=' . $this->sitAction . '', sitActionData=' . $this->sitActionData . ')";
    }

}

/**
 * Data associated with different values of the `sitAction` field.
 */
interface SitActionData {}

/**
 * Data associated with sitAction value SitAction::SIT
 */

class SitActionDataSit implements SitActionData
{
    private $byteSize = 0;
    private Coords $cursorCoords;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getCursorCoords(): Coords
    {
        return $this->cursorCoords;
    }

    public function setCursorCoords(Coords $cursorCoords): void
    {
        $this->cursorCoords = $cursorCoords;
    }


    /**
     * Serializes an instance of `SitActionDataSit` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param SitActionDataSit $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, SitActionDataSit $data): void {
        if ($data->cursorCoords === null)
        {
            throw new SerializationError('cursorCoords must be provided.');
        }
        Coords::serialize($writer, $data->cursorCoords);


    }

    /**
     * Deserializes an instance of `SitActionDataSit` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return SitActionDataSit The deserialized data.
     */
    public static function deserialize(EoReader $reader): SitActionDataSit
    {
        $data = new SitActionDataSit();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->cursorCoords = Coords::deserialize($reader);

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
        return "SitActionDataSit(byteSize=' . $this->byteSize . '', cursorCoords=' . $this->cursorCoords . ')";
    }

}





