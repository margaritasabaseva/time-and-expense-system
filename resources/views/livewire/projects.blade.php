<div>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Jauns projekts') }}
        </x-jet-button>
    </div>

    <!-- Modal Form -->
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Pievienot jaunu projektu') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Nosaukums') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Apraksts') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="description"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="startDate" value="{{ __('Sākuma datums') }}" />
                <x-jet-input id="startDate" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="startDate"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="createProject" wire:loading.attr="disabled">
                    {{ __('Saglabāt') }}
            </x-jet-button>

            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Atcelt') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>