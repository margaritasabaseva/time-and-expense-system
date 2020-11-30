<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reģistrēt jaunu lietotāju') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

        <div>
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-20">
                <form method="POST" action="{{ route('createUser') }}">
                    @csrf

                    <div>                        
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <x-jet-label for="name" value="{{ __('Vārds, uzvārds') }}" />
                        <x-jet-input id="name" class="block mt-1 mb-3 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="email" value="{{ __('E-pasts') }}" />
                        <x-jet-input id="email" class="block mt-1 mb-3 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div>
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

                    <div>
                        <x-jet-label for="password" value="{{ __('Parole') }}" />
                        <x-jet-input id="password" class="block mt-1 mb-3 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div>
                        <x-jet-label for="password_confirmation" value="{{ __('Apstiprināt paroli') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 mb-3 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-jet-button class="ml-4">
                            {{ __('Reģistrēt jaunu lietotāju') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>    
</x-app-layout>
