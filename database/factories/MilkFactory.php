<?php

namespace Database\Factories;

use App\Models\Cattle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Milk>
 */
class MilkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //get the start of this year
        $startDate = date('Y-01-01');
        //get todays date
        $endDate = date('Y-m-d');
        return [
            'cattle_id' => Cattle::all()->where('gender', '=', 'cow')->random()->id,
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'shift' => $this->faker->randomElement([
                'morning', 'afternoon', 'evening',
            ]),
            'quantity' => $this->faker->randomNumber($nbDigits = [5, 30]),
        ];
    }
}
