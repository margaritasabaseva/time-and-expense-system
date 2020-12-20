<div>
    <div class="flex items-center justify-end py-3">
        <x-jet-button wire:click="createExpenseModal">
            {{ __('Jauns ieraksts') }}
        </x-jet-button>
    </div>

    <!-- Data table -->
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Projekts</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Pakalpojumu sniedzēja nosaukums</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Pirkuma dokumenta numurs</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Summa (EUR)</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Datums (dokumentā norādītais)</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Izdevumu pamatojums/ apraksts</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($expenses->count())
                                @foreach ($expenses as $expense)
                                <tr>
                                    <td class="px-6 text-sm break-words">{{ $expense->project_id }}</td>
                                    <td class="px-6 text-sm break-words">{{ $expense->vendor }}</td>
                                    <td class="px-6 text-sm break-words">{{ $expense->document_number }}</td>
                                    <td class="px-6 text-sm break-words">{{ $expense->amount_euros }}</td>
                                    <td class="px-6 text-sm whitespace-no-wrap">{{ $expense->expense_date }}</td>
                                    <td class="px-6 text-sm break-words">{{ $expense->description }}</td>
                                    <td class="px-6 text-right text-sm">
                                        <x-jet-danger-button class="w-28" wire:click="deleteExpenseModal({{ $expense->id }})">
                                            {{ __('Dzēst') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
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

    {{ $expenses->links() }}

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
                <x-jet-label for="description" value="{{ __('Izmaksu pamatojums/apraksts') }}"/>
                <x-jet-input id="description" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="description"/>
                @error('description') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
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