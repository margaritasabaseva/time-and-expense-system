<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visi lietotāji') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-4 px-4">
                @livewire('users')
            </div>
        </div>
    </div>  
</x-app-layout>
