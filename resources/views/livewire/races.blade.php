<div>
    <x-breadcrumbs>
        <x-breadcrumb>Races</x-breadcrumb>
    </x-breadcrumbs>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <ul role="list" class="space-y-3">
                @foreach ($races as $race)
                <li class="overflow-hidden bg-white px-4 py-4 shadow sm:rounded-md sm:px-6">
                    <div class="flex justify-between">
                        <h2 class="text-base font-semibold leading-6 text-gray-900 mb-4">{{ $race->name }}</h2>
                        <h3 class="text-sm leading-6 text-gray-700 mb-4">
                            {{ $race->seconds_per_penalty }}
                            {{ str('second')->plural($race->seconds_per_penalty) }}
                            per penalty
                        </h3>
                    </div>

                    <div class="flex justify-between">
                        <x-link icon="user" href="{{ route('race.drivers', $race) }}">Drivers</x-link>
                        <x-link icon="trophy" href="{{ route('race.leaderboard', $race) }}">Leaderboard</x-link>
                    </div>
                </li>
                @endforeach
            </ul>

            <livewire:create-race />

        </div>
    </div>
</div>
