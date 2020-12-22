require("./bootstrap");
require("alpinejs");
import vSelect from "vue-select";
window.Vue = require("vue");

Vue.component("v-select", vSelect);
Vue.component("calendar", require("./components/Calendar.vue").default);
Vue.component(
    "add-patient-slide",
    require("./components/Patient/AddPatientSlide.vue").default
);
const app = new Vue({
    el: "#app"
});
