<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('passwords.password_confirm_message') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('passwords.password_label')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('passwords.confirm_button') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

