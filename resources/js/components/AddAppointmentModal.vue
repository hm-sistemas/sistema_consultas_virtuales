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
                <h5 class="mt-3 text-left sm:mt-0 sm:ml-4 sm:text-left font-medium text-green-400">{{ date.date }}</h5>
                <div class="mt-5 md:mt-0 md:col-span-2">
                  <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
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
                            v-model="event.start"
                            min="09:00"
                            max="18:00"
                            required
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
                            v-model="event.description"
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
                            v-model="event.comments"
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
export default {
  props: ["show", "date"],
  data: () => ({
    event: {
      description: null,
      user_id: "nobody",
      comments: null,
      start: "12:00",
    },
    users: [],
  }),

  methods: {
    closeModal() {
      this.event.description = null;
      this.event.user_id = "nobody";
      this.event.comments = null;
      this.$emit("close");
    },

    formatDate(date, format = "DD/MM/YY HH:mm") {
      return moment.utc(date).format(format);
    },

    transformEventDates(start, end) {
      // if start is same as end add 1hr
      let startTime = new Date(start);
      let endTime = new Date(end);

      if (startTime.getTime() === endTime.getTime()) {
        let endTime = new Date(end);
        endTime.setHours(endTime.getHours() + 1);
        return {
          start,
          end: endTime.toISOString(),
        };
      }
      return {
        start,
        end,
      };
    },

    saveEvent() {
      let eventData = this.transformEventDates(this.date.start, this.date.end);
      let newEventData = {
        start: this.event.start,
        description: this.event.description,
        user_id: this.event.user_id,
        comments: this.event.comments,
      };

      this.$api.appointments
        .create(newEventData)
        .then(({ data }) => {
          this.closeModal();
          this.$emit("event-created");
        })
        .catch((error) => {
          this.$emit("error");
        });
    },
  },

  computed: {
    validEventData() {
      return !!(this.event.start && this.event.user_id != "nobody");
    },
  },

  mounted() {
    // I absctracted my API calls, this would be the same as:
    // axios.get('/users').then( .... ) ...
    /* this.$api.users
            .index()
            .then(({ data }) => {
                this.users = data;
            })
            .catch(error => {
                this.users = [];
                this.event.user_id = null;
            }); */
  },
};
</script>
