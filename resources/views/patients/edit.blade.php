<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Pacientes
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $patient->full_name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Datos personales
                    </p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <form method="post" action="{{ route('patients.update', $patient) }}">
                                @csrf
                                @method('patch')
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text" name="name" id="name" value="{{ $patient->name }}"
                                            autocomplete="given-name" required
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name"
                                            class="block text-sm font-medium text-gray-700">Apellido</label>
                                        <input type="text" name="last_name" id="last_name"
                                            value="{{ $patient->last_name }}" autocomplete="family-name" required
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="street_address"
                                            class="block text-sm font-medium text-gray-700">Calle</label>
                                        <input type="text" name="street" id="street" value="{{ $patient->street }}"
                                            autocomplete="street"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="street_number" class="block text-sm font-medium text-gray-700">No.
                                            Calle</label>
                                        <input type="text" name="street_number" id="street_number"
                                            value="{{ $patient->street_number }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                                        <input type="text" name="city" id="city" value="{{ $patient->city }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="state"
                                            class="block text-sm font-medium text-gray-700">Estado</label>
                                        <input type="text" name="state" id="state" value="{{ $patient->state }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="zip_code" class="block text-sm font-medium text-gray-700">Código
                                            Postal</label>
                                        <input type="text" name="zip_code" id="zip_code"
                                            value="{{ $patient->zip_code }}" autocomplete="postal-code"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">País</label>
                                        <input type="text" name="country" id="country" value="{{ $patient->country }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="birth_city" class="block text-sm font-medium text-gray-700">Ciudad
                                            (nacimiento)</label>
                                        <input type="text" name="birth_city" id="birth_city"
                                            value="{{ $patient->birth_city }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="birth_state" class="block text-sm font-medium text-gray-700">Estado
                                            (nacimiento)</label>
                                        <input type="text" name="birth_state" id="birth_state"
                                            value="{{ $patient->birth_state }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="birth_country" class="block text-sm font-medium text-gray-700">País
                                            (nacimiento)</label>
                                        <input type="text" name="birth_country" id="birth_country"
                                            value="{{ $patient->birth_country }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Estado
                                            civil</label>
                                        <select id="status" name="status"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1" {{ $patient->status == 1 ? 'selected' : '' }}>Casado
                                            </option>
                                            <option value="2" {{ $patient->status == 2 ? 'selected' : '' }}>Soltero
                                            </option>
                                            <option value="0" {{ $patient->status == 0 ? 'selected' : '' }}>Otro
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">Ocupación</label>
                                        <select id="occupation" name="occupation"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1" {{ $patient->occupation == 1 ? 'selected' : '' }}>Empleado
                                            </option>
                                            <option value="2" {{ $patient->occupation == 2 ? 'selected' : '' }}>
                                                Estudiante</option>
                                            <option value="3" {{ $patient->occupation == 3 ? 'selected' : '' }}>
                                                Estudiante tiempo parcial
                                            </option>
                                            <option value="0" {{ $patient->occupation == 0 ? 'selected' : '' }}>Otro
                                            </option>
                                        </select>
                                    </div>



                                    <div class="col-span-6">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Correo
                                            electrónico</label>
                                        <input type="text" name="email" id="email" autocomplete="email"
                                            value="{{ $patient->email }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-3">
                                        <label for="gender"
                                            class="block text-sm font-medium text-gray-700">Género</label>
                                        <select id="gender" name="gender"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option {{ $patient->gender == 0 ? 'selected' : '' }} value="0">Masculino
                                            </option>
                                            <option value="1" {{ $patient->gender == 1 ? 'selected' : '' }}>Femenino
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-span-3">
                                        <label for="start" class="block text-sm font-medium text-gray-700">Fecha de
                                            nacimiento</label>
                                        <input type="date"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            id="birth_date" name="birth_date"
                                            value="{{ $patient->birth_date->format('Y-m-d') }}" /> </div>
                                    <div class="col-span-6">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <input type="text" name="phone_number" id="phone_number"
                                            value="{{ $patient->phone_number }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">
                                                    Hoja de primera vez
                                                </legend>
                                                <p class="text-sm text-gray-500">
                                                    Llenar los siguientes datos.
                                                </p>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- FIRST TIME FORM -->
                                    <div class="col-span-3">
                                        <label for="date" class="font-medium text-gray-700">Fecha de llegada</label>
                                        <input id="date" name="date" type="date"
                                            value="{{ $patient->firstTimePatientForm->date->format('Y-m-d')}}"
                                            class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48" />
                                    </div>
                                    <div class="col-span-3">
                                        <label for="arrival_time" class="font-medium text-gray-700">Hora de
                                            llegada</label>
                                        <input id="arrival_time" name="arrival_time" type="time"
                                            value="{{ $patient->firstTimePatientForm->arrival_time->format('H:i')}}"
                                            class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48" />
                                    </div>
                                    <div class="col-span-3">
                                        <fieldset>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="firstVisit" name="firstVisit" type="checkbox"
                                                            {{ $patient->firstTimePatientForm->firstVisit ? 'checked' : ''}}
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="firstVisit" class="font-medium text-gray-700">¿Había
                                                            venido
                                                            antes?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-span-3">
                                        <label for="children" class="font-medium text-gray-700">¿Cuántos hijos
                                            tiene?</label>
                                        <input id="children" name="children" type="number" min="0"
                                            value="{{ $patient->firstTimePatientForm->children }}"
                                            class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="referral" class="block text-sm font-medium text-gray-700">¿Quién lo
                                            recomendó?</label>
                                        <select id="referral" name="referral"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1"
                                                {{ $patient->firstTimePatientForm->referral == 1 ? 'selected' : ''}}>
                                                Farmacia</option>
                                            <option value="2"
                                                {{ $patient->firstTimePatientForm->referral == 2 ? 'selected' : ''}}>
                                                Familiar</option>
                                            <option value="3"
                                                {{ $patient->firstTimePatientForm->referral == 3 ? 'selected' : ''}}>
                                                Amigo</option>
                                            <option value="4"
                                                {{ $patient->firstTimePatientForm->referral == 4 ? 'selected' : ''}}>
                                                Sólo</option>
                                            <option value="5"
                                                {{ $patient->firstTimePatientForm->referral == 5 ? 'selected' : ''}}>
                                                Rótulo</option>
                                            <option value="0"
                                                {{ $patient->firstTimePatientForm->referral == 0 ? 'selected' : ''}}>
                                                Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="referrer_name"
                                            class="block text-sm font-medium text-gray-700">Nombre de
                                            quien lo recomendó</label>
                                        <input type="text" name="referrer_name" id="referrer_name"
                                            value="{{ $patient->firstTimePatientForm->referrer_name }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <!-- Contact -->
                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">
                                                    Contacto de emergencia
                                                </legend>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="contact_name" class="block text-sm font-medium text-gray-700">En
                                            caso de emergencia contactar a</label>
                                        <input type="text" name="contact_name" id="contact_name"
                                            placeholder="Nombre completo de contacto de emergencia"
                                            value="{{ $patient->firstTimePatientForm->contact_name}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="contact_email"
                                            class="block text-sm font-medium text-gray-700">Correo
                                            electrónico (de contacto)</label>
                                        <input type="text" name="contact_email" id="contact_email"
                                            placeholder="Correo electrónico de contacto de emergencia"
                                            value="{{ $patient->firstTimePatientForm->contact_email}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="contact_phone_number"
                                            class="block text-sm font-medium text-gray-700">Teléfono (de
                                            contacto)</label>
                                        <input type="text" name="contact_phone_number" id="contact_phone_number"
                                            placeholder="Teléfono de contacto de emergencia"
                                            value="{{ $patient->firstTimePatientForm->contact_phone_number}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <!-- INSURANCE -->
                                    <div class="col-span-6">
                                        <fieldset>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="insured" name="insured" type="checkbox"
                                                            {{ $patient->firstTimePatientForm->insured ? 'checked' : ''}}
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="insured" class="font-medium text-gray-700">¿Cuenta
                                                            con aseguranza?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-span-6">
                                        <fieldset>
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">
                                                    Si cuenta con aseguranza
                                                </legend>
                                                <p class="text-sm text-gray-500">
                                                    Llenar los siguientes datos.
                                                </p>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="insured_name" class="block text-sm font-medium text-gray-700">Nombre
                                            del
                                            asegurado</label>
                                        <input type="text" name="insured_name" id="insured_name"
                                            placeholder="Nombre completo del asegurado"
                                            value="{{ $patient->firstTimePatientForm->insured_name}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>

                                    <div class="col-span-6">
                                        <label for="insured_relationship"
                                            class="block text-sm font-medium text-gray-700">Relación con
                                            usted</label>
                                        <select id="insured_relationship" name="insured_relationship"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="4"
                                                {{ $patient->firstTimePatientForm->insured_relationship == 4 ? 'selected' : ''}}>
                                                NA</option>
                                            <option value="1"
                                                {{ $patient->firstTimePatientForm->insured_relationship == 1 ? 'selected' : ''}}>
                                                Hij@</option>
                                            <option value="2"
                                                {{ $patient->firstTimePatientForm->insured_relationship == 2 ? 'selected' : ''}}>
                                                Espos@</option>
                                            <option value="3"
                                                {{ $patient->firstTimePatientForm->insured_relationship == 3 ? 'selected' : ''}}>
                                                Yo mism@</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="insured_ssn" class="block text-sm font-medium text-gray-700">No.
                                            Seguro
                                            Social</label>
                                        <input type="text" name="insured_ssn" id="insured_ssn"
                                            placeholder="No. Seguro Social"
                                            value="{{ $patient->firstTimePatientForm->insured_ssn}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="insurer_name" class="block text-sm font-medium text-gray-700">Nombre
                                            de
                                            la
                                            aseguranza</label>
                                        <input type="text" name="insurer_name" id="insurer_name"
                                            placeholder="Nombre completo de la aseguranza"
                                            value="{{ $patient->firstTimePatientForm->insurer_name}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="insurer_phone_number"
                                            class="block text-sm font-medium text-gray-700">Teléfono (de
                                            aseguranza)</label>
                                        <input type="text" name="insurer_phone_number" id="insurer_phone_number"
                                            placeholder="Teléfono de aseguranza"
                                            value="{{ $patient->firstTimePatientForm->insurer_phone_number}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="work_name" class="block text-sm font-medium text-gray-700">Nombre de
                                            la
                                            compañia donde
                                            trabaja</label>
                                        <input type="text" name="work_name" id="work_name"
                                            placeholder="Nombre completo de la compañia donde trabaja"
                                            value="{{ $patient->firstTimePatientForm->work_name}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6">
                                        <label for="work_phone_number"
                                            class="block text-sm font-medium text-gray-700">Teléfono (de
                                            compañia)</label>
                                        <input type="text" name="work_phone_number" id="work_phone_number"
                                            placeholder="Teléfono de compañia donde trabaja"
                                            value="{{ $patient->firstTimePatientForm->work_phone_number}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    </div>
                                    <div class="col-span-6 ml-3 inline-flex rounded-md shadow">
                                        <button type="submit"
                                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
