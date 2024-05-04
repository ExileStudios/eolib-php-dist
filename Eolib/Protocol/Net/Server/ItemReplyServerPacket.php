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
use Eolib\Protocol\Net\Server\CharacterStatsEquipmentChange;
use Eolib\Protocol\Net\Weight;
use Eolib\Protocol\Pub\ItemType;
use Eolib\Protocol\SerializationError;

/**
 * Reply to using an item
 */


class ItemReplyServerPacket
{
    private int $byteSize = 0;
    /** @var int */
    private int $itemType;
    /** @var Item */
    private Item $usedItem;
    /** @var Weight */
    private Weight $weight;
    private ?ItemTypeData $itemTypeData = null;

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
    public function getItemType(): int
    {
        return $this->itemType;
    }

    /** @param int $itemType */
    public function setItemType(int $itemType): void
    {
        $this->itemType = $itemType;
    }



    /** @return Item */
    public function getUsedItem(): Item
    {
        return $this->usedItem;
    }

    /** @param Item $usedItem */
    public function setUsedItem(Item $usedItem): void
    {
        $this->usedItem = $usedItem;
    }



    /** @return Weight */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /** @param Weight $weight */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }



    public function getItemTypeData(): ?ItemTypeData
    {
        /**
         * ItemReplyServerPacket::ItemTypeData: Gets or sets the data associated with the `itemType` field.
         */
        return $this->itemTypeData;
    }

    public function setItemTypeData(?ItemTypeData $itemTypeData): void
    {
        $this->itemTypeData = $itemTypeData;
    }

    /**
     * Returns the packet family associated with this packet.
     *
     * @return int The packet family associated with this packet.
     */
    public static function family(): int
    {
        return PacketFamily::ITEM;
    }

    /**
     * Returns the packet action associated with this packet.
     *
     * @return int The packet action associated with this packet.
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
        if ($data->getItemType() == null)
        {
            throw new SerializationError('itemType must be provided.');
        }
        $writer->addChar((int) $data->getItemType());

        if ($data->getUsedItem() == null)
        {
            throw new SerializationError('usedItem must be provided.');
        }
        Item::serialize($writer, $data->getUsedItem());

        if ($data->getWeight() == null)
        {
            throw new SerializationError('weight must be provided.');
        }
        Weight::serialize($writer, $data->getWeight());

        if ($data->itemType === ItemType::HEAL)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataHeal))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataHeal for itemType " . $data->itemType . ".");
            }
            ItemTypeDataHeal::serialize($writer, $data->getItemTypeData());
        }
        elseif ($data->itemType === ItemType::HAIRDYE)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataHairDye))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataHairDye for itemType " . $data->itemType . ".");
            }
            ItemTypeDataHairDye::serialize($writer, $data->getItemTypeData());
        }
        elseif ($data->itemType === ItemType::EFFECTPOTION)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataEffectPotion))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataEffectPotion for itemType " . $data->itemType . ".");
            }
            ItemTypeDataEffectPotion::serialize($writer, $data->getItemTypeData());
        }
        elseif ($data->itemType === ItemType::CURECURSE)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataCureCurse))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataCureCurse for itemType " . $data->itemType . ".");
            }
            ItemTypeDataCureCurse::serialize($writer, $data->getItemTypeData());
        }
        elseif ($data->itemType === ItemType::EXPREWARD)
        {
            if (!($data->itemTypeData instanceof ItemTypeDataExpReward))
            {
                throw new \Eolib\Protocol\SerializationError("Expected itemTypeData to be of type ItemTypeDataExpReward for itemType " . $data->itemType . ".");
            }
            ItemTypeDataExpReward::serialize($writer, $data->getItemTypeData());
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
            $data->setItemType($reader->getChar());
            $data->setUsedItem(Item::deserialize($reader));
            $data->setWeight(Weight::deserialize($reader));
            if ($data->itemType === ItemType::HEAL)
            {
                $data->setItemTypeData(ItemTypeDataHeal::deserialize($reader));
            }
            elseif ($data->itemType === ItemType::HAIRDYE)
            {
                $data->setItemTypeData(ItemTypeDataHairDye::deserialize($reader));
            }
            elseif ($data->itemType === ItemType::EFFECTPOTION)
            {
                $data->setItemTypeData(ItemTypeDataEffectPotion::deserialize($reader));
            }
            elseif ($data->itemType === ItemType::CURECURSE)
            {
                $data->setItemTypeData(ItemTypeDataCureCurse::deserialize($reader));
            }
            elseif ($data->itemType === ItemType::EXPREWARD)
            {
                $data->setItemTypeData(ItemTypeDataExpReward::deserialize($reader));
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
        return "ItemReplyServerPacket(byteSize=$this->byteSize, itemType=".var_export($this->itemType, true).", usedItem=".var_export($this->usedItem, true).", weight=".var_export($this->weight, true).", itemTypeData=".var_export($this->itemTypeData, true).")";
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
    private int $byteSize = 0;
    /** @var int */
    private int $hpGain;
    /** @var int */
    private int $hp;
    /** @var int */
    private int $tp;

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
    public function getHpGain(): int
    {
        return $this->hpGain;
    }

    /** @param int $hpGain */
    public function setHpGain(int $hpGain): void
    {
        $this->hpGain = $hpGain;
    }



    /** @return int */
    public function getHp(): int
    {
        return $this->hp;
    }

    /** @param int $hp */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }



    /** @return int */
    public function getTp(): int
    {
        return $this->tp;
    }

    /** @param int $tp */
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
        if ($data->getHpGain() == null)
        {
            throw new SerializationError('hpGain must be provided.');
        }
        $writer->addInt($data->getHpGain());

        if ($data->getHp() == null)
        {
            throw new SerializationError('hp must be provided.');
        }
        $writer->addShort($data->getHp());

        if ($data->getTp() == null)
        {
            throw new SerializationError('tp must be provided.');
        }
        $writer->addShort($data->getTp());


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
            $data->setHpGain($reader->getInt());
            $data->setHp($reader->getShort());
            $data->setTp($reader->getShort());

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
        return "ItemTypeDataHeal(byteSize=$this->byteSize, hpGain=".var_export($this->hpGain, true).", hp=".var_export($this->hp, true).", tp=".var_export($this->tp, true).")";
    }

}



/**
 * Data associated with itemType value ItemType::HAIRDYE
 */

class ItemTypeDataHairDye implements ItemTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $hairColor;

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
    public function getHairColor(): int
    {
        return $this->hairColor;
    }

    /** @param int $hairColor */
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
        if ($data->getHairColor() == null)
        {
            throw new SerializationError('hairColor must be provided.');
        }
        $writer->addChar($data->getHairColor());


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
            $data->setHairColor($reader->getChar());

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
        return "ItemTypeDataHairDye(byteSize=$this->byteSize, hairColor=".var_export($this->hairColor, true).")";
    }

}



/**
 * Data associated with itemType value ItemType::EFFECTPOTION
 */

class ItemTypeDataEffectPotion implements ItemTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $effectId;

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
    public function getEffectId(): int
    {
        return $this->effectId;
    }

    /** @param int $effectId */
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
        if ($data->getEffectId() == null)
        {
            throw new SerializationError('effectId must be provided.');
        }
        $writer->addShort($data->getEffectId());


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
            $data->setEffectId($reader->getShort());

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
        return "ItemTypeDataEffectPotion(byteSize=$this->byteSize, effectId=".var_export($this->effectId, true).")";
    }

}



/**
 * Data associated with itemType value ItemType::CURECURSE
 */

class ItemTypeDataCureCurse implements ItemTypeData
{
    private int $byteSize = 0;
    /** @var CharacterStatsEquipmentChange */
    private CharacterStatsEquipmentChange $stats;

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

    /** @return CharacterStatsEquipmentChange */
    public function getStats(): CharacterStatsEquipmentChange
    {
        return $this->stats;
    }

    /** @param CharacterStatsEquipmentChange $stats */
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
        if ($data->getStats() == null)
        {
            throw new SerializationError('stats must be provided.');
        }
        CharacterStatsEquipmentChange::serialize($writer, $data->getStats());


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
            $data->setStats(CharacterStatsEquipmentChange::deserialize($reader));

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
        return "ItemTypeDataCureCurse(byteSize=$this->byteSize, stats=".var_export($this->stats, true).")";
    }

}



/**
 * Data associated with itemType value ItemType::EXPREWARD
 */

class ItemTypeDataExpReward implements ItemTypeData
{
    private int $byteSize = 0;
    /** @var int */
    private int $experience;
    /** @var int */
    private int $levelUp;
    /** @var int */
    private int $statPoints;
    /** @var int */
    private int $skillPoints;
    /** @var int */
    private int $maxHp;
    /** @var int */
    private int $maxTp;
    /** @var int */
    private int $maxSp;

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
    public function getExperience(): int
    {
        return $this->experience;
    }

    /** @param int $experience */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }



    /** @return int */
    public function getLevelUp(): int
    {
        return $this->levelUp;
    }

    /** @param int $levelUp */
    public function setLevelUp(int $levelUp): void
    {
        $this->levelUp = $levelUp;
    }



    /** @return int */
    public function getStatPoints(): int
    {
        return $this->statPoints;
    }

    /** @param int $statPoints */
    public function setStatPoints(int $statPoints): void
    {
        $this->statPoints = $statPoints;
    }



    /** @return int */
    public function getSkillPoints(): int
    {
        return $this->skillPoints;
    }

    /** @param int $skillPoints */
    public function setSkillPoints(int $skillPoints): void
    {
        $this->skillPoints = $skillPoints;
    }



    /** @return int */
    public function getMaxHp(): int
    {
        return $this->maxHp;
    }

    /** @param int $maxHp */
    public function setMaxHp(int $maxHp): void
    {
        $this->maxHp = $maxHp;
    }



    /** @return int */
    public function getMaxTp(): int
    {
        return $this->maxTp;
    }

    /** @param int $maxTp */
    public function setMaxTp(int $maxTp): void
    {
        $this->maxTp = $maxTp;
    }



    /** @return int */
    public function getMaxSp(): int
    {
        return $this->maxSp;
    }

    /** @param int $maxSp */
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
        if ($data->getExperience() == null)
        {
            throw new SerializationError('experience must be provided.');
        }
        $writer->addInt($data->getExperience());

        if ($data->getLevelUp() == null)
        {
            throw new SerializationError('levelUp must be provided.');
        }
        $writer->addChar($data->getLevelUp());

        if ($data->getStatPoints() == null)
        {
            throw new SerializationError('statPoints must be provided.');
        }
        $writer->addShort($data->getStatPoints());

        if ($data->getSkillPoints() == null)
        {
            throw new SerializationError('skillPoints must be provided.');
        }
        $writer->addShort($data->getSkillPoints());

        if ($data->getMaxHp() == null)
        {
            throw new SerializationError('maxHp must be provided.');
        }
        $writer->addShort($data->getMaxHp());

        if ($data->getMaxTp() == null)
        {
            throw new SerializationError('maxTp must be provided.');
        }
        $writer->addShort($data->getMaxTp());

        if ($data->getMaxSp() == null)
        {
            throw new SerializationError('maxSp must be provided.');
        }
        $writer->addShort($data->getMaxSp());


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
            $data->setExperience($reader->getInt());
            $data->setLevelUp($reader->getChar());
            $data->setStatPoints($reader->getShort());
            $data->setSkillPoints($reader->getShort());
            $data->setMaxHp($reader->getShort());
            $data->setMaxTp($reader->getShort());
            $data->setMaxSp($reader->getShort());

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
        return "ItemTypeDataExpReward(byteSize=$this->byteSize, experience=".var_export($this->experience, true).", levelUp=".var_export($this->levelUp, true).", statPoints=".var_export($this->statPoints, true).", skillPoints=".var_export($this->skillPoints, true).", maxHp=".var_export($this->maxHp, true).", maxTp=".var_export($this->maxTp, true).", maxSp=".var_export($this->maxSp, true).")";
    }

}





