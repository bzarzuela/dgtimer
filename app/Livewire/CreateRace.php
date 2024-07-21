<?php

namespace App\Livewire;

use App\Models\Race;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateRace extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|integer|min:0')]
    public int $seconds_per_penalty = 2;

    public function saveRace(): void
    {
        $this->validate();

        $race = new Race();
        $race->name = $this->name;
        $race->seconds_per_penalty = $this->seconds_per_penalty;
        $race->save();

        $this->redirectRoute('dashboard');
    }

    public function render(): View
    {
        return view('livewire.create-race');
    }
}
