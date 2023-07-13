<?php

namespace Database\Factories;

use App\Models\Cattle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market>
 */
class MarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cattle_id' => Cattle::all()->random()->id,
            //set the price betweeen a hundred and 200 thousand
            'price' => rand(100000, 200000),
        ];
    }
}
