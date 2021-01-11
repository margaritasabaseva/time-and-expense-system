<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Paroles maiņa') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Izveidojiet drošu paroli, kuru neizmantojat, lai pierakstītos citos pakalpojumos.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Pašreizējā parole') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            @error('current_password') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Parole (jaunā)') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            @error('password') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Apstiprināt paroli') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            @error('password_confirmation') <span class="text-red-500 text-xs"> {{ $message }} </span> @enderror
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
