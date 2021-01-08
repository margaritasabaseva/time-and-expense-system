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
    <form  wire:submit.prevent="submit">
            <div class="flex mx-3">
                <div class="ml-2 mt-2">
                    <x-jet-label for="timesheet_month" value="{{ __('Atskaites mēnesis') }}" class="font-bold"/>
                </div>

                <div class="ml-2">
                    <select name="timesheet_month" id="timesheet_month" class="w-40 form-select text-sm shadow-sm h-9" wire:change="$emit('monthChanged')" wire:model="timesheet_month">
                        <option value=""></option>
                        <option value="1"> {{ __('Janvāris') }} </option>
                        <option value="2"> {{ __('Februāris') }} </option>
                        <option value="3"> {{ __('Marts') }} </option>
                        <option value="4" > {{ __('Aprīlis') }} </option>
                        <option value="5"> {{ __('Maijs') }} </option>
                        <option value="6" > {{ __('Jūnijs') }} </option>
                        <option value="7" > {{ __('Jūlijs') }} </option>
                        <option value="8" > {{ __('Augusts') }} </option>
                        <option value="9" > {{ __('Septembris') }} </option>
                        <option value="10"> {{ __('Oktobris') }} </option>
                        <option value="11" > {{ __('Novembris') }} </option>
                        <option value="12" > {{ __('Decembris') }} </option>
                    </select>
                    <br>@error('timesheet_month') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
                </div>

                <div class="ml-4 mr mt-2">
                    <x-jet-label for="timesheet_year" value="{{ __('Atskaites gads') }}" class="font-bold"/>
                </div>

                <div class="ml-2">
                    <select name="timesheet_year" id="timesheet_year" class="w-24 form-select text-sm shadow-sm" wire:change="$emit('yearChanged')" wire:model="timesheet_year">
                        <option value=""></option>
                        @for ($i = 2020; $i < 2028; $i++)
                                <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                    <br>@error('timesheet_year') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
                </div>

                <div class="ml-auto">
                    <x-jet-button class="mr-1" wire:loading.attr="disabled">
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
                                        <!----- Projects ----->
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none" wire:change="$emit('hoursChanged', 'slot_1')" wire:model="projectSlot1">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none" wire:change="$emit('hoursChanged', 'slot_2')" wire:model="projectSlot2">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none" wire:change="$emit('hoursChanged', 'slot_3')" wire:model="projectSlot3">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none" wire:change="$emit('hoursChanged', 'slot_4')" wire:model="projectSlot4">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        <th class="px-3 py-2 bg-gray-50 text-left leading-4 font-medium text-gray-500">
                                            <div clas="font-bold">
                                                <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none" wire:change="$emit('hoursChanged', 'slot_5')" wire:model="projectSlot5">
                                                    <option value="empty"></option>
                                                    @if ($projects->count())
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}"> {{ $project->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </th>
                                        <!------ End of projects ----->
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (is_array($this->monthlyWorkingHours))
                                        @foreach ($this->monthlyWorkingHours as $key => $project)
                                            <tr>
                                                <td class="border font-bold text-center">
                                                    <div>{{ $key }}</div>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $key }}][hours]" value="{{ old('working-hours['.$key.'][hours]') }}" type="number" min="0" max="24" step="0.01" style="border:none" wire:model='projectSlot1_data.{{ $key }}'/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $key }}][hours]" value="{{ old('working-hours['.$key.'][hours]') }}" type="number" min="0" max="24" step="0.01" style="border:none" wire:model='projectSlot2_data.{{ $key }}'/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $key }}][hours]" value="{{ old('working-hours['.$key.'][hours]') }}" type="number" min="0" max="24" step="0.01" style="border:none" wire:model='projectSlot3_data.{{ $key }}'/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $key }}][hours]" value="{{ old('working-hours['.$key.'][hours]') }}" type="number" min="0" max="24" step="0.01" style="border:none" wire:model='projectSlot4_data.{{ $key }}'/>
                                                </td>
                                                <td class="border text-sm break-words">
                                                    <x-jet-input id="hours" class="w-full shadow-none" name="working-hours[{{ $key }}][hours]" value="{{ old('working-hours['.$key.'][hours]') }}" type="number" min="0" max="24" step="0.01" style="border:none" wire:model='projectSlot5_data.{{ $key }}'/>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </form>

</div>
