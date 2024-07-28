<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Race;
use Livewire\Component;

class RaceDrivers extends Component
{
    public Race $race;

    public function delete(Driver $driver): void
    {
        $this->authorize('delete', $driver);

        $driver->delete();
    }

    public function deleteRace(Race $race): void
    {
        $this->authorize('delete', $race);

        $race->delete();

        $this->redirectRoute('dashboard');
    }
}
