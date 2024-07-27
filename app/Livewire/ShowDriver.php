<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Run;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowDriver extends Component
{
    public Driver $driver;

    public function newRun(): void
    {
        $this->redirect(route('runs.create', $this->driver));
    }

    public function delete(Run $run): void
    {
        $this->authorize('delete', $run);

        $run->delete();
    }

    public function render(): View
    {
        return view('livewire.show-driver');
    }
}
