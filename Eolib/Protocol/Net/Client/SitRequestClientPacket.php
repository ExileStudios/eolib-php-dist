<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Net\Client;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Coords;
use Eolib\Protocol\Net\Client\SitAction;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\SerializationError;

/**
 * Sit/stand request
 */


class SitRequestClientPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $sitAction;
    private ?SitActionData $sitActionData = null;

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
    public function getSitAction(): int
    {
        return $this->sitAction;
    }

    /** @param int $sitAction */
    public function setSitAction(int $sitAction): void
    {
        $this->sitAction = $sitAction;
    }



    public function getSitActionData(): ?SitActionData
    {
        /**
         * SitRequestClientPacket::SitActionData: Gets or sets the data associated with the `sitAction` field.
         */
        return $this->sitActionData;
    }

    public function setSitActionData(?SitActionData $sitActionData): void
    {
        $this->sitActionData = $sitActionData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::SIT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getSitAction() == null)
        {
            throw new SerializationError('sitAction must be provided.');
        }
        $writer->addChar((int) $data->getSitAction());

        if ($data->sitAction === SitAction::SIT)
        {
            if (!($data->sitActionData instanceof SitActionDataSit))
            {
                throw new \Eolib\Protocol\SerializationError("Expected sitActionData to be of type SitActionDataSit for sitAction " . $data->sitAction . ".");
            }
            SitActionDataSit::serialize($writer, $data->getSitActionData());
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
            $data->setSitAction($reader->getChar());
            if ($data->sitAction === SitAction::SIT)
            {
                $data->setSitActionData(SitActionDataSit::deserialize($reader));
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
        return "SitRequestClientPacket(byteSize=$this->byteSize, sitAction=".var_export($this->sitAction, true).", sitActionData=".var_export($this->sitActionData, true).")";
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
    private int $byteSize = 0;
    /** @var Coords */
    private Coords $cursorCoords;

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

    /** @return Coords */
    public function getCursorCoords(): Coords
    {
        return $this->cursorCoords;
    }

    /** @param Coords $cursorCoords */
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
        if ($data->getCursorCoords() == null)
        {
            throw new SerializationError('cursorCoords must be provided.');
        }
        Coords::serialize($writer, $data->getCursorCoords());


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
            $data->setCursorCoords(Coords::deserialize($reader));

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
        return "SitActionDataSit(byteSize=$this->byteSize, cursorCoords=".var_export($this->cursorCoords, true).")";
    }

}





