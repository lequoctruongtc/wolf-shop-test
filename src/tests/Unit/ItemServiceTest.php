<?php

namespace Tests\Unit;

use App\Models\Item;
use App\Services\Item\ItemService;
use PHPUnit\Framework\TestCase;

class ItemServiceTest extends TestCase
{
    public function test_increase_quality()
    {
        $itemService = new ItemService;
        $quality = 1;
        $result = $itemService->increaseQuality($quality);
        $expected = 2;
        $this->assertEquals($expected, $result);
    }

    public function test_decrease_quality()
    {
        $itemService = new ItemService;
        $quality = 2;
        $result = $itemService->decreaseQuality($quality);
        $expected = 1;
        $this->assertEquals($expected, $result);
    }

    public function test_decrease_sell_in()
    {
        $itemService = new ItemService;
        $sellIn = 2;
        $result = $itemService->decreaseSellIn($sellIn);
        $expected = 1;
        $this->assertEquals($expected, $result);
    }

    public function test_update_quality_apple_airpods()
    {
        $itemService = new ItemService;

        $itemModel = new Item;
        $itemModel->name = ItemService::APPLE_AIRPODS;
        $itemModel->sellIn = 2;
        $itemModel->quality = 2;

        $items = [$itemModel];
        $result = $itemService->updateQuality($items);

        $expectedModel = new Item;
        $expectedModel->name = ItemService::APPLE_AIRPODS;
        $expectedModel->sellIn = 2;
        $expectedModel->quality = 3;
        $expected = [$expectedModel];

        $this->assertEquals($expected[0]->quality, $result[0]->quality);
    }

    public function test_update_quality_apple_ipad_air()
    {
        $itemService = new ItemService;

        $itemModel = new Item;
        $itemModel->name = ItemService::APPLE_IPAD_AIR;
        $itemModel->sellIn = 2;
        $itemModel->quality = 2;

        $items = [$itemModel];
        $result = $itemService->updateQuality($items);

        $expectedModel = new Item;
        $expectedModel->name = ItemService::APPLE_IPAD_AIR;
        $expectedModel->sellIn = 2;
        $expectedModel->quality = 5;
        $expected = [$expectedModel];

        $this->assertEquals($expected[0]->quality, $result[0]->quality);
    }

    public function test_update_quality_samsung_galaxy_s23()
    {
        $itemService = new ItemService;

        $itemModel = new Item;
        $itemModel->name = ItemService::SAMSUNG_GALAXY_S23;
        $itemModel->sellIn = 2;
        $itemModel->quality = 2;

        $items = [$itemModel];
        $result = $itemService->updateQuality($items);

        $expectedModel = new Item;
        $expectedModel->name = ItemService::SAMSUNG_GALAXY_S23;
        $expectedModel->sellIn = 2;
        $expectedModel->quality = 2;
        $expected = [$expectedModel];

        $this->assertEquals($expected[0]->quality, $result[0]->quality);
    }

    public function test_update_quality_xiaomi_redmi_note_13()
    {
        $itemService = new ItemService;

        $itemModel = new Item;
        $itemModel->name = ItemService::XIAOMI_REDMI_NOTE_13;
        $itemModel->sellIn = 2;
        $itemModel->quality = 2;

        $items = [$itemModel];
        $result = $itemService->updateQuality($items);

        $expectedModel = new Item;
        $expectedModel->name = ItemService::XIAOMI_REDMI_NOTE_13;
        $expectedModel->sellIn = 2;
        $expectedModel->quality = 0;
        $expected = [$expectedModel];

        $this->assertEquals($expected[0]->quality, $result[0]->quality);
    }
}
