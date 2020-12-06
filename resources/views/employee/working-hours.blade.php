<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reģistrēt darba stundas') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-4 px-4">
                 -->
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table-fixed min-w-full border-separate divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="w-40 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Projekts</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">01.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">02.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">03.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">04.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">05.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">06.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">07.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">08.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">09.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">10.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">11.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">12.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">13.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">14.01.</th>
                                            <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">15.01.</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="font-bold text-sm break-words text-center">
                                                    <select name="project" id="project" class="w-full">
                                                        <option value="empty" class="hidden"></option>
                                                        <option value="projekts1">Projekts 1</option>
                                                        <option value="projekts2">foreach loop caur visiem projektiem</option>
                                                    </select>
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
                                                <td class="font-bold px-6 py-4 text-sm break-words"></td>
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
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-bold px-6 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                            </tr>
                                            <tr>
                                                <td class="font-bold px-6 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                                <td class="px-3 py-4 text-sm break-words"></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>

            </div>
        </div>
    </div>  
</x-app-layout>