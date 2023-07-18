<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Herd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cattle>
 */
class CattleFactory extends Factory
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
            'breed_id' => Breed::all()->random()->id,
            'cattle_name' => $this->faker->word(),
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement([
                'bull', 'cow',
            ]),
            'status' => $this->faker->randomElement([
                'for sale', 'not for sale',
            ]),
        ];
    }
}
