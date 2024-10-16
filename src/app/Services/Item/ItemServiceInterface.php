<?php

namespace App\Services\Item;

interface ItemServiceInterface
{
    const APPLE_AIRPODS = 'Apple AirPods';

    const APPLE_IPAD_AIR = 'Apple iPad Air';

    const SAMSUNG_GALAXY_S23 = 'Samsung Galaxy S23';

    const XIAOMI_REDMI_NOTE_13 = 'Xiaomi Redmi Note 13';

    public function updateQuality(array $items);
}
