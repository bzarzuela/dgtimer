<?php

namespace App\Livewire;

use App\Models\Race;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RaceDrivers extends Component
{
    public Race $race;

    public function render(): View
    {
        return view('livewire.race-drivers');
    }
}
