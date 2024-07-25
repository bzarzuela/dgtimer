<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Race;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateDriver extends Component
{
    public Race $race;

    #[Validate('required', 'string', 'max:255')]
    public string $name = '';

    #[Validate('required', 'string', 'max:255')]
    public string $car_number = '';

    public function saveDriver(): void
    {
        $this->validate();

        $driver = new Driver();
        $driver->race_id = $this->race->id;
        $driver->name = $this->name;
        $driver->car_number = $this->car_number;
        $driver->save();

        $this->redirectRoute('race.drivers', $this->race);
    }
}
