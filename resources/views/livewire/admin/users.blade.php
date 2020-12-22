<div>
    <div class="flex items-center justify-end pt-3">
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
            <x-jet-button wire:click="createUserModal">
                {{ __('Jauns lietotājs') }}
            </x-jet-button>
        </div>

        <div class="flex justify-end">
            <input wire:model.debounce.300ms="search" class="form-input h-9" type="text" placeholder="Meklēt lietotājus...">
        </div>
    </div>

    <!-- Data table -->
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class=" px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('name')">
                                    Vārds, uzvārds
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('email')">
                                    E-pasts
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('job_title')">
                                    Amats
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Tālrunis
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:17%" wire:click="sortBy('address')">
                                    Adrese
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    <!-- wire:click="sortBy('role_title')" -->
                                    Lomas
                                </th>
                                <th class="w-10 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-sm break-words">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $user->job_title }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $user->phone }}</td>
                                    <td class="px-6 py-4 text-sm break-words">{{ $user->address }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"> 
                                        @foreach ($user->roles as $role)
                                            {{ $role->role_title }}
                                            <br>
                                        @endforeach 
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button class="w-28" wire:click="assignRolesModal({{ $user->id }})">
                                            {{ __('Lomas') }}
                                        </x-jet-button>
                                        <x-jet-danger-button class="w-28" wire:click="deleteUserModal({{ $user->id }})">
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

    {{ $users->links() }}

    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="userModalFormVisible">
        <x-slot name="title">
            <div class="font-bold">    
                    {{ __('Pievienot jaunu lietotāju') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Vārds, uzvārds') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="name"/>
                @error('name') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('E-pasts') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="email"/>
                @error('email') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="job_title" value="{{ __('Amats') }}"/>
                <x-jet-input id="job_title" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="job_title"/>
                @error('job_title') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Tālrunis') }}"/>
                <x-jet-input id="phone" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="phone"/>
                @error('phone') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Adrese') }}"/>
                <x-jet-input id="address" class="block mt-1 w-full text-sm" type="text" wire:model.debounce.800ms="address"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Parole') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" wire:model.debounce.800ms="password"/>
                @error('password') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
                <x-jet-button class="ml-2" wire:click="createUser" wire:loading.attr="disabled">
                    {{ __('Izveidot') }}
                </x-jet-button>
                <x-jet-secondary-button wire:click="$toggle('userModalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Atcelt') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


    <!-- Assign Roles to User Modal  -->
    <x-jet-dialog-modal wire:model="assignRolesVisible">
        <x-slot name="title">
            {{ __('Rediģēt lietotāja lomas') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <!-- test: ievietot value vietās ciparus -->
                <!-- <label for="ROLE_EMPLOYEE" class="flex items-center mt-1">
                    <input id="ROLE_EMPLOYEE" type="checkbox" class="form-checkbox" name="ROLE_EMPLOYEE" value="ROLE_EMPLOYEE">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Pamatlietotājs') }}</span>
                </label>                
                <label for="ROLE_MANAGER" class="flex items-center">
                    <input id="ROLE_MANAGER" type="checkbox" class="form-checkbox" name="ROLE_MANAGER" value="ROLE_MANAGER">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Projektu vadītājs/ Grāmatvedis') }}</span>
                </label>
                <label for="ROLE_ADMIN" class="flex items-center mb-3">
                    <input id="ROLE_ADMIN" type="checkbox" class="form-checkbox" name="ROLE_ADMIN" value="ROLE_ADMIN">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Administrators') }}</span>
                </label>   -->

                @if ($users->count())
                    @foreach ($users as $user)
                        @foreach ($user->roles as $role)
                            <div>
                                <input type="checkbox" value="{{$role->id}}" name="role_title[]" id="role_title{{ $role->id }}">                                
                                <label for="role_title{{ $role->id }}" class="ml-2 text-sm text-gray-600">{{$role->role_title}}</label>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>   
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="assignRoles" wire:loading.attr="disabled">
                {{ __('Saglabāt') }}
            </x-jet-button>

            <x-jet-secondary-button wire:click="$toggle('assignRolesVisible')" wire:loading.attr="disabled">
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