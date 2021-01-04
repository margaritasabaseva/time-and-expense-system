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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    <!-- wire:click="sortBy('submit_date')" -->
                                    Pēdējā pārskata iesniegšanas datums
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                <tr>
                                    <td class="font-bold px-6 py-4 text-sm break-words">
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
                                    <td class="px-6 py-4 text-right text-sm"></td>
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
    <x-jet-dialog-modal wire:model="userTimeReportModalVisible">
        <x-slot name="title">
            <div class="font-bold">
                {{ __('Darbinieka') }} "{{ $this->name }}" {{ __('darba stundu pārskats') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Darbinieka iesniegto stundu pārskats') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('userTimeReportModalVisible')" wire:loading.attr="disabled">
                {{ __('Aizvērt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>