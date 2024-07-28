<?php

namespace App\Livewire;

use App\Leaderboard\Standings;
use App\Models\Race;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Leaderboard extends Component
{
    public Race $race;

    #[Layout('components.layouts.guest')]
    public function render(Standings $standings): View
    {
        $drivers = Cache::remember(
            'leaderboard.' . $this->race->id,
            now()->addMinutes(30),
            fn () => $standings->calculate($this->race)
        );

        $max = 0;
        foreach ($drivers as $driver) {
            if (count($driver->runs) > $max) {
                $max = count($driver->runs);
            }
        }

        return view('livewire.leaderboard')
            ->with('drivers', $drivers)
            ->with('max_runs', $max);
    }
}
