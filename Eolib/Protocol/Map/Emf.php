<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Map\MapGraphicLayer;
use Eolib\Protocol\Map\MapItem;
use Eolib\Protocol\Map\MapLegacyDoorKey;
use Eolib\Protocol\Map\MapMusicControl;
use Eolib\Protocol\Map\MapNpc;
use Eolib\Protocol\Map\MapSign;
use Eolib\Protocol\Map\MapTileSpecRow;
use Eolib\Protocol\Map\MapTimedEffect;
use Eolib\Protocol\Map\MapType;
use Eolib\Protocol\Map\MapWarpRow;
use Eolib\Protocol\SerializationError;


class Emf
{
    private int $byteSize = 0;
    /** @var int[] */
    public array $rid = [];
    /** @var string */
    private string $name = "";
    /** @var int */
    private int $type;
    /** @var int */
    private int $timedEffect;
    /** @var int */
    private int $musicId;
    /** @var int */
    private int $musicControl;
    /** @var int */
    private int $ambientSoundId;
    /** @var int */
    private int $width;
    /** @var int */
    private int $height;
    /** @var int */
    private int $fillTile;
    /** @var bool */
    private bool $mapAvailable;
    /** @var bool */
    private bool $canScroll;
    /** @var int */
    private int $relogX;
    /** @var int */
    private int $relogY;
    /** @var int */
    private int $npcsCount;
    /** @var MapNpc[] */
    public array $npcs = [];
    /** @var int */
    private int $legacyDoorKeysCount;
    /** @var MapLegacyDoorKey[] */
    public array $legacyDoorKeys = [];
    /** @var int */
    private int $itemsCount;
    /** @var MapItem[] */
    public array $items = [];
    /** @var int */
    private int $tileSpecRowsCount;
    /** @var MapTileSpecRow[] */
    public array $tileSpecRows = [];
    /** @var int */
    private int $warpRowsCount;
    /** @var MapWarpRow[] */
    public array $warpRows = [];
    /** @var MapGraphicLayer[] */
    public array $graphicLayers = [];
    /** @var int */
    private int $signsCount;
    /** @var MapSign[] */
    public array $signs = [];

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

    /** @return int[] */
    public function getRid(): array
    {
        return $this->rid;
    }

    /** @param int[] $rid */
    public function setRid(array $rid): void
    {
        $this->rid = $rid;
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
    public function getType(): int
    {
        return $this->type;
    }

    /** @param int $type */
    public function setType(int $type): void
    {
        $this->type = $type;
    }



    /** @return int */
    public function getTimedEffect(): int
    {
        return $this->timedEffect;
    }

    /** @param int $timedEffect */
    public function setTimedEffect(int $timedEffect): void
    {
        $this->timedEffect = $timedEffect;
    }



    /** @return int */
    public function getMusicId(): int
    {
        return $this->musicId;
    }

    /** @param int $musicId */
    public function setMusicId(int $musicId): void
    {
        $this->musicId = $musicId;
    }



    /** @return int */
    public function getMusicControl(): int
    {
        return $this->musicControl;
    }

    /** @param int $musicControl */
    public function setMusicControl(int $musicControl): void
    {
        $this->musicControl = $musicControl;
    }



    /** @return int */
    public function getAmbientSoundId(): int
    {
        return $this->ambientSoundId;
    }

    /** @param int $ambientSoundId */
    public function setAmbientSoundId(int $ambientSoundId): void
    {
        $this->ambientSoundId = $ambientSoundId;
    }



    /** @return int */
    public function getWidth(): int
    {
        return $this->width;
    }

    /** @param int $width */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }



    /** @return int */
    public function getHeight(): int
    {
        return $this->height;
    }

    /** @param int $height */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }



    /** @return int */
    public function getFillTile(): int
    {
        return $this->fillTile;
    }

    /** @param int $fillTile */
    public function setFillTile(int $fillTile): void
    {
        $this->fillTile = $fillTile;
    }



    /** @return bool */
    public function getMapAvailable(): bool
    {
        return $this->mapAvailable;
    }

    /** @param bool $mapAvailable */
    public function setMapAvailable(bool $mapAvailable): void
    {
        $this->mapAvailable = $mapAvailable;
    }



    /** @return bool */
    public function getCanScroll(): bool
    {
        return $this->canScroll;
    }

    /** @param bool $canScroll */
    public function setCanScroll(bool $canScroll): void
    {
        $this->canScroll = $canScroll;
    }



    /** @return int */
    public function getRelogX(): int
    {
        return $this->relogX;
    }

    /** @param int $relogX */
    public function setRelogX(int $relogX): void
    {
        $this->relogX = $relogX;
    }



    /** @return int */
    public function getRelogY(): int
    {
        return $this->relogY;
    }

    /** @param int $relogY */
    public function setRelogY(int $relogY): void
    {
        $this->relogY = $relogY;
    }



    /** @return MapNpc[] */
    public function getNpcs(): array
    {
        return $this->npcs;
    }

    /** @param MapNpc[] $npcs */
    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
        $this->npcsCount = count($this->npcs);
    }

    /** @return int */
    public function getNpcsCount(): int
    {
        return $this->npcsCount;
    }

    /** @param int $npcsCount */
    public function setNpcsCount(int $npcsCount): void
    {
        $this->npcsCount = $npcsCount;
    }

    /** @return MapLegacyDoorKey[] */
    public function getLegacyDoorKeys(): array
    {
        return $this->legacyDoorKeys;
    }

    /** @param MapLegacyDoorKey[] $legacyDoorKeys */
    public function setLegacyDoorKeys(array $legacyDoorKeys): void
    {
        $this->legacyDoorKeys = $legacyDoorKeys;
        $this->legacyDoorKeysCount = count($this->legacyDoorKeys);
    }

    /** @return int */
    public function getLegacyDoorKeysCount(): int
    {
        return $this->legacyDoorKeysCount;
    }

    /** @param int $legacyDoorKeysCount */
    public function setLegacyDoorKeysCount(int $legacyDoorKeysCount): void
    {
        $this->legacyDoorKeysCount = $legacyDoorKeysCount;
    }

    /** @return MapItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /** @param MapItem[] $items */
    public function setItems(array $items): void
    {
        $this->items = $items;
        $this->itemsCount = count($this->items);
    }

    /** @return int */
    public function getItemsCount(): int
    {
        return $this->itemsCount;
    }

    /** @param int $itemsCount */
    public function setItemsCount(int $itemsCount): void
    {
        $this->itemsCount = $itemsCount;
    }

    /** @return MapTileSpecRow[] */
    public function getTileSpecRows(): array
    {
        return $this->tileSpecRows;
    }

    /** @param MapTileSpecRow[] $tileSpecRows */
    public function setTileSpecRows(array $tileSpecRows): void
    {
        $this->tileSpecRows = $tileSpecRows;
        $this->tileSpecRowsCount = count($this->tileSpecRows);
    }

    /** @return int */
    public function getTileSpecRowsCount(): int
    {
        return $this->tileSpecRowsCount;
    }

    /** @param int $tileSpecRowsCount */
    public function setTileSpecRowsCount(int $tileSpecRowsCount): void
    {
        $this->tileSpecRowsCount = $tileSpecRowsCount;
    }

    /** @return MapWarpRow[] */
    public function getWarpRows(): array
    {
        return $this->warpRows;
    }

    /** @param MapWarpRow[] $warpRows */
    public function setWarpRows(array $warpRows): void
    {
        $this->warpRows = $warpRows;
        $this->warpRowsCount = count($this->warpRows);
    }

    /** @return int */
    public function getWarpRowsCount(): int
    {
        return $this->warpRowsCount;
    }

    /** @param int $warpRowsCount */
    public function setWarpRowsCount(int $warpRowsCount): void
    {
        $this->warpRowsCount = $warpRowsCount;
    }

    /** @return MapGraphicLayer[] */
    public function getGraphicLayers(): array
    {
        return $this->graphicLayers;
    }

    /** @param MapGraphicLayer[] $graphicLayers */
    public function setGraphicLayers(array $graphicLayers): void
    {
        $this->graphicLayers = $graphicLayers;
    }



    /** @return MapSign[] */
    public function getSigns(): array
    {
        return $this->signs;
    }

    /** @param MapSign[] $signs */
    public function setSigns(array $signs): void
    {
        $this->signs = $signs;
        $this->signsCount = count($this->signs);
    }

    /** @return int */
    public function getSignsCount(): int
    {
        return $this->signsCount;
    }

    /** @param int $signsCount */
    public function setSignsCount(int $signsCount): void
    {
        $this->signsCount = $signsCount;
    }


    /**
     * Serializes an instance of `Emf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Emf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Emf $data): void {
        $writer->addFixedString('EMF', 3, false);

        if ($data->getRid() == null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (count($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got " . count($data->rid) . ".");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->getRid()[$i]);

        }
        if ($data->getName() == null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 24)
        {
            throw new SerializationError("Expected length of name to be 24 or less, got " . strlen($data->name) . ".");
        }
        $writer->addFixedEncodedString($data->getName(), 24, true);

        if ($data->getType() == null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addChar((int) $data->getType());

        if ($data->getTimedEffect() == null)
        {
            throw new SerializationError('timedEffect must be provided.');
        }
        $writer->addChar((int) $data->getTimedEffect());

        if ($data->getMusicId() == null)
        {
            throw new SerializationError('musicId must be provided.');
        }
        $writer->addChar($data->getMusicId());

        if ($data->getMusicControl() == null)
        {
            throw new SerializationError('musicControl must be provided.');
        }
        $writer->addChar((int) $data->getMusicControl());

        if ($data->getAmbientSoundId() == null)
        {
            throw new SerializationError('ambientSoundId must be provided.');
        }
        $writer->addShort($data->getAmbientSoundId());

        if ($data->getWidth() == null)
        {
            throw new SerializationError('width must be provided.');
        }
        $writer->addChar($data->getWidth());

        if ($data->getHeight() == null)
        {
            throw new SerializationError('height must be provided.');
        }
        $writer->addChar($data->getHeight());

        if ($data->getFillTile() == null)
        {
            throw new SerializationError('fillTile must be provided.');
        }
        $writer->addShort($data->getFillTile());

        if ($data->getMapAvailable() == null)
        {
            throw new SerializationError('mapAvailable must be provided.');
        }
        $writer->addChar((int) $data->getMapAvailable());

        if ($data->getCanScroll() == null)
        {
            throw new SerializationError('canScroll must be provided.');
        }
        $writer->addChar((int) $data->getCanScroll());

        if ($data->getRelogX() == null)
        {
            throw new SerializationError('relogX must be provided.');
        }
        $writer->addChar($data->getRelogX());

        if ($data->getRelogY() == null)
        {
            throw new SerializationError('relogY must be provided.');
        }
        $writer->addChar($data->getRelogY());

        $writer->addChar(0);

        if ($data->getNpcsCount() == null)
        {
            throw new SerializationError('npcsCount must be provided.');
        }
        $writer->addChar($data->getNpcsCount());

        if ($data->getNpcs() == null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        if (count($data->npcs) > 252)
        {
            throw new SerializationError("Expected length of npcs to be 252 or less, got " . count($data->npcs) . ".");
        }
        for ($i = 0; $i < $data->getNpcsCount(); $i++)
        {
            MapNpc::serialize($writer, $data->getNpcs()[$i]);

        }
        if ($data->getLegacyDoorKeysCount() == null)
        {
            throw new SerializationError('legacyDoorKeysCount must be provided.');
        }
        $writer->addChar($data->getLegacyDoorKeysCount());

        if ($data->getLegacyDoorKeys() == null)
        {
            throw new SerializationError('legacyDoorKeys must be provided.');
        }
        if (count($data->legacyDoorKeys) > 252)
        {
            throw new SerializationError("Expected length of legacyDoorKeys to be 252 or less, got " . count($data->legacyDoorKeys) . ".");
        }
        for ($i = 0; $i < $data->getLegacyDoorKeysCount(); $i++)
        {
            MapLegacyDoorKey::serialize($writer, $data->getLegacyDoorKeys()[$i]);

        }
        if ($data->getItemsCount() == null)
        {
            throw new SerializationError('itemsCount must be provided.');
        }
        $writer->addChar($data->getItemsCount());

        if ($data->getItems() == null)
        {
            throw new SerializationError('items must be provided.');
        }
        if (count($data->items) > 252)
        {
            throw new SerializationError("Expected length of items to be 252 or less, got " . count($data->items) . ".");
        }
        for ($i = 0; $i < $data->getItemsCount(); $i++)
        {
            MapItem::serialize($writer, $data->getItems()[$i]);

        }
        if ($data->getTileSpecRowsCount() == null)
        {
            throw new SerializationError('tileSpecRowsCount must be provided.');
        }
        $writer->addChar($data->getTileSpecRowsCount());

        if ($data->getTileSpecRows() == null)
        {
            throw new SerializationError('tileSpecRows must be provided.');
        }
        if (count($data->tileSpecRows) > 252)
        {
            throw new SerializationError("Expected length of tileSpecRows to be 252 or less, got " . count($data->tileSpecRows) . ".");
        }
        for ($i = 0; $i < $data->getTileSpecRowsCount(); $i++)
        {
            MapTileSpecRow::serialize($writer, $data->getTileSpecRows()[$i]);

        }
        if ($data->getWarpRowsCount() == null)
        {
            throw new SerializationError('warpRowsCount must be provided.');
        }
        $writer->addChar($data->getWarpRowsCount());

        if ($data->getWarpRows() == null)
        {
            throw new SerializationError('warpRows must be provided.');
        }
        if (count($data->warpRows) > 252)
        {
            throw new SerializationError("Expected length of warpRows to be 252 or less, got " . count($data->warpRows) . ".");
        }
        for ($i = 0; $i < $data->getWarpRowsCount(); $i++)
        {
            MapWarpRow::serialize($writer, $data->getWarpRows()[$i]);

        }
        if ($data->getGraphicLayers() == null)
        {
            throw new SerializationError('graphicLayers must be provided.');
        }
        if (count($data->graphicLayers) != 9)
        {
            throw new SerializationError("Expected length of graphicLayers to be exactly 9, got " . count($data->graphicLayers) . ".");
        }
        for ($i = 0; $i < 9; $i++)
        {
            MapGraphicLayer::serialize($writer, $data->getGraphicLayers()[$i]);

        }
        if ($data->getSignsCount() == null)
        {
            throw new SerializationError('signsCount must be provided.');
        }
        $writer->addChar($data->getSignsCount());

        if ($data->getSigns() == null)
        {
            throw new SerializationError('signs must be provided.');
        }
        if (count($data->signs) > 252)
        {
            throw new SerializationError("Expected length of signs to be 252 or less, got " . count($data->signs) . ".");
        }
        for ($i = 0; $i < $data->getSignsCount(); $i++)
        {
            MapSign::serialize($writer, $data->getSigns()[$i]);

        }

    }

    /**
     * Deserializes an instance of `Emf` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return Emf The deserialized data.
     */
    public static function deserialize(EoReader $reader): Emf
    {
        $data = new Emf();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $reader->getFixedString(3, false);
            $data->rid = [];
            for ($i = 0; $i < 2; $i++)
            {
                $data->rid[] = $reader->getShort();
            }
            $data->setName($reader->getFixedEncodedString(24, true));
            $data->setType($reader->getChar());
            $data->setTimedEffect($reader->getChar());
            $data->setMusicId($reader->getChar());
            $data->setMusicControl($reader->getChar());
            $data->setAmbientSoundId($reader->getShort());
            $data->setWidth($reader->getChar());
            $data->setHeight($reader->getChar());
            $data->setFillTile($reader->getShort());
            $data->setMapAvailable($reader->getChar() !== 0);
            $data->setCanScroll($reader->getChar() !== 0);
            $data->setRelogX($reader->getChar());
            $data->setRelogY($reader->getChar());
            $reader->getChar();
            $data->setNpcsCount($reader->getChar());
            $data->npcs = [];
            for ($i = 0; $i < $data->getNpcsCount(); $i++)
            {
                $data->npcs[] = MapNpc::deserialize($reader);
            }
            $data->setLegacyDoorKeysCount($reader->getChar());
            $data->legacyDoorKeys = [];
            for ($i = 0; $i < $data->getLegacyDoorKeysCount(); $i++)
            {
                $data->legacyDoorKeys[] = MapLegacyDoorKey::deserialize($reader);
            }
            $data->setItemsCount($reader->getChar());
            $data->items = [];
            for ($i = 0; $i < $data->getItemsCount(); $i++)
            {
                $data->items[] = MapItem::deserialize($reader);
            }
            $data->setTileSpecRowsCount($reader->getChar());
            $data->tileSpecRows = [];
            for ($i = 0; $i < $data->getTileSpecRowsCount(); $i++)
            {
                $data->tileSpecRows[] = MapTileSpecRow::deserialize($reader);
            }
            $data->setWarpRowsCount($reader->getChar());
            $data->warpRows = [];
            for ($i = 0; $i < $data->getWarpRowsCount(); $i++)
            {
                $data->warpRows[] = MapWarpRow::deserialize($reader);
            }
            $data->graphicLayers = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->graphicLayers[] = MapGraphicLayer::deserialize($reader);
            }
            $data->setSignsCount($reader->getChar());
            $data->signs = [];
            for ($i = 0; $i < $data->getSignsCount(); $i++)
            {
                $data->signs[] = MapSign::deserialize($reader);
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
        return "Emf(byteSize=$this->byteSize, rid=".var_export($this->rid, true).", name=$this->name, type=".var_export($this->type, true).", timedEffect=".var_export($this->timedEffect, true).", musicId=".var_export($this->musicId, true).", musicControl=".var_export($this->musicControl, true).", ambientSoundId=".var_export($this->ambientSoundId, true).", width=".var_export($this->width, true).", height=".var_export($this->height, true).", fillTile=".var_export($this->fillTile, true).", mapAvailable=".var_export($this->mapAvailable, true).", canScroll=".var_export($this->canScroll, true).", relogX=".var_export($this->relogX, true).", relogY=".var_export($this->relogY, true).", npcs=".var_export($this->npcs, true).", legacyDoorKeys=".var_export($this->legacyDoorKeys, true).", items=".var_export($this->items, true).", tileSpecRows=".var_export($this->tileSpecRows, true).", warpRows=".var_export($this->warpRows, true).", graphicLayers=".var_export($this->graphicLayers, true).", signs=".var_export($this->signs, true).")";
    }

}


