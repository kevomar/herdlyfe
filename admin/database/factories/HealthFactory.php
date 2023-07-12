<?php

namespace Database\Factories;

use App\Models\Cattle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\health>
 */
class HealthFactory extends Factory
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
            'date' => $this->faker->date(),
            'disease' => $this->faker->word(),
            'treatment' => $this->faker->word(),
        ];
    }
}
