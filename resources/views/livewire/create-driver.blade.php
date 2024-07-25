<div class="overflow-hidden bg-white shadow sm:rounded-lg mt-8">
    <form wire:submit.prevent="saveDriver" class="px-4 py-5 sm:p-6 space-y-4">

        <div class="border-b border-gray-200 pb-5">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Driver for {{ $race->name }}</h3>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                <x-input required
                         type="text"
                         wire:model="name"
                         class="w-full"
                         id="name" />
            </div>
            <x-input-error for="name" class="mt-2" />
        </div>

        <div>
            <label for="car_number" class="block text-sm font-medium leading-6 text-gray-900">Car Number</label>
            <div class="mt-2">
                <x-input required
                         type="text"
                         wire:model="car_number"
                         class="w-full"
                         id="car_number" />
            </div>
            <x-input-error for="car_number" class="mt-2" />
        </div>

        <div>
            <x-action-button icon="check-circle" type="submit">
                Save New Driver
            </x-action-button>

        </div>

    </form>
</div>
