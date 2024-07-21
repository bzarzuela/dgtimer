<div>
    <x-breadcrumbs>
        <x-breadcrumb href="{{ route('race.drivers', $driver->race) }}">{{ $driver->race->name }}</x-breadcrumb>
    </x-breadcrumbs>

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

    <div class="flex justify-center mt-8">
        <button wire:click.prevent="save" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <x-heroicon-m-check-circle class="-ml-0.5 h-5 w-5" />
            Save Run
        </button>
    </div>

    <div class="flex justify-center mt-4">
        <div>
            <x-input-error for="elapsed_time" />
            <x-input-error for="penalty_count" />
        </div>
    </div>



</div>
