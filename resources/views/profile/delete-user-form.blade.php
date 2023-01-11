<x-jet-form-section submit="deleteUser">
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete your account.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="current_password_d" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password_d" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password_d" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="repeat_password_d" value="{{ __('Repeat Password') }}" />
                <x-jet-input id="repeat_password_d" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="repeat_password_d" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-danger-button class="ml-3">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-slot>
</x-jet-form-section>
