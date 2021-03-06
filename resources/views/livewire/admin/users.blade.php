<div>
    <!-- Action Notification Alerts -->
    <div class ="mt-3">
        @if ($message = Session::get('successCreateUser'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('successAssignRoles'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('successUpdatePassword'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>    
                <strong class="text-sm">{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('successDeleteUser'))
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

    <!-- Page Toolbar -->
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
            <x-jet-button wire:click="createUserModal">
                {{ __('Jauns lietotājs') }}
            </x-jet-button>
        </div>

        <div class="flex justify-end">
            <input wire:model.debounce.300ms="search" class="form-input h-9" type="text" placeholder="Meklēt lietotājus...">
        </div>
    </div>

    <!-- Users Data Table -->
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:17%" wire:click="sortBy('name')">
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" style="width:22%" wire:click="sortBy('address')">
                                    Adrese
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" style="width:13%"></th>
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
                                    <td class="px-6 py-2 text-right">
                                        <x-jet-button class="w-24" wire:click="assignRolesModal({{ $user->id }})">
                                            {{ __('Lomas') }}
                                        </x-jet-button>
                                        <x-jet-button class="w-24" wire:click="updatePasswordModal({{ $user->id }})">
                                            {{ __('Parole') }}
                                        </x-jet-button>
                                        <x-jet-danger-button class="w-24" wire:click="deleteUserModal({{ $user->id }})">
                                            {{ __('Dzēst') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens lietotājs netika atrasts.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $users->links() }}

    <!-- User Modal Form -->
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
                @error('address') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
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
            <div class="font-bold">    
                {{ __('Rediģēt lietotāja') }} "{{ $this->name }}" {{ __('lomas') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                @if (is_array($this->roles))
                    @foreach ($this->roles as $key => $role)
                        <div>
                            <input type="checkbox" value="{{ $role["roleId"] }}" name="role_title" id="role_title_{{ $role["roleId"] }}"  @if ( $role["checked"] ) {{ 'checked' }}@endif wire:model='roles.{{ $key }}.{{ "checked" }}'>
                            <label for="role_title{{ $role["roleId"] }}" class="ml-2 text-sm text-gray-600">{{ $role["roleTitle"] }}</label>
                        </div>
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

    <!-- Update User Password Modal  -->
    <x-jet-dialog-modal wire:model="updatePasswordVisible">
        <x-slot name="title">
            <div class="font-bold">
                {{ __('Mainīt paroli lietotājam') }} "{{ $this->name }}"
            </div>
        </x-slot>

        <x-slot name="content">
        <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Parole') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" wire:model.debounce.800ms="password"/>
                @error('password') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="updatePassword" wire:loading.attr="disabled">
                {{ __('Mainīt paroli') }}
            </x-jet-button>

            <x-jet-secondary-button wire:click="$toggle('updatePasswordVisible')" wire:loading.attr="disabled">
                {{ __('Atcelt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete User Confirmation Modal  -->
    <x-jet-dialog-modal wire:model="confirmDeleteUserVisible">
        <x-slot name="title">
            <div class="font-bold">
                {{ __('Dzēst lietotāju') }} "{{ $this->name }}"
            </div>
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