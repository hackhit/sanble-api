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
import InitializePreferencesStore from "./utils/InitializePreferencesStore";
InitializePreferencesStore(store);

// Vuetify
import vuetify from "./utils/plugins/vuetify";

// Vue-I18n
import i18n from "./utils/plugins/vue-i18n";

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
