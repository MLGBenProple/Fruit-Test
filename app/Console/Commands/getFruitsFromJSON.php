<?php

namespace App\Console\Commands;

use App\Models\Fruit;
use App\Models\Product;
use App\Models\Variety;
use Illuminate\Console\Command;

class getFruitsFromJSON extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:fruits_json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update fruits table with data from remote json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://dev.shepherd.appoly.io/fruit.json';
        $json = file_get_contents($url);
        $array = json_decode($json);

        foreach ($array->menu_items as $fruit_data) {
            $fruit = Fruit::firstOrNew([
                'slug' => strtolower($fruit_data->label),
            ]);
            
            if (!$fruit->exists) {
                $fruit->slug = strtolower($fruit_data->label);
                $fruit->name = $fruit_data->label;
                $fruit->save();
            }

            foreach ($fruit_data->children as $variety_data) {
                $variety = $fruit->varieties()->firstOrNew([
                    'slug' => strtolower($variety_data->label),
                ]);

                if (!$variety->exists) {
                    $variety->slug = strtolower($variety_data->label);
                    $variety->name = $variety_data->label;
                    $variety->save();
                }

                foreach ($variety_data->children as $product_data) {
                    $product = $variety->products()->firstOrNew([
                        'slug' => strtolower($product_data->label),
                    ]);

                    if(!$product->exists) {
                        $product->slug = strtolower($product_data->label);
                        $product->name = $product_data->label;
                        $product->save();
                    }
                }
            }
        }
    }
}
