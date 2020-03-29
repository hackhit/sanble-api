import Vue from "vue";
import VueI18n from "vue-i18n";

Vue.use(VueI18n);

// Lang
import es from "../../../lang/es/app_es.json";
import en from "../../../lang/en/app_en.json";

const messages = {
    en,
    es
};

let lang = "es";
if (localStorage.getItem("lang")) lang = localStorage.getItem("lang");

const i18n = new VueI18n({ locale: lang, messages });

export default i18n;
