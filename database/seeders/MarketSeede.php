<?php

namespace Database\Seeders;

use App\Models\Cattle;
use App\Models\Market;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cattleForSale = Cattle::where('status', 'for sale')->get();

        foreach ($cattleForSale as $cattle) {
            Market::create([
                'cattle_id' => $cattle->id,
                'price' => fake()->numberBetween(10000, 50000),
            ]);
        }
    }
}
