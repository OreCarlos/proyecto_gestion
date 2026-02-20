<section class="space-y-6">
    <header class="border-b border-red-100 pb-4">
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <span class="text-red-500">⚠️</span> {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __('Ten en cuenta que una vez que elimines tu cuenta, todos sus recursos y datos se borrarán de forma permanente. Por favor, descarga cualquier información que desees conservar antes de proceder.') }}
        </p>
    </header>

    <x-danger-button class="bg-red-600 hover:bg-red-700 transition-all duration-300 shadow-sm" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Sí, deseo eliminar mi cuenta') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-lg">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-extrabold text-gray-900 border-b pb-3">
                {{ __('¿Estás completamente seguro?') }}
            </h2>

            <p class="mt-4 text-sm text-gray-600 bg-red-50 p-4 rounded-md border-l-4 border-red-400">
                {{ __('Esta acción no se puede deshacer. Para confirmar que realmente deseas eliminar tu cuenta de forma permanente, por favor ingresa tu contraseña a continuación.') }}
            </p>

            <div class="mt-8">
                <x-input-label for="password" value="{{ __('Contraseña de confirmación') }}" class="font-semibold" />

                <x-text-input id="password" name="password" type="password"
                    class="mt-2 block w-full md:w-3/4 border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm"
                    placeholder="{{ __('Ingresa tu contraseña actual') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex justify-end items-center gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="border-none hover:text-gray-900">
                    {{ __('No, cancelar') }}
                </x-secondary-button>

                <x-danger-button class="px-6 py-3 uppercase tracking-widest text-xs font-bold shadow-lg">
                    {{ __('Confirmar Eliminación') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
