<div>
    <div class="flex items-center justify-end py-3">
        <x-jet-button wire:click="createUserModal">
            {{ __('Jauns lietotājs') }}
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
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Vārds, uzvārds</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-pasts</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Amats</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tālrunis</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" style="width:15%">Adrese</th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Lomas</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-sm break-words">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $item->email }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $item->jobTitle }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->phone }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->address }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"> 
                                        @foreach ($item->roles as $role)
                                            {{ $role->name }}
                                            <br>
                                        @endforeach 
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button  wire:click="updateUserModal({{ $item->id }})">
                                            {{ __('Rediģēt') }}
                                        </x-jet-button>
                                        <x-jet-danger-button  wire:click="deleteUserModal({{ $item->id }})">
                                            {{ __('Dzēst') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens lietotājs netika atrasts</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="userModalFormVisible">
        <x-slot name="title">
            {{ __('Pievienot jaunu lietotāju') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Vārds, uzvārds') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name"/>
                @error('name') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('E-pasts') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="email"/>
                @error('email') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="jobTitle" value="{{ __('Amats') }}" />
                <x-jet-input id="jobTitle" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="jobTitle"/>
                @error('jobTitle') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Tālrunis') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="phone"/>
                @error('phone') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Adrese') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="address"/>
                @error('address') <span class="text-red-500"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Lietotāja lomas') }}" />
                <label for="ROLE_EMPLOYEE" class="flex items-center mt-1">
                    <input id="ROLE_EMPLOYEE" type="checkbox" class="form-checkbox" name="ROLE_EMPLOYEE">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Pamatlietotājs') }}</span>
                </label>
                
                <label for="ROLE_MANAGER" class="flex items-center">
                    <input id="ROLE_MANAGER" type="checkbox" class="form-checkbox" name="ROLE_MANAGER">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Projektu vadītājs/ Grāmatvedis') }}</span>
                </label>

                <label for="ROLE_ADMIN" class="flex items-center mb-3">
                    <input id="ROLE_ADMIN" type="checkbox" class="form-checkbox" name="ROLE_ADMIN">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Administrators') }}</span>
                </label>
                        
            </div>
        </x-slot>

        <x-slot name="footer">
            @if ($userModelId)
                <x-jet-button class="ml-2" wire:click="updateUser" wire:loading.attr="disabled">
                    {{ __('Saglabāt') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="createUser" wire:loading.attr="disabled">
                    {{ __('Izveidot') }}
                </x-jet-button>
            @endif
            <x-jet-secondary-button wire:click="$toggle('userModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Atcelt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete User Confirmation Modal  -->
        <x-jet-dialog-modal wire:model="confirmDeleteUserVisible">
            <x-slot name="title">
                {{ __('Dzēst lietotāju') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Vai Jūs esat pārliecināts, ka vēlaties dzēst izvēlēto lietotāju?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Dzēst lietotāju') }}
                </x-jet-danger-button>

                <x-jet-secondary-button wire:click="$toggle('confirmDeleteUserVisible')" wire:loading.attr="disabled">
                    {{ __('Atcelt') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>