<?php

namespace App\Livewire;

use App\Events\LeaderboardUpdated;
use App\Leaderboard\Standings;
use App\Models\Driver;
use App\Models\Run;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRun extends Component
{
    public Driver $driver;

    #[Validate('required|int|min:0')]
    public int $elapsed_time = 0;

    #[Validate('required|int|min:0')]
    public int $penalty_count = 0;

    protected $is_dnf = false;

    public function dnf(): void
    {
        $this->is_dnf = true;

        $this->save();
    }

    public function save(): void
    {
        $this->validate();

        $run = new Run();
        $run->race_id = $this->driver->race->id;
        $run->driver_id = $this->driver->id;
        $run->lap_time_in_milliseconds = $this->elapsed_time;
        $run->penalty_count = $this->penalty_count;
        $run->penalty_time_in_seconds = $run->penalty_count * $this->driver->race->seconds_per_penalty;
        $run->total_time_in_milliseconds = $run->lap_time_in_milliseconds + ($run->penalty_time_in_seconds * 1000);
        $run->is_dnf = $this->is_dnf;
        $run->save();

        $leaderboard = resolve(Standings::class)->calculate($this->driver->race);

        Cache::put('leaderboard.' . $this->driver->race_id, $leaderboard, now()->addMinutes(30));

        LeaderboardUpdated::dispatch($this->driver->race_id);

        $this->redirect(route('drivers.show', $this->driver));
    }
}
