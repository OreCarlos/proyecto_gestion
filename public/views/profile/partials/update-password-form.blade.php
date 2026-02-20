<section class="max-w-xl">
    <header class="border-b border-gray-100 pb-4">
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <span class="text-blue-600">🔐</span> {{ __('Actualizar Contraseña') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __('Mantén tu cuenta protegida. Te recomendamos usar una contraseña larga y aleatoria para mayor seguridad.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div class="group">
            <x-input-label for="update_password_current_password" :value="__('Contraseña Actual')"
                class="font-semibold group-focus-within:text-blue-600 transition-colors" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-2 block w-full border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm"
                autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password" :value="__('Nueva Contraseña')"
                class="font-semibold group-focus-within:text-blue-600 transition-colors" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-2 block w-full border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm"
                autocomplete="new-password" placeholder="Crea una clave fuerte" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Nueva Contraseña')"
                class="font-semibold group-focus-within:text-blue-600 transition-colors" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-2 block w-full border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm"
                autocomplete="new-password" placeholder="Repite tu nueva clave" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button
                class="bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all px-6 py-2.5 shadow-md hover:shadow-lg">
                {{ __('Actualizar Clave') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-2"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm font-medium text-green-600 flex items-center gap-1">
                    <span class="text-lg">✅</span> {{ __('¡Cambios guardados!') }}
                </p>
            @endif
        </div>
    </form>
</section>
