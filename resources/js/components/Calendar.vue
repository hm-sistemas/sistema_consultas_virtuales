<template>
  <div>
    <FullCalendar
      ref="fullCalendar"
      :options="calendarOptions"
      @eventDrop="handleEventDrop"
      @eventClick="handleEventClick"
      @eventResize="eventResize"
      :editable="true"
      navLinks="true"
      timeZone="UTC"
    />

    <add-appointment-modal
      :show="new_event_modal_open"
      :event="new_event_details"
      @close="resetNewEventData"
      @event-created="newEventCreated"
    />

    <!-- <show-appointment-modal
            :show="show_event_details_modal"
            :event="current_event"
            @close="show_event_details_modal = false"
            @event-deleted="rerenderCalendar"
            @event-updated="rerenderCalendar"
        /> -->
  </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import listPlugin from "@fullcalendar/list";
import esLocale from "@fullcalendar/core/locales/es";
import AddAppointmentModal from "./AddAppointmentModal";
/* import ShowAppointmentModal from "./ShowAppointmentModal"; */
import Noty from "noty";

/* import "@fullcalendar/core/main.css";
import "@fullcalendar/daygrid/main.css";
import "@fullcalendar/timegrid/main.css"; */

export default {
  name: "Calendar",
  components: {
    FullCalendar,
    AddAppointmentModal,
    /* ShowAppointmentModal */
  },
  data() {
    var self = this;
    return {
      new_event_modal_open: false,
      event_detail_modal_open: false,
      new_event_details: {
        date: null,
        dateStr: null,
      },
      current_event: null,
      show_event_details_modal: false,

      /* Full Calendar Options Start */
      calendarOptions: {
        timeZone: "UTC",
        locale: esLocale,
        allDaySlot: false,
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "timeGridWeek,timeGridDay,listWeek",
        },
        plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin, listPlugin],
        initialView: "timeGridWeek",
        events: {
          url: "/appointments/filter",
          weekends: true,
        },
        editable: true,
        navLinks: true,
        dateClick: self.handleDateClick,
        eventDrop: self.handleEventDrop,
        eventClick: self.handleEventClick,
        eventResize: self.eventResize,
      },
      /* Full Calendar Options End */
    };
  },

  methods: {
    handleDateClick(e) {
      this.new_event_modal_open = true;
      this.new_event_start = e.dateStr;
      console.log(e);
      this.new_event_details.dateStr = e.dateStr;
      this.new_event_details.date = e.date;
      /* dayjs(e.dateStr, "YYYY-MM-DD", true)
          .locale("es")
          .format("dddd, LL"); */
    },

    handleEventDrop(e) {
      let updatedEventData = {
        start: e.event.start,
        end: e.event.end,
      };
      this.$api.appointments
        .update(e.event.id, updatedEventData)
        .then(({ data }) => {
          new Noty({
            text: `Event has been updated.`,
            timeout: 700,
            type: "success",
          }).show();
        })
        .catch((error) => {
          e.revert();
          new Noty({
            text: `Oops, something bad happened while updating your event.`,
            timeout: 1000,
            type: "error",
          }).show();
        });
    },

    handleEventClick(e) {
      this.current_event = e.event;
      this.show_event_details_modal = true;
    },

    resetNewEventData() {
      this.new_event_details.start = null;
      this.new_event_details.title = null;
      this.new_event_modal_open = false;
    },

    newEventCreated() {
      this.rerenderCalendar();
      this.new_event_modal_open = false;
      this.resetNewEventData();
      new Noty({
        text: `Appointment has been created.`,
        timeout: 1000,
        type: "success",
      }).show();
    },

    eventResize(e) {
      let updatedEventData = {
        start: e.event.start,
        end: e.event.end,
      };
      this.$api.appointments
        .update(e.event.id, updatedEventData)
        .then(({ data }) => {
          new Noty({
            text: `Appointment duration updated.`,
            timeout: 1000,
            type: "success",
          }).show();
        })
        .catch((error) => {
          e.revert();
          new Noty({
            text: `Oooops, couldn't update appointment duration. Sorry.`,
            timeout: 1000,
            type: "error",
          }).show();
        });
    },

    rerenderCalendar() {
      this.$refs.fullCalendar.getApi().refetchEvents();
    },
  },
};
</script>

<style>
.fc-content {
  color: white;
}
</style>
