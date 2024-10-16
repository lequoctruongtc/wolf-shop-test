<?php

namespace App\Services\Item;

class ItemService implements ItemServiceInterface
{
    public function updateQuality(array $items)
    {
        foreach ($items as $item) {
            if ($item->name != self::SAMSUNG_GALAXY_S23) {
                if ($item->name == self::APPLE_AIRPODS || $item->name == self::APPLE_IPAD_AIR) {
                    $item->quality = $this->increaseQuality($item->quality);
                    if ($item->name == self::APPLE_IPAD_AIR) {
                        if ($item->quality < 11) {
                            $item->quality = $this->increaseQuality($item->quality);
                        }
                        if ($item->quality < 6) {
                            $item->quality = $this->increaseQuality($item->quality);
                        }
                    }
                } else {
                    $item->quality = $this->decreaseQuality($item->quality);
                    if ($item->name == self::XIAOMI_REDMI_NOTE_13) {
                        $item->quality = $this->decreaseQuality($item->quality);
                    }
                }

                $item->sellIn = $this->decreaseSellIn($item->sellIn);

                if ($item->sellIn < 0) {
                    if ($item->name == self::APPLE_AIRPODS) {
                        $item->quality = $this->increaseQuality($item);
                    } elseif ($item->name == self::APPLE_IPAD_AIR) {
                        $item->quality = 0;
                    } else {
                        $item->quality = $this->decreaseQuality($item->quality);
                    }
                }
            }
        }

        return $items;
    }

    public function increaseQuality($quality)
    {
        if ($quality < 50) {
            $quality += 1;
        }

        return $quality;
    }

    public function decreaseQuality($quality)
    {
        if ($quality > 0) {
            $quality -= 1;
        }

        return $quality;
    }

    public function decreaseSellIn($sellIn)
    {
        $sellIn -= 1;

        return $sellIn;
    }

    // public function increaseQualityBySellIn($item)
    // {
    //     if ($item->sellIn < 0) {
    //         $item->quality += 1;
    //     }

    //     return $item;
    // }

    // public function decreaseQualityBySellIn($item)
    // {
    //     if ($item->sellIn > 0) {
    //         $item->quality -= 1;
    //     }

    //     return $item;
    // }
}
