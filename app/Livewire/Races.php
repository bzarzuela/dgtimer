<?php

namespace App\Livewire;

use App\Models\Race;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Races extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.races', [
            'races' => Race::query()->latest()->paginate(),
        ]);
    }
}
