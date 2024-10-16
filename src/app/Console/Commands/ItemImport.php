<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ItemImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import list items from third party api to our inventory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Http::get('https://api.restful-api.dev/objects');
            if ($response->ok()) {
                $items = $response->json();
                // Save each item to our inventory
                foreach ($items as $item) {
                    $existItem = Item::where('name', $item['name'])->first();
                    if (! $existItem) {
                        Item::create([
                            'name' => $item['name'],
                            'sellIn' => 0,
                            'quality' => 1,
                        ]);
                    } else {
                        if ($existItem->quality < 50) {
                            $existItem->quality += 1;
                            $existItem->save();
                        }
                    }
                }
                $this->info('Items imported successfully');
            } else {
                $this->error('Failed to fetch items from the API');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
