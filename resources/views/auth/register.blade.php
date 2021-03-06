<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-100 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-label for="last_name" :value="__('Apellido')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phone_number" :value="__('Teléfono')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number')" />
            </div>

            <div class="mt-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
                <select id="gender" name="gender"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option selected aria-selected="true" value="0">Masculino</option>
                    <option value="1">Femenino</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select id="type" name="type"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option selected aria-selected="true" value="0">Normal</option>
                    <option value="2">Doctor</option>
                    <option value="1">Administrador</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>
            <fieldset class="mt-4">
                <div>
                    <legend class="text-base font-medium text-gray-900">Doctor</legend>
                    <p class="text-sm text-gray-500">Los siguientes campos solo aplican a doctores.</p>
                </div>
                {{-- <div class="mt-4 mx-4 space-y-4">
                    <div class="flex items-center">
                        <input id="doctor" name="doctor" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <label for="doctor" class="ml-3 block text-sm font-medium text-gray-700">
                            Doctor
                        </label>
                    </div>
                </div> --}}
                <div class="mt-4 mx-4">
                    <x-label for="cedulas" :value="__('Cédula')" />

                    <x-input id="cedulas" class="block mt-1 w-full" type="text" name="cedulas"
                        :value="old('cedulas')" />
                </div>
                <div class="mt-4 mx-4">
                    <x-label for="titles" :value="__('Títulos')" />

                    <x-input id="titles" class="block mt-1 w-full" type="text" name="titles" :value="old('titles')"
                        placeholder="Dentista, Médico, etc..." />
                </div>
            </fieldset>

            <div class="mt-4">
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Registrar
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
