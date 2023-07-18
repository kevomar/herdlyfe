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
        //get all the cattle for sale

        return [
            'cattle_id' => function() {
                foreach ($cattle as $cattle) {
                    return $cattle->id;
                }
            },
        ];
    }
}
