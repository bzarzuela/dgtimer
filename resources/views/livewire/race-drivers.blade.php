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
        </div>
    </div>
</div>
