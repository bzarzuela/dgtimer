<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Run>
 */
class RunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lapTime = $this->faker->numberBetween(60000, 120000);

        return [
            'race_id' => Race::factory(),
            'driver_id' => Driver::factory(),
            'lap_time_in_milliseconds' => $lapTime,
            'penalty_time_in_seconds' => 0,
            'penalty_count' => 0,
            'total_time_in_milliseconds' => $lapTime,
        ];
    }

    public function time(int $ms, int $penalties = 0): static
    {
        $penalty_time_in_seconds = $penalties * 2;

        return $this->state(fn(array $attributes) => [
            'total_time_in_milliseconds' => $ms + $penalty_time_in_seconds * 1000,
            'penalty_time_in_seconds' => $penalty_time_in_seconds,
            'lap_time_in_milliseconds' => $ms,
        ]);
    }

    public function forDriver(Driver $driver): static
    {
        return $this->state(fn(array $attributes) => [
            'driver_id' => $driver->id,
            'race_id' => $driver->race_id,
        ]);
    }
}
