<?php

namespace Database\Factories;

use App\Models\Herd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feed>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'herd_id' => Herd::all()->random()->id,
            'feed_name' => $this->faker->word(),
            'quantity' => $quantity = $this->faker->randomNumber(),
            'unit_price' => $unit_price = $this->faker->randomNumber(),
            'total_price' => $quantity * $unit_price,
        ];
    }
}
