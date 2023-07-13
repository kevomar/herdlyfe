<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Breed;
use App\Models\Breeding;
use App\Models\Cattle;
use App\Models\Feed;
use App\Models\Health;
use App\Models\Herd;
use App\Models\Market;
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
        User::factory(3)->create();
        $this->call([HerdSeeder::class]);
        Breed::factory(3)->create();
        Cattle::factory(20)->create();
        Milk::factory(100)->create();
        Health::factory(100)->create();
        Breeding::factory(100)->create();
        Feed::factory(100)->create();
        Market::factory(20)->create();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '1234567890',
            'gender' => 'M',
            'password' => bcrypt('password'),
            'role' => User::ROLE_ADMIN,
            'email_verified_at' => now(),
        ]);
    }
}
