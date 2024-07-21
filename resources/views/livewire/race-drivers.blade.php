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
                        <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">{{ $driver->name }}</h3>

                        <div class="flex justify-between">
                            <a href="{{ route('drivers.show', $driver) }}" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-heroicon-o-clipboard-document-list class="-ml-0.5 h-5 w-5" />
                                Runs
                            </a>

                            <a href="{{ route('runs.create', $driver) }}" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-heroicon-s-clock class="-ml-0.5 h-5 w-5" />
                                New Timed Run
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
