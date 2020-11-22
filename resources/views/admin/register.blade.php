<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reģistrēt jaunu lietotāju') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

        <div>
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-20">
                <form method="POST" action="{{ route('register') }}">
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
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="email" value="{{ __('E-pasts') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div>
                        <x-jet-label for="email" value="{{ __('Lietotāja grupa') }}" />
                        <!-- Add arrow for this dropdown! Right now using form-input class from public\css, need to add class with arrow in resources\css -->
                        <!-- Need to save chosen option as key to user table -->
                        <select class="arrow block mt-1 w-full form-input rounded-md shadow-smv">
                            <option>Pamatlietotājs</option>
                            <option>Projektu vadītājs/ Grāmatvedis</option>
                            <option>Administrators</option>
                        </select>
                    </div>

                    <div>
                        <x-jet-label for="password" value="{{ __('Parole') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div>
                        <x-jet-label for="password_confirmation" value="{{ __('Apstiprināt paroli') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
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
