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
                              for="email_address"
                              class="block text-sm font-medium text-gray-700"
                              >Correo electrónico (opcional)</label
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

                          <div class="col-span-6 sm:col-span-3">
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
                          <div class="col-span-6">
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
    },

    savePatient() {
      this.patient.full_name = this.patient.name + " " + this.patient.last_name;
      console.log(this.patient);
      axios.post("/patients", this.patient).then((response) => {
        console.log(response.data);
        new Noty({
          text: `Paciente ha sido registrado.`,
          timeout: 700,
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

  mounted() {
    new Noty({
      text: `Event has been updated.`,
      timeout: 700,
      type: "success",
    }).show();
  },
};
</script>
