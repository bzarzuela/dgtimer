<div>
    <x-breadcrumbs>
        <x-breadcrumb>{{ $race->name }}</x-breadcrumb>
        <x-breadcrumb>Drivers</x-breadcrumb>
    </x-breadcrumbs>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <ul role="list" class="space-y-3">
                @foreach ($race->drivers as $driver)
                    <li class="overflow-hidden bg-white px-4 py-4 shadow sm:rounded-md sm:px-6">
                        <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">
                            {{ $driver->car_number }}
                            {{ $driver->name }}
                        </h3>

                        <div class="flex justify-between">
                            <x-link icon="clipboard-document-list" href="{{ route('drivers.show', $driver) }}">
                                Runs
                            </x-link>

                            <x-link icon="clock" href="{{ route('runs.create', $driver) }}">
                                New Timed Run
                            </x-link>

                            <x-action-button icon="x-circle" href="{{ route('runs.create', $driver) }}" wire:confirm="Are you sure you want to delete {{ $driver->name }}?" wire:click.prevent="delete({{ $driver->id }})" />
                        </div>
                    </li>
                @endforeach
            </ul>

            <livewire:create-driver :race="$race" />

            <div class="bg-white shadow sm:rounded-lg mt-8">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Delete Race</h3>
                    <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                        <div class="max-w-xl text-sm text-gray-500">
                            <p>All the drivers and timing data will be deleted</p>
                        </div>
                        <div class="mt-5 sm:ml-6 sm:mt-0 sm:flex sm:flex-shrink-0 sm:items-center">
                            <x-danger-button wire:confirm="Are you sure?" wire:click="deleteRace({{ $race->id }})">Delete Race</x-danger-button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
