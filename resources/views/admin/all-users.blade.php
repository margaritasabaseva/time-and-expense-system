<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visi lietotāji') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    @foreach ($users as $user)
                        <div class="p-6">                
                            <div class="flex items-center">
                                <div class="ml-4 pl-8 text-lg leading-7 font-semibold">{{ $user->name }}</div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Amats: {{ $user->jobTitle }} <br>
                                    E-pasta adrese: {{ $user->email }} <br>
                                    Tālruņa numurs: {{ $user->phone }} <br>
                                    @foreach ($user->roles as $role)
                                        Lietotāja lomas: {{ $role->name }}
                                    @endforeach
                                    <div class="pt-10">
                                        <x-jet-section-border />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
</x-app-layout>