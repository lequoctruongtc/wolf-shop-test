<?php

use App\Models\Item;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    Item::all()->each(function (Item $item) {
        $item->update([
            'sellIn' => $item->sellIn > 0 ? $item->sellIn - 1 : 0,
            'quality' => $item->quality > 0 ? $item->quality - 1 : 0,
        ]);
    });
})->daily();
