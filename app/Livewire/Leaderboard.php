<?php

namespace App\Livewire;

use App\Leaderboard\Standings;
use App\Models\Race;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Leaderboard extends Component
{
    public Race $race;

    #[Layout('components.layouts.guest')]
    public function render(Standings $standings): View
    {
        return view('livewire.leaderboard')
            ->with('drivers', $standings->calculate($this->race));
    }
}
