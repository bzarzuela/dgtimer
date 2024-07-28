<?php

namespace App\Livewire;

use App\Leaderboard\Standings;
use App\Models\Race;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Leaderboard extends Component
{
    public Race $race;

    #[On('standings.3,LeaderboardUpdated')]
    public function updated()
    {
        logger('updated');
    }

    #[Layout('components.layouts.guest')]
    public function render(Standings $standings): View
    {
        $drivers = Cache::remember(
            'leaderboard.' . $this->race->id,
            now()->addMinutes(30),
            fn () => $standings->calculate($this->race)
        );

        return view('livewire.leaderboard')
            ->with('drivers', $drivers);
    }
}
