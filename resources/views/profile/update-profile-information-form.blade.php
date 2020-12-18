<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profila informācija') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Rediģējiet sava konta profila informāciju.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Vārds -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Vārds, uzvārds') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <!-- <x-jet-input-error for="name" class="mt-2" /> -->
        </div>

        <!-- E-pasts -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-pasta adrese') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <!-- <x-jet-input-error for="email" class="mt-2" /> -->
        </div>

        <!-- Amats -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="jobTitle" value="{{ __('Amats') }}" />
            <x-jet-input id="jobTitle" type="jobTitle" class="mt-1 block w-full" wire:model.defer="state.jobTitle" />
            <!-- <x-jet-input-error for="jobTitle" class="mt-2" /> -->
        </div>

        <!-- Tālruņa numurs -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Tālruņa numurs') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <!-- <x-jet-input-error for="phone" class="mt-2" /> -->
        </div>

        <!-- Adrese -->
            <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Adrese') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" />
            <!-- <x-jet-input-error for="address" class="mt-2" /> -->
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saglabāts.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Saglabāt') }}
        </x-jet-button>
    </x-slot>
    
</x-jet-form-section>