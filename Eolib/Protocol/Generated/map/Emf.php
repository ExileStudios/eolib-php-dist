<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Map;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\Generated\Map\MapGraphicLayer;
use Eolib\Protocol\Generated\Map\MapItem;
use Eolib\Protocol\Generated\Map\MapLegacyDoorKey;
use Eolib\Protocol\Generated\Map\MapMusicControl;
use Eolib\Protocol\Generated\Map\MapNpc;
use Eolib\Protocol\Generated\Map\MapSign;
use Eolib\Protocol\Generated\Map\MapTileSpecRow;
use Eolib\Protocol\Generated\Map\MapTimedEffect;
use Eolib\Protocol\Generated\Map\MapType;
use Eolib\Protocol\Generated\Map\MapWarpRow;
use Eolib\Protocol\SerializationError;


class Emf
{
    private $byteSize = 0;
    private array $rid;
    private string $name = "";
    private int $type;
    private int $timedEffect;
    private int $musicId;
    private int $musicControl;
    private int $ambientSoundId;
    private int $width;
    private int $height;
    private int $fillTile;
    private bool $mapAvailable;
    private bool $canScroll;
    private int $relogX;
    private int $relogY;
    private int $npcsCount;
    private array $npcs;
    private int $legacyDoorKeysCount;
    private array $legacyDoorKeys;
    private int $itemsCount;
    private array $items;
    private int $tileSpecRowsCount;
    private array $tileSpecRows;
    private int $warpRowsCount;
    private array $warpRows;
    private array $graphicLayers;
    private int $signsCount;
    private array $signs;

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getRid(): array
    {
        return $this->rid;
    }

    public function setRid(array $rid): void
    {
        $this->rid = $rid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getTimedEffect(): int
    {
        return $this->timedEffect;
    }

    public function setTimedEffect(int $timedEffect): void
    {
        $this->timedEffect = $timedEffect;
    }

    public function getMusicId(): int
    {
        return $this->musicId;
    }

    public function setMusicId(int $musicId): void
    {
        $this->musicId = $musicId;
    }

    public function getMusicControl(): int
    {
        return $this->musicControl;
    }

    public function setMusicControl(int $musicControl): void
    {
        $this->musicControl = $musicControl;
    }

    public function getAmbientSoundId(): int
    {
        return $this->ambientSoundId;
    }

    public function setAmbientSoundId(int $ambientSoundId): void
    {
        $this->ambientSoundId = $ambientSoundId;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getFillTile(): int
    {
        return $this->fillTile;
    }

    public function setFillTile(int $fillTile): void
    {
        $this->fillTile = $fillTile;
    }

    public function getMapAvailable(): bool
    {
        return $this->mapAvailable;
    }

    public function setMapAvailable(bool $mapAvailable): void
    {
        $this->mapAvailable = $mapAvailable;
    }

    public function getCanScroll(): bool
    {
        return $this->canScroll;
    }

    public function setCanScroll(bool $canScroll): void
    {
        $this->canScroll = $canScroll;
    }

    public function getRelogX(): int
    {
        return $this->relogX;
    }

    public function setRelogX(int $relogX): void
    {
        $this->relogX = $relogX;
    }

    public function getRelogY(): int
    {
        return $this->relogY;
    }

    public function setRelogY(int $relogY): void
    {
        $this->relogY = $relogY;
    }

    public function getNpcs(): array
    {
        return $this->npcs;
    }

    public function setNpcs(array $npcs): void
    {
        $this->npcs = $npcs;
        $this->npcsCount = strlen($this->npcs);
    }

    public function getLegacyDoorKeys(): array
    {
        return $this->legacyDoorKeys;
    }

    public function setLegacyDoorKeys(array $legacyDoorKeys): void
    {
        $this->legacyDoorKeys = $legacyDoorKeys;
        $this->legacyDoorKeysCount = strlen($this->legacyDoorKeys);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
        $this->itemsCount = strlen($this->items);
    }

    public function getTileSpecRows(): array
    {
        return $this->tileSpecRows;
    }

    public function setTileSpecRows(array $tileSpecRows): void
    {
        $this->tileSpecRows = $tileSpecRows;
        $this->tileSpecRowsCount = strlen($this->tileSpecRows);
    }

    public function getWarpRows(): array
    {
        return $this->warpRows;
    }

    public function setWarpRows(array $warpRows): void
    {
        $this->warpRows = $warpRows;
        $this->warpRowsCount = strlen($this->warpRows);
    }

    public function getGraphicLayers(): array
    {
        return $this->graphicLayers;
    }

    public function setGraphicLayers(array $graphicLayers): void
    {
        $this->graphicLayers = $graphicLayers;
    }

    public function getSigns(): array
    {
        return $this->signs;
    }

    public function setSigns(array $signs): void
    {
        $this->signs = $signs;
        $this->signsCount = strlen($this->signs);
    }


    /**
     * Serializes an instance of `Emf` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param Emf $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, Emf $data): void {
        $writer->addFixedString('EMF', 3, false);

        if ($data->rid === null)
        {
            throw new SerializationError('rid must be provided.');
        }
        if (strlen($data->rid) != 2)
        {
            throw new SerializationError("Expected length of rid to be exactly 2, got {strlen($data->rid)}.");
        }
        for ($i = 0; $i < 2; $i++)
        {
            $writer->addShort($data->rid[$i]);

        }
        if ($data->name === null)
        {
            throw new SerializationError('name must be provided.');
        }
        if (strlen($data->name) > 24)
        {
            throw new SerializationError("Expected length of name to be 24 or less, got {strlen($data->name)}.");
        }
        $writer->addFixedEncodedString($data->name, 24, true);

        if ($data->type === null)
        {
            throw new SerializationError('type must be provided.');
        }
        $writer->addChar((int) $data->type);

        if ($data->timedEffect === null)
        {
            throw new SerializationError('timedEffect must be provided.');
        }
        $writer->addChar((int) $data->timedEffect);

        if ($data->musicId === null)
        {
            throw new SerializationError('musicId must be provided.');
        }
        $writer->addChar($data->musicId);

        if ($data->musicControl === null)
        {
            throw new SerializationError('musicControl must be provided.');
        }
        $writer->addChar((int) $data->musicControl);

        if ($data->ambientSoundId === null)
        {
            throw new SerializationError('ambientSoundId must be provided.');
        }
        $writer->addShort($data->ambientSoundId);

        if ($data->width === null)
        {
            throw new SerializationError('width must be provided.');
        }
        $writer->addChar($data->width);

        if ($data->height === null)
        {
            throw new SerializationError('height must be provided.');
        }
        $writer->addChar($data->height);

        if ($data->fillTile === null)
        {
            throw new SerializationError('fillTile must be provided.');
        }
        $writer->addShort($data->fillTile);

        if ($data->mapAvailable === null)
        {
            throw new SerializationError('mapAvailable must be provided.');
        }
        $writer->addChar($data->mapAvailable ? 1 : 0);

        if ($data->canScroll === null)
        {
            throw new SerializationError('canScroll must be provided.');
        }
        $writer->addChar($data->canScroll ? 1 : 0);

        if ($data->relogX === null)
        {
            throw new SerializationError('relogX must be provided.');
        }
        $writer->addChar($data->relogX);

        if ($data->relogY === null)
        {
            throw new SerializationError('relogY must be provided.');
        }
        $writer->addChar($data->relogY);

        $writer->addChar(0);

        if ($data->npcsCount === null)
        {
            throw new SerializationError('npcsCount must be provided.');
        }
        $writer->addChar($data->npcsCount);

        if ($data->npcs === null)
        {
            throw new SerializationError('npcs must be provided.');
        }
        if (strlen($data->npcs) > 252)
        {
            throw new SerializationError("Expected length of npcs to be 252 or less, got {strlen($data->npcs)}.");
        }
        for ($i = 0; $i < $data->npcsCount; $i++)
        {
            MapNpc::serialize($writer, $data->npcs[$i]);

        }
        if ($data->legacyDoorKeysCount === null)
        {
            throw new SerializationError('legacyDoorKeysCount must be provided.');
        }
        $writer->addChar($data->legacyDoorKeysCount);

        if ($data->legacyDoorKeys === null)
        {
            throw new SerializationError('legacyDoorKeys must be provided.');
        }
        if (strlen($data->legacyDoorKeys) > 252)
        {
            throw new SerializationError("Expected length of legacyDoorKeys to be 252 or less, got {strlen($data->legacyDoorKeys)}.");
        }
        for ($i = 0; $i < $data->legacyDoorKeysCount; $i++)
        {
            MapLegacyDoorKey::serialize($writer, $data->legacyDoorKeys[$i]);

        }
        if ($data->itemsCount === null)
        {
            throw new SerializationError('itemsCount must be provided.');
        }
        $writer->addChar($data->itemsCount);

        if ($data->items === null)
        {
            throw new SerializationError('items must be provided.');
        }
        if (strlen($data->items) > 252)
        {
            throw new SerializationError("Expected length of items to be 252 or less, got {strlen($data->items)}.");
        }
        for ($i = 0; $i < $data->itemsCount; $i++)
        {
            MapItem::serialize($writer, $data->items[$i]);

        }
        if ($data->tileSpecRowsCount === null)
        {
            throw new SerializationError('tileSpecRowsCount must be provided.');
        }
        $writer->addChar($data->tileSpecRowsCount);

        if ($data->tileSpecRows === null)
        {
            throw new SerializationError('tileSpecRows must be provided.');
        }
        if (strlen($data->tileSpecRows) > 252)
        {
            throw new SerializationError("Expected length of tileSpecRows to be 252 or less, got {strlen($data->tileSpecRows)}.");
        }
        for ($i = 0; $i < $data->tileSpecRowsCount; $i++)
        {
            MapTileSpecRow::serialize($writer, $data->tileSpecRows[$i]);

        }
        if ($data->warpRowsCount === null)
        {
            throw new SerializationError('warpRowsCount must be provided.');
        }
        $writer->addChar($data->warpRowsCount);

        if ($data->warpRows === null)
        {
            throw new SerializationError('warpRows must be provided.');
        }
        if (strlen($data->warpRows) > 252)
        {
            throw new SerializationError("Expected length of warpRows to be 252 or less, got {strlen($data->warpRows)}.");
        }
        for ($i = 0; $i < $data->warpRowsCount; $i++)
        {
            MapWarpRow::serialize($writer, $data->warpRows[$i]);

        }
        if ($data->graphicLayers === null)
        {
            throw new SerializationError('graphicLayers must be provided.');
        }
        if (strlen($data->graphicLayers) != 9)
        {
            throw new SerializationError("Expected length of graphicLayers to be exactly 9, got {strlen($data->graphicLayers)}.");
        }
        for ($i = 0; $i < 9; $i++)
        {
            MapGraphicLayer::serialize($writer, $data->graphicLayers[$i]);

        }
        if ($data->signsCount === null)
        {
            throw new SerializationError('signsCount must be provided.');
        }
        $writer->addChar($data->signsCount);

        if ($data->signs === null)
        {
            throw new SerializationError('signs must be provided.');
        }
        if (strlen($data->signs) > 252)
        {
            throw new SerializationError("Expected length of signs to be 252 or less, got {strlen($data->signs)}.");
        }
        for ($i = 0; $i < $data->signsCount; $i++)
        {
            MapSign::serialize($writer, $data->signs[$i]);

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
            $data->name = $reader->getFixedEncodedString(24, true);
            $data->type = MapType($reader->getChar());
            $data->timedEffect = MapTimedEffect($reader->getChar());
            $data->musicId = $reader->getChar();
            $data->musicControl = MapMusicControl($reader->getChar());
            $data->ambientSoundId = $reader->getShort();
            $data->width = $reader->getChar();
            $data->height = $reader->getChar();
            $data->fillTile = $reader->getShort();
            $data->mapAvailable = $reader->getChar() !== 0;
            $data->canScroll = $reader->getChar() !== 0;
            $data->relogX = $reader->getChar();
            $data->relogY = $reader->getChar();
            $reader->getChar();
            $data->npcsCount = $reader->getChar();
            $data->npcs = [];
            for ($i = 0; $i < $data->npcsCount; $i++)
            {
                $data->npcs[] = MapNpc::deserialize($reader);
            }
            $data->legacyDoorKeysCount = $reader->getChar();
            $data->legacyDoorKeys = [];
            for ($i = 0; $i < $data->legacyDoorKeysCount; $i++)
            {
                $data->legacyDoorKeys[] = MapLegacyDoorKey::deserialize($reader);
            }
            $data->itemsCount = $reader->getChar();
            $data->items = [];
            for ($i = 0; $i < $data->itemsCount; $i++)
            {
                $data->items[] = MapItem::deserialize($reader);
            }
            $data->tileSpecRowsCount = $reader->getChar();
            $data->tileSpecRows = [];
            for ($i = 0; $i < $data->tileSpecRowsCount; $i++)
            {
                $data->tileSpecRows[] = MapTileSpecRow::deserialize($reader);
            }
            $data->warpRowsCount = $reader->getChar();
            $data->warpRows = [];
            for ($i = 0; $i < $data->warpRowsCount; $i++)
            {
                $data->warpRows[] = MapWarpRow::deserialize($reader);
            }
            $data->graphicLayers = [];
            for ($i = 0; $i < 9; $i++)
            {
                $data->graphicLayers[] = MapGraphicLayer::deserialize($reader);
            }
            $data->signsCount = $reader->getChar();
            $data->signs = [];
            for ($i = 0; $i < $data->signsCount; $i++)
            {
                $data->signs[] = MapSign::deserialize($reader);
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
        return "Emf(byteSize=' . $this->byteSize . '', rid=' . $this->rid . '', name=' . $this->name . '', type=' . $this->type . '', timedEffect=' . $this->timedEffect . '', musicId=' . $this->musicId . '', musicControl=' . $this->musicControl . '', ambientSoundId=' . $this->ambientSoundId . '', width=' . $this->width . '', height=' . $this->height . '', fillTile=' . $this->fillTile . '', mapAvailable=' . $this->mapAvailable . '', canScroll=' . $this->canScroll . '', relogX=' . $this->relogX . '', relogY=' . $this->relogY . '', npcs=' . $this->npcs . '', legacyDoorKeys=' . $this->legacyDoorKeys . '', items=' . $this->items . '', tileSpecRows=' . $this->tileSpecRows . '', warpRows=' . $this->warpRows . '', graphicLayers=' . $this->graphicLayers . '', signs=' . $this->signs . ')";
    }

}


