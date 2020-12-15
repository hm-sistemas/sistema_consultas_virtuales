require("./bootstrap");

require("alpinejs");
window.Vue = require("vue");
Vue.component("calendar", require("./components/Calendar.vue").default);
const app = new Vue({
    el: "#app"
});
