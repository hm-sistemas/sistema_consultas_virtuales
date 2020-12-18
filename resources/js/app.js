require("./bootstrap");

require("alpinejs");
window.Vue = require("vue");
Vue.component("calendar", require("./components/Calendar.vue").default);
Vue.component(
    "add-patient-slide",
    require("./components/Patient/AddPatientSlide.vue").default
);
const app = new Vue({
    el: "#app"
});
