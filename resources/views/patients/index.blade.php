<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Pacientes') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
            <x-alert>
            </x-alert>
            @endif
            @include('patients.components.table', ['patients' => $patients])
        </div>
    </div>

</x-app-layout>
