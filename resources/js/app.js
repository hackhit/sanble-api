window.Vue = require("vue");
import Vue from "vue";

// Router
import router from "./router";

// Store
import store from "./store";

// Vuetify
import vuetify from "./plugins/vuetify";

// App
import App from "./App";

const app = new Vue({
    el: "#app",
    components: { App },
    router,
    store,
    vuetify
});
