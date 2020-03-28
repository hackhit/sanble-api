window.Vue = require("vue");
import Vue from "vue";

// Cookies
import VueCookies from "vue-cookies";
Vue.use(VueCookies);

// Router
import router from "./router";

// Store
import store from "./store";

// initializePreferences
import InitializePreferencesStore from "./util/InitializePreferencesStore";
InitializePreferencesStore(store);

// Vuetify
import vuetify from "./plugins/vuetify";

// Vue-I18n
import i18n from "./plugins/vue-i18n";

// App
import App from "./App";

const app = new Vue({
    el: "#app",
    components: { App },
    router,
    i18n,
    store,
    vuetify
});
