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
use Eolib\Protocol\Generated\Net\Weight;
use Eolib\Protocol\Generated\Net\server\CharacterStatsEquipmentChange;
use Eolib\Protocol\Generated\Pub\ItemType;
use Eolib\Protocol\SerializationError;

/**
 * Reply to using an item
 */


class ItemReplyServerPacket
{
    private $byteSize = 0;
    private int $itemType;
    private Item $usedItem;
    private Weight $weight;
    private ?itemTypeData $itemTypeData = null;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getItemType(): int
    {
        return $this->itemType;
    }

    public function setItemType(int $itemType): void
    {
        $this->itemType = $itemType;
    }

    public function getUsedItem(): Item
    {
        return $this->usedItem;
    }

    public function setUsedItem(Item $usedItem): void
    {
        $this->usedItem = $usedItem;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    public function itemTypeData(): ?itemTypeData
    {
        /**
         * ItemReplyServerPacket::ItemTypeData: Gets or sets the data associated with the `itemType` field.
         */
        return $this->itemTypeData;
    }

    public function setItemTypeData($itemTypeData): void
    {
        $this->itemTypeData = $itemTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return PacketFamily The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return PacketAction The packet action associated with this packet.
     */
    public static function action(): int
    {
        return PacketAction::REPLY;
    }

    /**
     * Serializes and writes this packet to the provided EoWriter.
     *
     * @param EoWriter $writer The writer that this packet will be written to.
     */
    public function write(EoWriter $writer): void
    {
        ItemReplyServerPacket::serialize($writer, $this);
    }


    /**
     * Serializes an instance of `ItemReplyServerPacket` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemReplyServerPacket $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemReplyServerPacket $data): void {
        if ($data->itemType === null)
        {
            throw new SerializationError('itemType must be provided.');
        }
        $writer->addChar((int) $data->itemType);

        if ($data->usedItem === null)
        {
            throw new SerializationError('usedItem must be provided.');
        }
        Item::serialize($writer, $data->usedItem);

        if ($data->weight === null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->weight);

        if ($data->itemType === ItemType::HEAL)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataHeal))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataHeal for itemType " . ItemType($data->itemType)->name . ".");
            }
            ItemTypeDataHeal::serialize($writer, $data->itemTypeData);
        }
        elseif ($data->itemType === ItemType::HAIRDYE)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataHairDye))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataHairDye for itemType " . ItemType($data->itemType)->name . ".");
            }
            ItemTypeDataHairDye::serialize($writer, $data->itemTypeData);
        }
        elseif ($data->itemType === ItemType::EFFECTPOTION)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataEffectPotion))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataEffectPotion for itemType " . ItemType($data->itemType)->name . ".");
            }
            ItemTypeDataEffectPotion::serialize($writer, $data->itemTypeData);
        }
        elseif ($data->itemType === ItemType::CURECURSE)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataCureCurse))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataCureCurse for itemType " . ItemType($data->itemType)->name . ".");
            }
            ItemTypeDataCureCurse::serialize($writer, $data->itemTypeData);
        }
        elseif ($data->itemType === ItemType::EXPREWARD)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataExpReward))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataExpReward for itemType " . ItemType($data->itemType)->name . ".");
            }
            ItemTypeDataExpReward::serialize($writer, $data->itemTypeData);
        }

    }

    /**
     * Deserializes an instance of `ItemReplyServerPacket` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemReplyServerPacket The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemReplyServerPacket
    {
        $data = new ItemReplyServerPacket();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->itemType = ItemType($reader->getChar());
            $data->usedItem = Item::deserialize($reader);
            $data->weight = Weight::deserialize($reader);
            if ($data->itemType === ItemType::HEAL)
            {
                $data->itemTypeData = ItemTypeDataHeal::deserialize($reader);
            }
            elseif ($data->itemType === ItemType::HAIRDYE)
            {
                $data->itemTypeData = ItemTypeDataHairDye::deserialize($reader);
            }
            elseif ($data->itemType === ItemType::EFFECTPOTION)
            {
                $data->itemTypeData = ItemTypeDataEffectPotion::deserialize($reader);
            }
            elseif ($data->itemType === ItemType::CURECURSE)
            {
                $data->itemTypeData = ItemTypeDataCureCurse::deserialize($reader);
            }
            elseif ($data->itemType === ItemType::EXPREWARD)
            {
                $data->itemTypeData = ItemTypeDataExpReward::deserialize($reader);
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
        return "ItemReplyServerPacket(byteSize=' . $this->byteSize . '', itemType=' . $this->itemType . '', usedItem=' . $this->usedItem . '', weight=' . $this->weight . '', itemTypeData=' . $this->itemTypeData . ')";
    }

}

/**
 * Data associated with different values of the `itemType` field.
 */
interface ItemTypeData {}

/**
 * Data associated with itemType value ItemType::HEAL
 */

class ItemTypeDataHeal implements ItemTypeData
{
    private $byteSize = 0;
    private int $hpGain;
    private int $hp;
    private int $tp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getHpGain(): int
    {
        return $this->hpGain;
    }

    public function setHpGain(int $hpGain): void
    {
        $this->hpGain = $hpGain;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getTp(): int
    {
        return $this->tp;
    }

    public function setTp(int $tp): void
    {
        $this->tp = $tp;
    }


    /**
     * Serializes an instance of `ItemTypeDataHeal` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemTypeDataHeal $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemTypeDataHeal $data): void {
        if ($data->hpGain === null)
        {
            throw new SerializationError('hpGain must be provided.');
        }
        $writer->addInt($data->hpGain);

        if ($data->hp === null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->hp);

        if ($data->tp === null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->tp);


    }

    /**
     * Deserializes an instance of `ItemTypeDataHeal` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemTypeDataHeal The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemTypeDataHeal
    {
        $data = new ItemTypeDataHeal();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->hpGain = $reader->getInt();
            $data->hp = $reader->getShort();
            $data->tp = $reader->getShort();

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
        return "ItemTypeDataHeal(byteSize=' . $this->byteSize . '', hpGain=' . $this->hpGain . '', hp=' . $this->hp . '', tp=' . $this->tp . ')";
    }

}



/**
 * Data associated with itemType value ItemType::HAIRDYE
 */

class ItemTypeDataHairDye implements ItemTypeData
{
    private $byteSize = 0;
    private int $hairColor;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    public function setHairColor(int $hairColor): void
    {
        $this->hairColor = $hairColor;
    }


    /**
     * Serializes an instance of `ItemTypeDataHairDye` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemTypeDataHairDye $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemTypeDataHairDye $data): void {
        if ($data->hairColor === null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->hairColor);


    }

    /**
     * Deserializes an instance of `ItemTypeDataHairDye` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemTypeDataHairDye The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemTypeDataHairDye
    {
        $data = new ItemTypeDataHairDye();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->hairColor = $reader->getChar();

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
        return "ItemTypeDataHairDye(byteSize=' . $this->byteSize . '', hairColor=' . $this->hairColor . ')";
    }

}



/**
 * Data associated with itemType value ItemType::EFFECTPOTION
 */

class ItemTypeDataEffectPotion implements ItemTypeData
{
    private $byteSize = 0;
    private int $effectId;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getEffectId(): int
    {
        return $this->effectId;
    }

    public function setEffectId(int $effectId): void
    {
        $this->effectId = $effectId;
    }


    /**
     * Serializes an instance of `ItemTypeDataEffectPotion` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemTypeDataEffectPotion $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemTypeDataEffectPotion $data): void {
        if ($data->effectId === null)
        {
            throw new SerializationError('effectId must be provided.');
        }
        $writer->addShort($data->effectId);


    }

    /**
     * Deserializes an instance of `ItemTypeDataEffectPotion` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemTypeDataEffectPotion The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemTypeDataEffectPotion
    {
        $data = new ItemTypeDataEffectPotion();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->effectId = $reader->getShort();

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
        return "ItemTypeDataEffectPotion(byteSize=' . $this->byteSize . '', effectId=' . $this->effectId . ')";
    }

}



/**
 * Data associated with itemType value ItemType::CURECURSE
 */

class ItemTypeDataCureCurse implements ItemTypeData
{
    private $byteSize = 0;
    private CharacterStatsEquipmentChange $stats;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getStats(): CharacterStatsEquipmentChange
    {
        return $this->stats;
    }

    public function setStats(CharacterStatsEquipmentChange $stats): void
    {
        $this->stats = $stats;
    }


    /**
     * Serializes an instance of `ItemTypeDataCureCurse` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemTypeDataCureCurse $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemTypeDataCureCurse $data): void {
        if ($data->stats === null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsEquipmentChange::serialize($writer, $data->stats);


    }

    /**
     * Deserializes an instance of `ItemTypeDataCureCurse` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemTypeDataCureCurse The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemTypeDataCureCurse
    {
        $data = new ItemTypeDataCureCurse();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->stats = CharacterStatsEquipmentChange::deserialize($reader);

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
        return "ItemTypeDataCureCurse(byteSize=' . $this->byteSize . '', stats=' . $this->stats . ')";
    }

}



/**
 * Data associated with itemType value ItemType::EXPREWARD
 */

class ItemTypeDataExpReward implements ItemTypeData
{
    private $byteSize = 0;
    private int $experience;
    private int $levelUp;
    private int $statPoints;
    private int $skillPoints;
    private int $maxHp;
    private int $maxTp;
    private int $maxSp;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function getLevelUp(): int
    {
        return $this->levelUp;
    }

    public function setLevelUp(int $levelUp): void
    {
        $this->levelUp = $levelUp;
    }

    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }

    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }

    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }

    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }

    public function getMaxSp(): int
    {
        return $this->maxSp;
    }

    public function setMaxSp(int $maxSp): void
    {
        $this->maxSp = $maxSp;
    }


    /**
     * Serializes an instance of `ItemTypeDataExpReward` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param ItemTypeDataExpReward $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, ItemTypeDataExpReward $data): void {
        if ($data->experience === null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->experience);

        if ($data->levelUp === null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        $writer->addChar($data->levelUp);

        if ($data->statPoints === null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->statPoints);

        if ($data->skillPoints === null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->skillPoints);

        if ($data->maxHp === null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->maxHp);

        if ($data->maxTp === null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->maxTp);

        if ($data->maxSp === null)
        {
            throw new SerializationError('maxSp must be provided.');
        }
        $writer->addShort($data->maxSp);


    }

    /**
     * Deserializes an instance of `ItemTypeDataExpReward` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return ItemTypeDataExpReward The deserialized data.
     */
    public static function deserialize(EoReader $reader): ItemTypeDataExpReward
    {
        $data = new ItemTypeDataExpReward();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->experience = $reader->getInt();
            $data->levelUp = $reader->getChar();
            $data->statPoints = $reader->getShort();
            $data->skillPoints = $reader->getShort();
            $data->maxHp = $reader->getShort();
            $data->maxTp = $reader->getShort();
            $data->maxSp = $reader->getShort();

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
        return "ItemTypeDataExpReward(byteSize=' . $this->byteSize . '', experience=' . $this->experience . '', levelUp=' . $this->levelUp . '', statPoints=' . $this->statPoints . '', skillPoints=' . $this->skillPoints . '', maxHp=' . $this->maxHp . '', maxTp=' . $this->maxTp . '', maxSp=' . $this->maxSp . ')";
    }

}





