<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reģistrēt darba stundas') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex items-center justify-end py-3 mr-3">
                    <x-jet-button class="mr-1">
                        {{ __('Iesniegt stundas') }}
                    </x-jet-button>
                </div>
                
                <div class="flex flex-col">
                    <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mx-3">
                                
                            <table class="table-fixed min-w-full">
                                
                                <thead>
                                    <tr>
                                        <th class="w-6 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Datums</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="font-bold px-6 py-2 text-sm break-words">
                                            01-Jan
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold px-6 py-2 text-sm break-words">
                                            02-Jan
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold px-6 py-2 text-sm break-words">
                                            03-Jan
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                        <td class="text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" type="number" style="border:none" wire:model.debounce.800ms="title"/>
                                        </td>
                                    </tr>
                                </tbody>
                            
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

</x-app-layout>