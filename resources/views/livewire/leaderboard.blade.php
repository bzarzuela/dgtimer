<div x-init="Echo.channel('standings.{{ $race->id }}').listen('LeaderboardUpdated', () => { $wire.$refresh() })">
    <x-breadcrumbs>
        <x-breadcrumb href="{{ auth()->check() ? route('race.drivers', $race) : '' }}">{{ $race->name }}</x-breadcrumb>
        <x-breadcrumb>Leaderboard</x-breadcrumb>
    </x-breadcrumbs>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                <tr class="divide-x">
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Driver</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fastest</th>
                    @for($i = 1; $i <= $max_runs; $i++)
                        <th scope="col" class="px-3 py-3.5 text-left text-sm text-right font-semibold text-gray-900">Run {{ $i }}</th>
                    @endfor
                </tr>
                </thead>
                <tbody class="divide-y">
                @foreach ($drivers as $i => $driver)
                <tr class="divide-x">
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $i + 1 }}
                        {{ $driver->name }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $driver->fastest_time }}</td>
                    @foreach($driver->runs as $run)
                        @if ($run->fastest)
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-white font-bold bg-black text-right">{{ $run->total_time }}</td>
                        @else
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-right">{{ $run->total_time }}</td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


