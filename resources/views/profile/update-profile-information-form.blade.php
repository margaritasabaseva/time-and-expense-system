<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profila informācija') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rediģējiet sava konta profila informāciju.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Vārds, uzvārds') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"/>
            @error('name') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-pasta adrese') }}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="state.email" />
            @error('email') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="job_title" value="{{ __('Amats') }}" />
            <x-jet-input id="job_title" type="text" class="mt-1 block w-full" wire:model.defer="state.job_title" />
            @error('job_title') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Tālruņa numurs') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
            @error('phone') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Adrese') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saglabāts.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Saglabāt') }}
        </x-jet-button>
    </x-slot>
    
</x-jet-form-section>