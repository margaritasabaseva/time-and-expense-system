<div>

    <!-- Action notification alerts -->
    <div class ="mt-3">
        @if ($message = Session::get('successSubmitTimesheet'))
            <div class="alert alert-success alert-dismissible" role="alert">
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

    <!-- Timesheet for Employee Working Hours -->
    <form>
        <!-- action="{{ ('working-hours.store') }}" method="POST" -->
        <!-- action('working-hours.store') -->

        <!-- Form toolbar -->
            <div class="flex mx-3">
                <div class="ml-2 mt-2">
                    <x-jet-label for="timesheet_month" value="{{ __('Atskaites mēnesis') }}" class="font-bold"/>
                </div>

                <div class="ml-2">
                    <select name="timesheet_month" id="timesheet_month" class="w-40 form-select text-sm shadow-sm h-9">
                        <option value=""></option>
                        <option value="{{ __('Janvāris') }}"> {{ __('Janvāris') }} </option>
                        <option value="{{ __('Februāris') }}"> {{ __('Februāris') }} </option>
                        <option value="{{ __('Marts') }}"> {{ __('Marts') }} </option>
                        <option value="{{ __('Aprīlis') }}"> {{ __('Aprīlis') }} </option>
                        <option value="{{ __('Maijs') }}"> {{ __('Maijs') }} </option>
                        <option value="{{ __('Jūnijs') }}"> {{ __('Jūnijs') }} </option>
                        <option value="{{ __('Jūlijs') }}"> {{ __('Jūlijs') }} </option>
                        <option value="{{ __('Augusts') }}"> {{ __('Augusts') }} </option>
                        <option value="{{ __('Septembris') }}"> {{ __('Septembris') }} </option>
                        <option value="{{ __('Oktobris') }}"> {{ __('Oktobris') }} </option>
                        <option value="{{ __('Novembris') }}"> {{ __('Novembris') }} </option>
                        <option value="{{ __('Decembris') }}"> {{ __('Decembris') }} </option>
                    </select>
                    <br>@error('timesheet_month') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
                </div>

                <div class="ml-4 mr mt-2">
                    <x-jet-label for="timesheet_year" value="{{ __('Atskaites gads') }}" class="font-bold"/>
                </div>

                <div class="ml-2">
                    <select name="timesheet_year" id="timesheet_year" class="w-24 form-select text-sm shadow-sm">
                        <option value=""></option>
                        @for ($i = 2020; $i < 2028; $i++)
                                <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                    <br>@error('timesheet_year') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
                </div>

                <div class="ml-auto">
                    <x-jet-button class="mr-1" wire:click="submitWorkingHours">
                        {{ __('Iesniegt stundas') }}
                    </x-jet-button>
                </div>
            </div>

            <!-- Data Table -->
            <div class="flex flex-col">
                <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="pb-10 pt-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mx-3">
                        
                            <table class="table-fixed min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Datums</th>
                                        @for ($i = 0; $i < 5; $i++)
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @for ($i=0; $i <= 30; $i++)
                                    <tr>
                                        <td class="border font-bold text-lg break-words">
                                            <select name="timesheet_day" id="timesheet_day" class="w-20 form-select text-sm border-none" wire:model.debounce.800ms="timesheet_day">
                                                <option value=""></option>
                                                @for ($j = 1; $j < 32; $j++)
                                                        <option value="{{ $j }}"> {{ $j }} </option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td class="border text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none"/>
                                        </td>
                                        <td class="border text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none"/>
                                        </td>
                                        <td class="border text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none"/>
                                        </td>
                                        <td class="border text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none"/>
                                        </td>
                                        <td class="border text-sm break-words">
                                            <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $i }}][hours]" value="{{ old('working-hours['.$i.'][hours]') }}" type="number" min="0" max="24" style="border:none"/>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </form>

</div>
