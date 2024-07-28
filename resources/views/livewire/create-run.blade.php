<div>
    <x-breadcrumbs>
        <x-breadcrumb href="{{ route('race.drivers', $driver->race) }}">{{ $driver->race->name }}</x-breadcrumb>
    </x-breadcrumbs>

    <div class="flex justify-center mt-8 space-x-8">
        <x-action-button icon="x-circle" wire:click.prevent="dnf">DNF</x-action-button>
        <x-action-button icon="check-circle" wire:click.prevent="save">Save Run</x-action-button>
    </div>

    <div class="text-5xl text-center font-semibold my-8">
        {{ $driver->car_number }}
        {{ $driver->name }}
    </div>

    <div>
        <x-timer wire:model="elapsed_time" />
    </div>

    <div class="flex justify-center mt-16">
        <x-counter wire:model="penalty_count" />
    </div>

    <div class="flex justify-center mt-4">
        <div>
            <x-input-error for="elapsed_time" />
            <x-input-error for="penalty_count" />
        </div>
    </div>



</div>
