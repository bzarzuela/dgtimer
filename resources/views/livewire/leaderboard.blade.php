<div>
    <x-breadcrumbs>
        <x-breadcrumb href="{{ auth()->check() ?? route('race.drivers', $race) }}">{{ $race->name }}</x-breadcrumb>
        <x-breadcrumb>Leaderboard</x-breadcrumb>
    </x-breadcrumbs>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row mx-2 text-sm">
                <div class="min-w-32 space-y-2 bg-white p-2">
                    @foreach($drivers as $driver)
                        <div>{{ $driver->name }}</div>
                    @endforeach
                </div>
                <div class="flex-1 overflow-x-auto space-y-2 bg-white p-2">
                    @foreach($drivers as $driver)
                        <div class="flex space-x-2 divide-x divide-green-500">
                            @foreach ($driver->runs as $run)
                                <div class="min-w-20 px-0.5 text-right">{{ $run->total_time }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="min-w-16 font-mono space-y-2 bg-white p-2">
                    @foreach($drivers as $driver)
                        <div>{{ $driver->fastest_time }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


