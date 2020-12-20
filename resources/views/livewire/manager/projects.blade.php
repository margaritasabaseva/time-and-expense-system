<div>
    <div class="flex items-center justify-end py-3">
        <x-jet-button wire:click="createProjectModal">
            {{ __('Jauns projekts') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" style="width:15%">Nosaukums</th>
                                <th class="w-96 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Apraksts</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" style="width:15%">Atbildīgais projekta vadītājs</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sākuma datums</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($projects->count())
                                @foreach ($projects as $project)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-md break-words">
                                        <button class="font-bold text-left" wire:click="showProjectExpensesModal({{ $project->id }})">  
                                            {{ $project->title }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $project->description }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $project->responsible_manager }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $project->start_date }}</td>
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

    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="projectModalFormVisible">
        <x-slot name="title">
            <div class="font-bold">
                @if ($projectModelId)
                    {{ __('Rediģēt projektu') }}
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
                <x-jet-label for="description" value="{{ __('Apraksts') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="description"/>
                @error('description') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
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
                {{ __('Dzēst projektu') }}
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
        <x-jet-dialog-modal wire:model="projectExpensesModalVisible">
            <x-slot name="title">
                <div class="font-bold">
                    {{ __('Projekta izmaksu pārskats') }}
                </div>
            </x-slot>

            <x-slot name="content">
                {{ __('Projekta izmaksas') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('projectExpensesModalVisible')" wire:loading.attr="disabled">
                    {{ __('Aizvērt') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>

</div>