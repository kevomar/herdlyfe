<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Herd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class Herdseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        // Create herds for each user
        foreach ($users as $user) {
            Herd::create([
                'user_id' => $user->id,
                'herd_name' => fake()->word(),
            ]);
        }
    }
}
