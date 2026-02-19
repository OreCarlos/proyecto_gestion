<section class="max-w-xl">
    <header class="border-b border-gray-100 pb-4">
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <span class="text-indigo-600">👤</span> {{ __('Información del Perfil') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __('Actualiza la información de tu cuenta y tu dirección de correo electrónico.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div class="group">
            <x-input-label for="name" :value="__('Nombre Completo')"
                class="font-semibold group-focus-within:text-indigo-600 transition-colors" />
            <x-text-input id="name" name="name" type="text"
                class="mt-2 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg shadow-sm"
                :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Tu nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Correo Electrónico')"
                class="font-semibold group-focus-within:text-indigo-600 transition-colors" />
            <x-text-input id="email" name="email" type="email"
                class="mt-2 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg shadow-sm"
                :value="old('email', $user->email)" required autocomplete="username" placeholder="ejemplo@correo.com" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-amber-50 rounded-lg border border-amber-100">
                    <p class="text-sm text-amber-800 flex items-center gap-2">
                        <span>✉️</span> {{ __('Tu dirección de correo no ha sido verificada.') }}
                    </p>

                    <button form="send-verification"
                        class="mt-2 text-sm font-bold text-amber-900 underline hover:text-amber-700 transition-colors focus:outline-none">
                        {{ __('Haz clic aquí para reenviar el enlace de verificación.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-sm text-green-600">
                            {{ __('¡Listo! Se ha enviado un nuevo enlace a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button
                class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-all px-8 py-2.5 shadow-md hover:shadow-lg">
                {{ __('Guardar Cambios') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-2"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm font-medium text-green-600 flex items-center gap-1">
                    <span class="text-lg">✨</span> {{ __('Perfil actualizado con éxito.') }}
                </p>
            @endif
        </div>
    </form>
</section>
