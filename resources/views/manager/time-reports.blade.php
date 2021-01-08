<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Darbinieku stundu pārskats') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-4 px-4">
                @livewire('time-reports')
            </div>
        </div>
    </div>     
</x-app-layout>