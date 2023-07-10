<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Breed;
use App\Models\Breeding;
use App\Models\Cattle;
use App\Models\Feed;
use App\Models\Health;
use App\Models\Herd;
use App\Models\Milk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Herd::factory(10)->create();
        Breed::factory(3)->create();
        Cattle::factory(200)->create();
        Milk::factory(100)->create();
        Health::factory(100)->create();
        Breeding::factory(100)->create();
        Feed::factory(100)->create();
    }
}
