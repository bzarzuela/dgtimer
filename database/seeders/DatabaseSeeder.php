<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Race;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::forceCreate([
            'name' => 'Bryan',
            'email' => 'bryan@bryanz.com',
            'password' => bcrypt('lj23498l3inm45tlkegnv9345l'),
        ]);

        User::forceCreate([
            'name' => 'Chris',
            'email' => 'xco_22@yahoo.com',
            'password' => bcrypt('86-is-x2-of-43'),
        ]);

        $race = Race::factory()->name('86 Day 2024 Practice')->create();

        Driver::factory()->for($race)->count(10)->create();

        Race::factory()->name('86 Day 2024 Official')->create();
    }
}
