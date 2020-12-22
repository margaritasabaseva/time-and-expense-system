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

                <form>
                <!-- action="{{ ('working-hours.store') }}" method="POST" -->
                <!-- action('working-hours.store') -->

                    <div class="flex items-center justify-end py-3 mx-3">
                        <div class="flex-1 text-lg ml-1">
                            {{ __('Ievadiet datumu, kā arī noteiktajā datumā nostrādātās stundas atbilstoši izvēlētajiem projektiem u.c.') }}
                        </div>
                        <x-jet-button class="mr-1" type="submit">
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
                                                <th class="px-3 py-2 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Datums</th>
                                                <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                                <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                                <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                                <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                                <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">@livewire('project-in-working-hours')</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @for ($i=0; $i <= 30; $i++)
                                            <tr>
                                                <td class="border font-bold text-lg break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none text-sm font-bold" name="working-hours[{{ $i }}][date]" value="{{ old('working-hours['.$i.'][date]') }}" type="text" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none" wire:model.debounce.800ms="title"/>
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>  
</x-app-layout>