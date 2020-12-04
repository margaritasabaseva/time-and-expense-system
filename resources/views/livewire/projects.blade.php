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
                            @if ($data->count())
                                @foreach ($data as $item)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-sm break-words">{{ $item->title }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $item->description }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $item->responsibleManager }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->startDate }}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button  wire:click="updateProjectModal({{ $item->id }})">
                                            {{ __('Rediģēt') }}
                                        </x-jet-button>
                                        <x-jet-danger-button  wire:click="deleteProjectModal({{ $item->id }})">
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

    {{ $data->links() }}

    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="projectModalFormVisible">
        <x-slot name="title">
            {{ __('Pievienot jaunu projektu') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Nosaukums') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"/>
                @error('title') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Apraksts') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="description"/>
                @error('description') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="responsibleManager" value="{{ __('Atbildīgais projekta vadītājs') }}" />
                <x-jet-input id="responsibleManager" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="responsibleManager"/>
                @error('responsibleManager') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="startDate" value="{{ __('Sākuma datums') }}" />
                <x-jet-input id="startDate" class="date form-control" type="text" wire:model.debounce.800ms="startDate"/>
                @error('startDate') <span class="text-red-500"> {{ $message }} </span> @enderror

                <!-- <x-jet-input id="startDate" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="startDate"/> -->
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

        <!-- Nestrādā kā nākas – ja vienkārši izvēlas datumu un piespieš saglabāt, tas izdzēš datumu. Strādā, ja piespiež atstarpi utt pēc tam -->
    <script type="text/javascript">
        $('.date').datepicker({  
        format: 'mm-dd-yyyy'
        });  
    </script> 

</div>