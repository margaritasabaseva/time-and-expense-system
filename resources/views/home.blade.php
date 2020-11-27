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
                                    <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> -->
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