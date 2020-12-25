<div>

    <div class="flex items-center justify-end pt-3">
        <!-- <div class="flex-1 text-sm">
            {{ __('Rādīt vienā lapā:') }}
            <select wire:model="perPage">
                <option class="text-sm">3</option>
                <option class="text-sm">5</option>
                <option class="text-sm">10</option>
                <option class="text-sm">20</option>
            </select>
        </div> -->

        <div class="flex items-center justify-end">
            <x-jet-button wire:click="createExpenseModal">
                {{ __('Jauns ieraksts') }}
            </x-jet-button>
        </div>
    </div>

    <!-- Data table -->
    <div class="flex flex-col">
        <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:12%;" wire:click="sortBy('project_id')">
                                    Projekts
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:15%;" wire:click="sortBy('vendor')">
                                    Pakalpojumu sniedzēja nosaukums
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('document_number')">
                                    Pirkuma dokumenta numurs
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('amount_euros')">
                                    Summa (EUR)
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('expense_date')">
                                    Datums (dokumentā norādītais)
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Izdevumu pamatojums/ apraksts
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($expenses->count())
                                @foreach ($expenses as $expense)
                                        @if ($expense->user_id == Auth::id())
                                        <tr>
                                            <td class="px-6 text-sm break-words">
                                                {{ $expense->project->title }} 
                                            </td>
                                            <td class="px-6 text-sm break-words">
                                                {{ $expense->vendor }}
                                            </td>
                                            <td class="px-6 text-sm break-words">
                                                {{ $expense->document_number }}
                                            </td>
                                            <td class="px-6 text-sm break-words">
                                                {{ $expense->amount_euros }}
                                            </td>
                                            <td class="px-6 text-sm whitespace-no-wrap">
                                                {{ $expense->expense_date }}
                                            </td>
                                            <td class="px-6 text-sm break-all">
                                                {{ $expense->expense_description }}
                                            </td>
                                            <td class="px-3 py-1">
                                                <x-jet-danger-button class="w-16 h-7" wire:click="deleteExpenseModal({{ $expense->id }})">
                                                    {{ __('Dzēst') }}
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                        
                                    <!-- elseif – ja lietotājam nav neviena ieraksta ar savu id 
                                        <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens izdevuma ieraksts netika atrasts</td>
                                        </tr> -->
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens izdevuma ieraksts netika atrasts</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="expenseModalFormVisible">

        <x-slot name="title">
            <div class="font-bold">    
                {{ __('Pievienot jaunu izdevumu ierakstu') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <!-- projektu drowpdown izvēlne -->
            </div>
            <div class="mt-4">
            <x-jet-label for="project_id" value="{{ __('Projekts') }}"/>
                <select name="project_id" id="project_id" class="w-full form-select text-sm shadow-sm" wire:model.debounce.800ms="project_id">
                    <option value="empty"></option>
                    @if ($projects->count())
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="vendor" value="{{ __('Pakalpojumu sniedzēja nosaukums') }}"/>
                <x-jet-input id="vendor" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="vendor"/>
                @error('vendor') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="document_number" value="{{ __('Pirkuma dokumenta numurs') }}"/>
                <x-jet-input id="document_number" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="document_number"/>
                @error('document_number') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="amount_euros" value="{{ __('Summa (EUR)') }}"/>
                <x-jet-input id="amount_euros" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="amount_euros"/>
                @error('amount_euros') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="expense_date" value="{{ __('Datums (dokumentā norādītais)') }}"/>
                <x-jet-input id="expense_date" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="expense_date"/>
                @error('expense_date') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="expense_description" value="{{ __('Izmaksu pamatojums/apraksts') }}"/>
                <x-jet-input id="expense_description" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="expense_description"/>
                @error('expense_description') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
                <x-jet-button class="ml-2" wire:click="createExpense" wire:loading.attr="disabled">
                    {{ __('Iesniegt') }}
                </x-jet-button>
                <x-jet-secondary-button wire:click="$toggle('expenseModalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Atcelt') }}
                </x-jet-secondary-button>
        </x-slot>

    </x-jet-dialog-modal>

    <!-- Delete Expense Confirmation Modal  -->
        <x-jet-dialog-modal wire:model="confirmDeleteExpenseVisible">
            <x-slot name="title">
                {{ __('Dzēst izvēlēto izdevumu ierakstu') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Vai Jūs esat pārliecināts, ka vēlaties dzēst izvēlēto  izdevumu ierakstu?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button class="ml-2" wire:click="deleteExpense" wire:loading.attr="disabled">
                    {{ __('Dzēst ierakstu') }}
                </x-jet-danger-button>

                <x-jet-secondary-button wire:click="$toggle('confirmDeleteExpenseVisible')" wire:loading.attr="disabled">
                    {{ __('Atcelt') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>