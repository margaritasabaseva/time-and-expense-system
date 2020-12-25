<div>
    <!-- Notification alerts -->
    <div class ="mt-3">
        @if ($message = Session::get('successCreateProject'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('successUpdateProject'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('successDeleteProject'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif
    </div>

    <script>
        $('.alert').alert()
    </script>

    <div class="flex items-center justify-end">
        <div class="flex-1 text-sm">
            {{ __('Rādīt vienā lapā:') }}
            <select wire:model="perPage">
                <option class="text-sm">3</option>
                <option class="text-sm">5</option>
                <option class="text-sm">10</option>
                <option class="text-sm">20</option>
            </select>
        </div>

        <div class="flex items-center px-1">
            <x-jet-button wire:click="createProjectModal">
                {{ __('Jauns projekts') }}
            </x-jet-button>
        </div>
        
        <div class="flex justify-end">
            <input wire:model.debounce.300ms="search" class="form-input h-9" type="text" placeholder="Meklēt projektus...">
        </div>
    </div>

    <!-- Main projects data table -->
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:15%" wire:click="sortBy('title')">
                                    Nosaukums
                                </th>
                                <th class="w-96 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Apraksts
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:15%" wire:click="sortBy('responsible_manager')">
                                    Atbildīgais projekta vadītājs
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('start_date')">
                                    Sākuma datums
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($projects->count())
                                @foreach ($projects as $project)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-md break-words">
                                        <button class="font-bold text-left hover:text-gray-600 hover:underline" wire:click="showProjectExpensesModal({{ $project->id }})">  
                                            {{ $project->title }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        {{ $project->project_description }}
                                    </td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        {{ $project->responsible_manager }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        {{ $project->start_date }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button class="w-28" wire:click="updateProjectModal({{ $project->id }})">
                                            {{ __('Rediģēt') }}
                                        </x-jet-button>
                                        <x-jet-danger-button class="w-28" wire:click="deleteProjectModal({{ $project->id }})">
                                            {{ __('Dzēst') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens projekts netika atrasts</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $projects->links() }}

    <!-- Project Modal Form -->
    <x-jet-dialog-modal class="mt-20" wire:model="projectModalFormVisible">
        <x-slot name="title">
            <div class="font-bold">
                @if ($projectModelId)
                    {{ __('Rediģēt projektu') }} "{{ $this->title }}"
                @else
                    {{ __('Pievienot jaunu projektu') }}
                @endif
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Nosaukums') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"/>
                @error('title') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="project_description" value="{{ __('Apraksts') }}" />
                <x-jet-input id="project_description" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="project_description"/>
                @error('project_description') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="responsible_manager" value="{{ __('Atbildīgais projekta vadītājs') }}" />
                <x-jet-input id="responsible_manager" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="responsible_manager"/>
                @error('responsible_manager') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="start_date" value="{{ __('Sākuma datums') }}" />
                <x-jet-input id="start_date" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="start_date"/>
                @error('start_date') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            @if ($projectModelId)
                <x-jet-button class="ml-2" wire:click="updateProject" wire:loading.attr="disabled">
                    {{ __('Saglabāt') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="createProject" wire:loading.attr="disabled">
                    {{ __('Izveidot') }}
                </x-jet-button>
            @endif
            <x-jet-secondary-button wire:click="$toggle('projectModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Atcelt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete Project Confirmation Modal  -->
        <x-jet-dialog-modal wire:model="confirmDeleteProjectVisible">
            <x-slot name="title">
                <div class="font-bold">
                    {{ __('Dzēst projektu') }} "{{ $this->title }}"
                </div>
            </x-slot>

            <x-slot name="content">
                {{ __('Vai Jūs esat pārliecināts, ka vēlaties dzēst izvēlēto projektu?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button class="ml-2" wire:click="deleteProject" wire:loading.attr="disabled">
                    {{ __('Dzēst projektu') }}
                </x-jet-danger-button>

                <x-jet-secondary-button wire:click="$toggle('confirmDeleteProjectVisible')" wire:loading.attr="disabled">
                    {{ __('Atcelt') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>

    <!-- Show Project Expenses Modal-->
        <x-jet-dialog-modal wire:model="projectExpensesModalVisible" maxWidth="7xl">
            <x-slot name="title">
                <div class="font-bold">

                    {{ __('Projekta') }} "{{ $this->title }}" {{ __('izmaksu pārskats') }}
                </div>
            </x-slot>

            <x-slot name="content">
            <div class="flex flex-col">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="pt-2 align-middle sm:px-6 lg:px-8">
                        <div class="border border-gray-200 sm:rounded-lg overflow-x-auto max-h-96">
                            <table class="divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0" style="width:15%;">
                                            Pakalpojumu sniedzēja nosaukums
                                        </th>
                                        <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0">
                                            Pirkuma dokumenta numurs
                                        </th>
                                        <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0">
                                            Summa (EUR)
                                        </th>
                                        <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0">
                                            Datums (dokumentā norādītais)
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0">
                                            Pievienoja
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sticky top-0">
                                            Izdevumu pamatojums/ apraksts
                                        </th>
                                        <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer sticky top-0"></th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if ($expenses->count())
                                        @foreach ($expenses as $expense)
                                            @if ($expense->project_id == $projectModelId)
                                                <tr>
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
                                                        {{ $expense->user->name }}
                                                    </td>
                                                    <td class="px-6 text-sm break-all">
                                                        {{ $expense->expense_description }}
                                                    </td>
                                                    <td class="px-3 py-1">
                                                        <!-- <x-jet-button class="flex w-16 h-7" wire:click="editExpenseModal({{ $expense->id }})">
                                                            {{ __('Rediģēt') }}
                                                        </x-jet-button> -->
                                                        <x-jet-danger-button class="flex w-16 h-7" wire:click="deleteExpenseModal({{ $expense->id }})">
                                                            {{ __('Dzēst') }}
                                                        </x-jet-danger-button>
                                                    </td>
                                                </tr>
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

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('projectExpensesModalVisible')" wire:loading.attr="disabled">
                    {{ __('Aizvērt') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>

</div>