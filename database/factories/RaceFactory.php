<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'seconds_per_penalty' => 2,
        ];
    }

    public function name(string $name): RaceFactory
    {
        return $this->state(fn(array $attributes) => [
            'name' => $name,
        ]);
    }
}
