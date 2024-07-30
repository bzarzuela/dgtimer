<div>
    <x-breadcrumbs>
        <x-breadcrumb>Accounts</x-breadcrumb>
    </x-breadcrumbs>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <ul role="list" class="space-y-3">
                @foreach ($users as $user)
                    <li class="overflow-hidden bg-white px-4 py-4 shadow sm:rounded-md sm:px-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                <p>{{ $user->name }}</p>
                                <p>{{ $user->email }}</p>
                            </h3>

                            @can('delete', $user)
                            <x-action-button icon="x-circle" wire:confirm="Are you sure you want to delete {{ $user->name }}?" wire:click.prevent="delete({{ $user->id }})" />
                            @endcan
                        </div>
                    </li>
                @endforeach
            </ul>

            @if ($default_password)
                <div class="rounded-md bg-green-50 p-4 mt-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <x-heroicon-o-check class="h-5 w-5 text-green-400" />
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Account Created</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Default password is <strong class="font-mono select-all">{{ $default_password }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow sm:rounded-lg mt-8">
                <form wire:submit.prevent="createUser" class="px-4 py-5 sm:p-6 space-y-4">

                    <div class="border-b border-gray-200 pb-5">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Create New Account</h3>
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
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <x-input required
                                     type="email"
                                     wire:model="email"
                                     class="w-full"
                                     id="email" />
                        </div>
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div>
                        <x-action-button icon="check-circle" type="submit">
                            Create Account
                        </x-action-button>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
