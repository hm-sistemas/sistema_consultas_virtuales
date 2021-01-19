<template>
  <div>
    <div class="lg:mt-0 lg:ml-4">
      <span class="sm:ml-3">
        <button
          @click="show = true"
          type="button"
          class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          <!-- Heroicon name: check -->
          <svg
            class="-ml-1 mr-2 h-5 w-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            stroke="currentColor"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            />
          </svg>

          Nuevo paciete
        </button>
      </span>
    </div>
    <div v-show="show" class="fixed z-10 inset-0 overflow-y-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <transition
          enter-active-class="ease-out duration-300"
          enter-class="opacity-0"
          enter-to-class="opacity-100"
          leave-active-class="ease-in duration-200"
          leave-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <div
            v-show="show"
            class="fixed inset-0 transition-opacity"
            aria-hidden="true"
          >
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
        </transition>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
        <transition
          enter-active-class="ease-out duration-300"
          enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to-class="opacity-100 translate-y-0 sm:scale-100"
          leave-active-class="ease-in duration-200"
          leave-class="opacity-100 translate-y-0 sm:scale-100"
          leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            v-show="show"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog"
            aria-modal="true"
            aria-labelledby="modal-headline"
          >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3
                    class="text-lg leading-6 font-medium text-gray-900"
                    id="modal-headline"
                  >
                    Registrar nuevo paciente
                  </h3>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="overflow-hidden sm:rounded-md">
                      <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6 sm:col-span-3">
                            <label
                              for="first_name"
                              class="block text-sm font-medium text-gray-700"
                              >Nombre</label
                            >
                            <input
                              type="text"
                              name="first_name"
                              id="first_name"
                              v-model="patient.name"
                              autocomplete="given-name"
                              required
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label
                              for="last_name"
                              class="block text-sm font-medium text-gray-700"
                              >Apellido</label
                            >
                            <input
                              type="text"
                              name="last_name"
                              id="last_name"
                              v-model="patient.last_name"
                              autocomplete="family-name"
                              required
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-4">
                            <label
                              for="street_address"
                              class="block text-sm font-medium text-gray-700"
                              >Calle</label
                            >
                            <input
                              type="text"
                              name="street"
                              id="street"
                              v-model="patient.street"
                              autocomplete="street"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6 sm:col-span-2">
                            <label
                              for="street_number"
                              class="block text-sm font-medium text-gray-700"
                              >No. Calle</label
                            >
                            <input
                              type="text"
                              name="street_number"
                              id="street_number"
                              v-model="patient.street_number"
                              autocomplete="street_number"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label
                              for="city"
                              class="block text-sm font-medium text-gray-700"
                              >Ciudad</label
                            >
                            <input
                              type="text"
                              name="city"
                              id="city"
                              v-model="patient.city"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label
                              for="state"
                              class="block text-sm font-medium text-gray-700"
                              >Estado</label
                            >
                            <input
                              type="text"
                              name="state"
                              id="state"
                              v-model="patient.state"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label
                              for="postal_code"
                              class="block text-sm font-medium text-gray-700"
                              >Código Postal</label
                            >
                            <input
                              type="text"
                              name="postal_code"
                              id="postal_code"
                              v-model="patient.zip_code"
                              autocomplete="postal-code"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6">
                            <label
                              for="country"
                              class="block text-sm font-medium text-gray-700"
                              >País</label
                            >
                            <input
                              type="text"
                              name="country"
                              id="country"
                              v-model="patient.country"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label
                              for="birth_city"
                              class="block text-sm font-medium text-gray-700"
                              >Ciudad (nacimiento)</label
                            >
                            <input
                              type="text"
                              name="birth_city"
                              id="birth_city"
                              v-model="patient.birth_city"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label
                              for="birth_state"
                              class="block text-sm font-medium text-gray-700"
                              >Estado (nacimiento)</label
                            >
                            <input
                              type="text"
                              name="birth_state"
                              id="birth_state"
                              v-model="patient.birth_state"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label
                              for="birth_country"
                              class="block text-sm font-medium text-gray-700"
                              >País (nacimiento)</label
                            >
                            <input
                              type="text"
                              name="birth_country"
                              id="birth_country"
                              v-model="patient.birth_country"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6">
                            <label
                              for="status"
                              class="block text-sm font-medium text-gray-700"
                              >Estado civil</label
                            >
                            <select
                              id="status"
                              name="status"
                              v-model="patient.status"
                              autocomplete="status"
                              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                              <option value="1" selected>Casado</option>
                              <option value="2">Soltero</option>
                              <option value="0">Otro</option>
                            </select>
                          </div>

                          <div class="col-span-6">
                            <label
                              for="country"
                              class="block text-sm font-medium text-gray-700"
                              >Ocupación</label
                            >
                            <select
                              id="occupation"
                              name="occupation"
                              v-model="patient.occupation"
                              autocomplete="occupation"
                              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                              <option value="1" selected>Empleado</option>
                              <option value="2">Estudiante</option>
                              <option value="3">
                                Estudiante tiempo parcial
                              </option>
                              <option value="0">Otro</option>
                            </select>
                          </div>



                          <div class="col-span-6">
                            <label
                              for="email_address"
                              class="block text-sm font-medium text-gray-700"
                              >Correo electrónico</label
                            >
                            <input
                              type="text"
                              name="email_address"
                              id="email_address"
                              autocomplete="email"
                              v-model="patient.email"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-3">
                            <label
                              for="gender"
                              class="block text-sm font-medium text-gray-700"
                              >Género</label
                            >
                            <select
                              id="gender"
                              name="gender"
                              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                              <option selected value="0">Masculino</option>
                              <option value="1">Femenino</option>
                            </select>
                          </div>
                          <div class="col-span-3">
                            <label
                              for="start"
                              class="block text-sm font-medium text-gray-700"
                              >Fecha de nacimiento</label
                            >
                            <input
                              type="date"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                              id="birth_date"
                              name="birth_date"
                              v-model="patient.birth_date"
                              required
                            />
                          </div>

                          <div class="col-span-6">
                            <label
                              for="description"
                              class="block text-sm font-medium text-gray-700"
                              >Teléfono</label
                            >
                            <input
                              type="text"
                              name="phone_number"
                              id="phone_number"
                              v-model="patient.phone_number"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <!-- FIRST TIME FORM -->
                          <div class="col-span-3">
                            <label
                              for="date"
                              class="font-medium text-gray-700"
                              >Fecha de llegada</label
                            >
                            <input
                              id="date"
                              name="date"
                              type="date"
                              v-model="patient.date"
                              class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48"
                            />
                          </div>
                          <div class="col-span-3">
                            <label
                              for="time"
                              class="font-medium text-gray-700"
                              >Hora de llegada</label
                            >
                            <input
                              id="time"
                              name="time"
                              type="time"
                              v-model="patient.time"
                              class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48"
                            />
                          </div>
                          <div class="col-span-3">
                            <fieldset>
                              <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input
                                      id="firstVisit"
                                      name="firstVisit"
                                      type="checkbox"
                                      v-model="patient.first_visit"
                                      class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                    />
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label
                                      for="firstVisit"
                                      class="font-medium text-gray-700"
                                      >¿Había venido antes?</label
                                    >
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-span-3">
                            <label
                              for="childrenCount"
                              class="font-medium text-gray-700"
                              >¿Cuántos hijos tiene?</label
                            >
                            <input
                              id="childrenCount"
                              name="childrenCount"
                              type="number"
                              min="0"
                              v-model="patient.children"
                              class="focus:ring-indigo-500 text-indigo-600 border-gray-300 w-48"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="referral"
                              class="block text-sm font-medium text-gray-700"
                              >¿Quién lo recomendó?</label
                            >
                            <select
                              id="referral"
                              name="referral"
                              v-model="patient.referral"
                              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                              <option value="1">Farmacia</option>
                              <option value="2">Familiar</option>
                              <option value="3">Amigo</option>
                              <option value="4">Sólo</option>
                              <option value="5">Rótulo</option>
                              <option value="0">Otro</option>
                            </select>
                          </div>
                          <div class="col-span-6">
                            <label
                              for="referrer_name"
                              class="block text-sm font-medium text-gray-700"
                              >Nombre de quien lo recomendó</label
                            >
                            <input
                              type="text"
                              name="referrer_name"
                              id="referrer_name"
                              v-model="patient.referrer_name"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <!-- Contact -->
                          <div class="col-span-6">
                            <fieldset>
                              <div>
                                <legend
                                  class="text-base font-medium text-gray-900"
                                >
                                  Contacto de emergencia
                                </legend>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-span-6">
                            <label
                              for="contact_name"
                              class="block text-sm font-medium text-gray-700"
                              >En caso de emergencia contactar a</label
                            >
                            <input
                              type="text"
                              name="contact_name"
                              id="contact_name"
                              placeholder="Nombre completo de contacto de emergencia"
                              v-model="patient.contact_name"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="contact_email"
                              class="block text-sm font-medium text-gray-700"
                              >Correo electrónico (de contacto)</label
                            >
                            <input
                              type="text"
                              name="contact_email"
                              id="contact_email"
                              placeholder="Correo electrónico de contacto de emergencia"
                              v-model="patient.contact_email"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="contact_phone_number"
                              class="block text-sm font-medium text-gray-700"
                              >Teléfono (de contacto)</label
                            >
                            <input
                              type="text"
                              name="contact_phone_number"
                              id="contact_phone_number"
                              placeholder="Teléfono de contacto de emergencia"
                              v-model="patient.contact_phone_number"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <!-- INSURANCE -->
                          <div class="col-span-6">
                            <fieldset>
                              <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                  <div class="flex items-center h-5">
                                    <input
                                      id="insured"
                                      name="insured"
                                      type="checkbox"
                                      v-model="patient.insured"
                                      class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                    />
                                  </div>
                                  <div class="ml-3 text-sm">
                                    <label
                                      for="insured"
                                      class="font-medium text-gray-700"
                                      >¿Cuenta con aseguranza?</label
                                    >
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-span-6">
                            <fieldset>
                              <div>
                                <legend
                                  class="text-base font-medium text-gray-900"
                                >
                                  Si cuenta con aseguranza
                                </legend>
                                <p class="text-sm text-gray-500">
                                  Llenar los siguientes datos.
                                </p>
                              </div>
                            </fieldset>
                          </div>
                          <div class="col-span-6">
                            <label
                              for="insured_name"
                              class="block text-sm font-medium text-gray-700"
                              >Nombre del asegurado</label
                            >
                            <input
                              type="text"
                              name="insured_name"
                              id="insured_name"
                              placeholder="Nombre completo del asegurado"
                              v-model="patient.insured_name"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>

                          <div class="col-span-6">
                            <label
                              for="insured_relationship"
                              class="block text-sm font-medium text-gray-700"
                              >Relación con usted</label
                            >
                            <select
                              id="insured_relationship"
                              name="insured_relationship"
                              v-model="patient.insured_relationship"
                              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                              <option value="1">Hij@</option>
                              <option value="2">Espos@</option>
                              <option value="3">Yo mism@</option>
                            </select>
                          </div>
                          <div class="col-span-6">
                            <label
                              for="insured_ssn"
                              class="block text-sm font-medium text-gray-700"
                              >No. Seguro Social</label
                            >
                            <input
                              type="text"
                              name="insured_ssn"
                              id="insured_ssn"
                              placeholder="No. Seguro Social"
                              v-model="patient.insured_ssn"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="insurer_name"
                              class="block text-sm font-medium text-gray-700"
                              >Nombre de la aseguranza</label
                            >
                            <input
                              type="text"
                              name="insurer_name"
                              id="insurer_name"
                              placeholder="Nombre completo de la aseguranza"
                              v-model="patient.insurer_name"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="insurer_phone_number"
                              class="block text-sm font-medium text-gray-700"
                              >Teléfono (de aseguranza)</label
                            >
                            <input
                              type="text"
                              name="insurer_phone_number"
                              id="insurer_phone_number"
                              placeholder="Teléfono de aseguranza"
                              v-model="patient.insurer_phone_number"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="work_name"
                              class="block text-sm font-medium text-gray-700"
                              >Nombre de la compañia donde trabaja</label
                            >
                            <input
                              type="text"
                              name="work_name"
                              id="work_name"
                              placeholder="Nombre completo de la compañia donde trabaja"
                              v-model="patient.work_name"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                          <div class="col-span-6">
                            <label
                              for="work_phone_number"
                              class="block text-sm font-medium text-gray-700"
                              >Teléfono (de compañia)</label
                            >
                            <input
                              type="text"
                              name="work_phone_number"
                              id="work_phone_number"
                              placeholder="Teléfono de compañia donde trabaja"
                              v-model="patient.work_phone_number"
                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
            >
              <button
                @click="savePatient()"
                type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Guardar
              </button>
              <button
                @click="closeModal()"
                type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Cancelar
              </button>
            </div>
          </div>
        </transition>
      </div>
    </div>
  </div>
  <!-- This example requires Tailwind CSS v2.0+ -->
</template>
<script>
import Noty from "noty";
export default {
  data: () => ({
    patient: {
      full_name: null,
      name: null,
      last_name: null,
      birth_date: null,
      email: "",
      phone_number: "",
      gender: 0,
      street: "",
      street_number: "",
      city: "",
      state: "",
      zip_code: "",
      country: "",
      status: 1,
      occupation: 1,
      insured: 0,
      deductible: -1,
      birth_city: "",
      birth_state: "",
      birth_country: "",
      first_visit: 0,
      children: 0,
      referral: 0,
      referrer_name: "",
      contact_name: "",
      contact_email: "",
      contact_phone_number: "",
      insured_name: "",
      insured_ssn: "",
      insured_relationship: 2,
      insurer_name: "",
      insurer_phone_number: "",
      work_name: "",
      work_phone_number: "",
      date: "",
      time: "12:00"
    },
    show: false,
  }),

  methods: {
    closeModal() {
      this.show = false;
      this.patient.full_name = null;
      this.patient.name = null;
      this.patient.last_name = null;
      this.patient.birth_date = null;
      this.patient.email = "";
      this.patient.phone_number = "";
      this.patient.gender = 0;
      this.patient.status = 1;
      this.patient.occupation = 1;
      this.patient.insured = 0;
      this.patient.deductible = -1;
      this.patient.street = "";
      this.patient.street_number = "";
      this.patient.city = "";
      this.patient.state = "";
      this.patient.country = "";
      this.patient.zip_code = "";
      this.patient.birth_city = "";
      this.patient.birth_state = "";
      this.patient.birth_country = "";

      this.patient.referrer_name = "";
      this.patient.contact_name = "";
      this.patient.contact_email = "";
      this.patient.contact_phone_number = "";
      this.patient.insured_name = "";
      this.patient.insured_ssn = "";
      this.patient.insurer_name = "";
      this.patient.insurer_phone_number = "";
      this.patient.work_name = "";
      this.patient.work_phone_number = "";
      this.patient.date = "";
      this.patient.time = "12:00";

      this.patient.children = 0;
      this.patient.first_consult = 1;
      this.patient.first_visit = 1;
      this.patient.referral = 0;
      this.patient.insured_relationship = 2;
    },

    savePatient() {
      this.patient.full_name = this.patient.name + " " + this.patient.last_name;
      console.log(this.patient);
      axios.post("/patients", this.patient).then((response) => {
        console.log(response.data);
        new Noty({
          text: `Paciente ha sido registrado.`,
          timeout: 1000,
          type: "success",
        }).show();
        this.closeModal();
      });

      /* this.$api.appointments
        .create(newEventData)
        .then(({ data }) => {
          this.closeModal();
          this.$emit("event-created");
        })
        .catch((error) => {
          this.$emit("error");
        }); */
    },
  },

  /* computed: {
    validEventData() {
      return !!(this.event.start && this.patient.user_id != "nobody");
    },
  }, */

  mounted() {},
};
</script>
