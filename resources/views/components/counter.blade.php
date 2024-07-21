<div x-data="{ counter: 0 }" x-modelable="counter" class="flex items-center" {{ $attributes }}>
    <button @click="counter--" type="button" class="px-4 py-2 text-lg font-semibold text-white bg-red-500 hover:bg-red-600 focus:outline-none focus-border-indigo-700 border-2 border-r-0 rounded-l-md border-indigo-700">
        <x-heroicon-c-minus-circle class="h-7 w-7" />
    </button>
    <input x-model="counter" type="number" class="w-24 px-4 py-2 text-lg text-center border-2 border-indigo-700 border-r-0 border-l-0 focus:outline-none" />
    <button @click="counter++" type="button" class="px-4 py-2 text-lg font-semibold text-white bg-green-500 border-l-0 border-2 rounded-r-md border-indigo-700 hover:bg-green-600 focus:outline-none focus:border-indigo-700">
        <x-heroicon-c-plus-circle class="h-7 w-7" />
    </button>
</div>
