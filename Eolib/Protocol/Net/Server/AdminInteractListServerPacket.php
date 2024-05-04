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
use Eolib\Protocol\Net\Item;
use Eolib\Protocol\Net\PacketAction;
use Eolib\Protocol\Net\PacketFamily;
use Eolib\Protocol\Net\ThreeItem;
use Eolib\Protocol\SerializationError;

/**
 * Admin character inventory popup
 */


class AdminInteractListServerPacket
{
    private int $byteSize = 0;
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $usage;
    /** @var int */
    private int $goldBank;
    /** @var Item[] */
    public array $inventory = [];
    /** @var ThreeItem[] */
    public array $bank = [];

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

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /** @return int */
    public function getUsage(): int
    {
        return $this->usage;
    }

    /** @param int $usage */
    public function setUsage(int $usage): void
    {
        $this->usage = $usage;
    }



    /** @return int */
    public function getGoldBank(): int
    {
        return $this->goldBank;
    }

    /** @param int $goldBank */
    public function setGoldBank(int $goldBank): void
    {
        $this->goldBank = $goldBank;
    }



    /** @return Item[] */
    public function getInventory(): array
    {
        return $this->inventory;
    }

    /** @param Item[] $inventory */
    public function setInventory(array $inventory): void
    {
        $this->inventory = $inventory;
    }



    /** @return ThreeItem[] */
    public function getBank(): array
    {
        return $this->bank;
    }

    /** @param ThreeItem[] $bank */
    public function setBank(array $bank): void
    {
        $this->bank = $bank;
    }



    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ADMININTERACT;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        $writer->addString($data->getName());

        $writer->addByte(0xFF);
        if ($data->getUsage() == null)
        {
            throw new SerializationError('usage must be provided.');
        }
        $writer->addInt($data->getUsage());

        $writer->addByte(0xFF);
        if ($data->getGoldBank() == null)
        {
            throw new SerializationError('goldBank must be provided.');
        }
        $writer->addInt($data->getGoldBank());

        $writer->addByte(0xFF);
        if ($data->getInventory() == null)
        {
            throw new SerializationError('inventory must be provided.');
        }
        for ($i = 0; $i < count($data->inventory); $i++)
        {
            Item::serialize($writer, $data->getInventory()[$i]);

        }
        $writer->addByte(0xFF);
        if ($data->getBank() == null)
        {
            throw new SerializationError('bank must be provided.');
        }
        for ($i = 0; $i < count($data->bank); $i++)
        {
            ThreeItem::serialize($writer, $data->getBank()[$i]);

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
            $data->setName($reader->getString());
            $reader->nextChunk();
            $data->setUsage($reader->getInt());
            $reader->nextChunk();
            $data->setGoldBank($reader->getInt());
            $reader->nextChunk();
            $inventory_length = (int) $reader->getRemaining() / 6;
            $data->inventory = [];
            for ($i = 0; $i < $inventory_length; $i++)
            {
                $data->inventory[] = Item::deserialize($reader);
            }
            $reader->nextChunk();
            $bank_length = (int) $reader->getRemaining() / 5;
            $data->bank = [];
            for ($i = 0; $i < $bank_length; $i++)
            {
                $data->bank[] = ThreeItem::deserialize($reader);
            }
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
        return "AdminInteractListServerPacket(byteSize=$this->byteSize, name=$this->name, usage=".var_export($this->usage, true).", goldBank=".var_export($this->goldBank, true).", inventory=".var_export($this->inventory, true).", bank=".var_export($this->bank, true).")";
    }

}



