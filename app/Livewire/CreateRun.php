<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Run;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRun extends Component
{
    public Driver $driver;

    #[Validate('required|int|min:0')]
    public int $elapsed_time = 0;

    #[Validate('required|int|min:0')]
    public int $penalty_count = 0;

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
        $run->save();

        $this->redirect(route('drivers.show', $this->driver));
    }

    public function render(): View
    {
        return view('livewire.create-run');
    }
}
