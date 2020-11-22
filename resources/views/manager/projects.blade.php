<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projekti') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />
    
        <div>
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                     </div>
                @endif
            </div>
        </div>    
</x-app-layout>