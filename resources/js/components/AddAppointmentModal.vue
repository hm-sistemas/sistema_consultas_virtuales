<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
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
                  Registrar nueva cita
                </h3>
                <h5
                  class="mt-3 text-left sm:mt-0 sm:ml-4 sm:text-left font-medium text-green-400"
                >
                  {{ dateStr }}
                </h5>
                <div class="mt-5 md:mt-0 md:col-span-2">
                  <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                          <label
                            for="user_id"
                            class="block text-sm font-medium text-gray-700"
                            >Paciente</label
                          >
                          <v-select
                            :filterable="false"
                            :options="['Canada', 'United States']"
                          ></v-select>
                        </div>
                        <div class="col-span-6">
                          <label
                            for="user_id"
                            class="block text-sm font-medium text-gray-700"
                            >Doctor</label
                          >
                          <select
                            id="user_id"
                            name="user_id"
                            v-model="appointment.user_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                          >
                            <option disabled selected value="nobody">
                              Seleccionar doctor
                            </option>
                            <option
                              v-for="doctor in doctors"
                              :key="doctor.id"
                              :value="doctor.id"
                            >
                              {{ doctor.full_name }}
                            </option>
                          </select>
                        </div>
                        <!-- <div class="col-span-6">
                          <label
                            for="start"
                            class="block text-sm font-medium text-gray-700"
                            >Hora</label
                          >
                          <input
                            type="time"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            id="start"
                            name="start"
                            v-model="appointment.start"
                            min="09:00"
                            max="18:00"
                            required
                          />
                        </div> -->

                        <div class="col-span-6">
                          <label
                            for="title"
                            class="block text-sm font-medium text-gray-700"
                            >Motivo</label
                          >
                          <input
                            type="text"
                            name="title"
                            id="title"
                            v-model="appointment.title"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                          />
                        </div>

                        <div class="col-span-6">
                          <label
                            for="description"
                            class="block text-sm font-medium text-gray-700"
                            >Detalles</label
                          >
                          <textarea
                            rows="4"
                            cols="50"
                            name="description"
                            id="description"
                            v-model="appointment.description"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                          />
                        </div>

                        <div class="col-span-6">
                          <label
                            for="comments"
                            class="block text-sm font-medium text-gray-700"
                            >Notas</label
                          >
                          <input
                            type="text"
                            name="comments"
                            id="comments"
                            v-model="appointment.comments"
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
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              @click="saveEvent()"
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
</template>

<script>
import dayjs from "dayjs";
import "dayjs/locale/es";
var customParseFormat = require("dayjs/plugin/customParseFormat");
var localizedFormat = require("dayjs/plugin/localizedFormat");
var utc = require("dayjs/plugin/utc");
dayjs.extend(utc);
dayjs.extend(localizedFormat);
dayjs.extend(customParseFormat);
export default {
  props: ["show", "event"],
  data: () => ({
    appointment: {
      description: null,
      user_id: "nobody",
      comments: null,
      /* start: "12:00", */
      title: "",
    },
    doctors: [],
    patients: [],
  }),

  methods: {
    closeModal() {
      this.appointment.description = null;
      this.appointment.user_id = "nobody";
      this.appointment.comments = null;
      this.$emit("close");
    },

    onSearch(search, loading) {
      if (search.length) {
        loading(true);
        this.search(loading, search, this);
      }
    },
    search: _.debounce((loading, search, vm) => {
      axios
        .get("/patients/filter", { params: { name: search } })
        .then((response) => {
          console.log(response.data);
          vm.patients = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    }, 350),

    saveEvent() {
      let newEventData = {
        start: this.appointment.start,
        description: this.appointment.description,
        user_id: this.appointment.user_id,
        comments: this.appointment.comments,
      };

      console.log(newEventData);

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

  computed: {
    validEventData() {
      return !!(this.appointment.start && this.appointment.user_id != "nobody");
    },
    dateStr() {
      return dayjs(this.event.dateStr).locale("es").utc().format("LLLL");
    },
  },

  mounted() {
    axios
      .get("/doctors")
      .then((response) => {
        console.log(response.data);
        this.doctors = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
