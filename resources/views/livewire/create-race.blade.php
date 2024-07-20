<div class="overflow-hidden bg-white shadow sm:rounded-lg mt-8">
    <div class="px-4 py-5 sm:p-6 space-y-4">

        <div class="border-b border-gray-200 pb-5">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Race</h3>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                <input required placeholder="ex: 86 Day 2024 Practice Run" type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Seconds per penalty</label>
            <div class="mt-2">
                <input required type="number" placeholder="Number of seconds to add per cone hit" min="0" step="1" name="time_per_penalty" id="time_per_penalty" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <x-heroicon-s-check-circle class="-ml-0.5 h-5 w-5" />
                Save New Race
            </button>
        </div>

    </div>
</div>
