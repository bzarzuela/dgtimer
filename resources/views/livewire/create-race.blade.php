<div class="overflow-hidden bg-white shadow sm:rounded-lg mt-8">
    <div class="px-4 py-5 sm:p-6 space-y-4">

        <div class="border-b border-gray-200 pb-5">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Race</h3>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                <x-input required
                         placeholder="ex: 86 Day 2024 Practice Run"
                         type="text"
                         wire:model="name"
                         class="w-full"
                         id="name" />
            </div>
            <x-input-error for="name" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Seconds per penalty</label>
            <div class="mt-2">
                <x-input required
                         type="number"
                         placeholder="Number of seconds to add per cone hit"
                         min="0"
                         step="1"
                         wire:model="seconds_per_penalty"
                         id="seconds_per_penalty" />
            </div>
        </div>

        <div>
            <x-action-button icon="check-circle" wire:click="saveRace">
                Save New Race
            </x-action-button>

        </div>

    </div>
</div>
