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
use Eolib\Protocol\Generated\Net\Item;
use Eolib\Protocol\Generated\Net\PacketAction;
use Eolib\Protocol\Generated\Net\PacketFamily;
use Eolib\Protocol\Generated\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Admin character inventory popup
 */


class AdminInteractListServerPacket
{
    private $byteSize = 0;
    private string $name = "";
    private int $usage;
    private int $goldBank;
    private array $inventory;
    private array $bank;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUsage(): int
    {
        return $this->usage;
    }

    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }

    public function getGoldBank(): int
    {
        return $this->goldBank;
    }

    public function setGoldBank(int $goldBank): void
    {
        $this->goldBank = $goldBank;
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function setInventory(array $inventory): void
    {
        $this->inventory = $inventory;
    }

    public function getBank(): array
    {
        return $this->bank;
    }

    public function setBank(array $bank): void
    {
        $this->bank = $bank;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::LIST;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        AdminInteractListServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `AdminInteractListServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param AdminInteractListServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, AdminInteractListServerPacket $data): void {
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->name);

        $writer->addByte(0xFF);
        if ($data->usage === null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->usage);

        $writer->addByte(0xFF);
        if ($data->goldBank === null)
        {
            throw new SerializationError('goldBank must be provided.');
        }
        $writer->addInt($data->goldBank);

        $writer->addByte(0xFF);
        if ($data->inventory === null)
        {
            throw new SerializationError('inventory must be provided.');
        }
        for ($i = 0; $i < count($data->inventory); $i++)
        {
            Item::serialize($writer, $data->inventory[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->bank === null)
        {
            throw new SerializationError('bank must be provided.');
        }
        for ($i = 0; $i < count($data->bank); $i++)
        {
            ThreeItem::serialize($writer, $data->bank[$i]);

        }

    }

    /**
     * Deserializes an instance of `AdminInteractListServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return AdminInteractListServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): AdminInteractListServerPacket
    {
        $data = new AdminInteractListServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->setChunkedReadingMode(true);
            $data->name = $reader->getString();
            $reader->nextChunk();
            $data->usage = $reader->getInt();
            $reader->nextChunk();
            $data->goldBank = $reader->getInt();
            $reader->nextChunk();
            $inventory_length = (int) $reader->remaining() / 6;
            $data->inventory = [];
            for ($i = 0; $i < $inventory_length; $i++)
            {
                $data->inventory[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $bank_length = (int) $reader->remaining() / 5;
            $data->bank = [];
            for ($i = 0; $i < $bank_length; $i++)
            {
                $data->bank[] = ThreeItem::deserialize($reader);
            }
            $reader->setChunkedReadingMode(false);

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
        return "AdminInteractListServerPacket(byteSize=' . $this->byteSize . '', name=' . $this->name . '', usage=' . $this->usage . '', goldBank=' . $this->goldBank . '', inventory=' . $this->inventory . '', bank=' . $this->bank . ')";
    }

}



