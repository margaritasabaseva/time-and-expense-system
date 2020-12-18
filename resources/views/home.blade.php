<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sveicināti, ') }}{{ Auth::user()->name }}{{ __('!') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                 <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6">
                            <div class="flex items-center">
                                    <img src="{{asset('images/exclamation.svg')}}" class="" style="width:40px">
                                <div class="ml-2 text-lg leading-7 font-semibold">Atgādinājums</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Neaizmirstiet ievadīt savas nostrādātās darba stundas un veiktās izmaksas līdz pēdējās mēneša darba dienas beigām!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
</x-app-layout>