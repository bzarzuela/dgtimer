<div>
    <x-breadcrumbs>
        <x-breadcrumb href="{{ route('race.drivers', $driver->race) }}">{{ $driver->race->name }}</x-breadcrumb>
        <x-breadcrumb>{{ $driver->name }}</x-breadcrumb>
    </x-breadcrumbs>

    <div class="text-5xl text-center font-semibold my-8">
        {{ $driver->car_number }}
        {{ $driver->name }}
    </div>

    <div class="overflow-hidden bg-white shadow sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($driver->runs as $run)
            <li class="px-4 py-4 sm:px-6">
                <div class="flex justify-between">
                    <div>
                        <p>{{ $run->run_time }}</p>
                        <p>{{ $run->penalty_count }} {{ str('penalty')->plural($run->penalty_count) }}</p>
                    </div>

                    <div class="text-5xl font-mono">{{ $run->total_time }}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-8 text-center">
        <x-link icon="clock" href="{{ route('runs.create', $driver) }}">
            Record New Run
        </x-link>
    </div>
</div>
