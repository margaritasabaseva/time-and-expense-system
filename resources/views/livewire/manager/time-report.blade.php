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

        <div class="flex justify-end">
            <input wire:model.debounce.300ms="search" class="form-input h-9" type="text" placeholder="Meklēt darbiniekus...">
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
                                <th class="w-60 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('name')">
                                    Vārds, uzvārds
                                </th>
                                <th class="w-60 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('email')">
                                    E-pasts
                                </th>
                                <th class="w-80 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer form-select border-none" wire:click="sortBy('job_title')">
                                    Amats
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-md break-words">
                                        <button class="font-bold hover:text-gray-600 hover:underline" wire:click="showUserTimeReportModal({{ $user->id }})">
                                            {{ $user->name }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        {{ $user->job_title }}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Neviens darbinieks netika atrasts.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $users->links() }}

    <!-- Show User Time Report Modal -->
    <x-jet-dialog-modal wire:model="userTimeReportModalVisible" maxWidth="xl">
        <x-slot name="title">
            <div class="font-bold">
                {{ __('Darbinieka') }} "{{ $this->name }}" {{ __('darba stundu pārskats') }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex mt-3">
                <div class="mt-2">
                    <x-jet-label for="timesheet_month" value="{{ __('Atskaites mēnesis') }}" class="font-bold"/>
                </div>

                <div class="ml-2">
                    <select name="timesheet_month" id="timesheet_month" class="w-40 form-select text-sm shadow-sm h-9" wire:change="$emit('dateChanged')" wire:model="reportMonth">
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
                    <select name="timesheet_year" id="timesheet_year" class="w-24 form-select text-sm shadow-sm" wire:change="$emit('dateChanged')" wire:model="reportYear">
                        <option value=""></option>
                        @for ($i = 2020; $i < 2028; $i++)
                            <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                    <br>@error('timesheet_year') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
                </div>
            </div>

            <div class="mt-4">
                <table class="min-w-full divide-y divide-gray-200">
                    @if ($this->userReportData)
                        <thead>
                            <tr>
                                <th class="px-3 pt-3 pb-3 bg-gray-50 text-left text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">
                                    Projekts
                                </th>
                                <th class="px-3 pt-3 pb-3 bg-gray-50 text-left text-xs leading-4 font-bold text-gray-500 uppercase tracking-wider">
                                    Stundas
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($this->userReportData as $project=>$hours)
                                <tr class="mx-5">
                                    <th class="px-3 py-2 text-sm font-normal break-words">
                                        {{ $project }}
                                    </th>
                                    <th class="px-3 py-2 text-sm font-normal break-words">
                                        {{ $hours }}h
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <span class="text-500 text-sm"> {{ $this->noHoursMessage }} </span>
                    @endif
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('userTimeReportModalVisible')" wire:loading.attr="disabled">
                {{ __('Aizvērt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
