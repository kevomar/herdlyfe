<?php

namespace Database\Factories;

use App\Models\Cattle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breeding>
 */
class BreedingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cattle_id' => Cattle::all()
                ->where('gender', '=', 'cow')
                ->random()->id,
            'sire_id' => Cattle::all()
                ->where('gender', '=', 'bull')
                ->random()->id,
            'date_of_breeding' => $dateOfBreeding = $this->faker->date(),
            'expected_date_of_delivery' => Carbon::parse($dateOfBreeding)
                ->addMonths(9)->toDateString(),
            'actual_date_of_delivery' => $this->faker->date(),

        ];
    }
}
