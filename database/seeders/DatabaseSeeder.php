<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Bryan',
            'email' => 'bryan@bryanz.com',
            'password' => bcrypt('lj23498l3inm45tlkegnv9345l'),
        ]);

        User::factory()->create([
            'name' => 'Chris',
            'email' => 'xco_22@yahoo.com',
            'password' => bcrypt('alkefs-lsendk-slnfgle'),
        ]);

        Race::factory()->name('86 Day 2024 Practice')->create();
        Race::factory()->name('86 Day 2024 Official')->create();
    }
}
