<?php

namespace App\Leaderboard;

use App\Models\Race;

class Standings
{
    /**
     * @param Race $race
     * @return array<DriverData>
     */
    public function calculate(Race $race): array
    {
        return $race->runs
            ->where('is_dnf', false)
            ->sortBy('total_time_in_milliseconds')
            ->unique('driver_id')
            ->whereNotNull('driver_id')
            ->map(function ($run) use ($race) {
                return new DriverData(
                    $run->driver?->name,
                    $run->total_time,
                    $race->runs
                        ->where('driver_id', $run->driver_id)
                        ->map(fn($r) => RunData::fromRun($r, $r->id === $run->id))
                        ->toArray()
                );
            })->values()->toArray();
    }
}
