<template>
  <v-footer fixed app :dark="dark">
    <span>Sanble &copy; {{ new Date().getFullYear() }}</span>
    <div class="footer--select-lang">
      <v-select :items="lang" v-model="langSelect" @input="handleSelectLang"></v-select>
    </div>
    <div v-if="toggleDarkMode">
      <ToggleDarkMode :toggle="darkMode" />
    </div>
  </v-footer>
</template>

<script>
// Components
import ToggleDarkMode from "./ToggleDarkMode";

export default {
  name: "Footer",
  props: ["dark", "toggleDarkMode"],
  components: {
    ToggleDarkMode
  },
  data() {
    return {
      lang: ["🇪🇸", "🇺🇸"],
      langSelect: "🇪🇸",
      darkMode: {
        toggle: false
      }
    };
  },
  watch: {
    "darkMode.toggle": function(val) {
      this.$vuetify.theme.dark = val;
      this.$store.dispatch("setDarkModeAction", val);
    }
  },
  methods: {
    handleSelectLang(lang) {
      if (lang == "🇪🇸") {
        this.$i18n.locale = "es";
        this.$store.dispatch("setLangAction", "es");
      }
      if (lang == "🇺🇸") {
        this.$i18n.locale = "en";
        this.$store.dispatch("setLangAction", "en");
      }
    }
  },
  mounted() {
    this.darkMode.toggle = this.$store.state.darkMode;

    if (this.$store.state.lang == "es") this.langSelect = "🇪🇸";
    if (this.$store.state.lang == "en") this.langSelect = "🇺🇸";
  }
};
</script>

<style lang="scss">
.footer--select-lang {
  height: 33px;
  width: 55px;
  margin-left: auto;

  .v-input {
    margin: 0;
    padding: 0;
    font-size: 20px;
  }

  .v-text-field.v-text-field--solo .v-input__control {
    min-height: auto;
  }

  .v-text-field > .v-input__control > .v-input__slot:after {
    border: none;
  }
  .v-text-field > .v-input__control > .v-input__slot:before {
    border: none;
  }
}
</style>