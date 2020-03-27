<template>
  <v-app-bar :clipped-left="false" fixed app dense color="primary" dark>
    <v-app-bar-nav-icon @click.stop="handleShowDrawer" />
    <!-- <v-btn icon>
      <v-icon>mdi-application</v-icon>
    </v-btn>-->
    <v-toolbar-title v-text="title" />
    <v-spacer />
    <ToggleDarkMode :toggle="darkMode" />
  </v-app-bar>
</template>

<script>
// Components
import ToggleDarkMode from "./ToggleDarkMode";

// Vuex
import { mapState } from "vuex";

export default {
  name: "Navbar",
  components: {
    ToggleDarkMode
  },
  data() {
    return {
      title: "Sanble",
      darkMode: {
        toggle: false
      }
    };
  },
  watch: {
    "darkMode.toggle": function(val) {
      this.$vuetify.theme.dark = val;
    }
  },
  computed: {
    ...mapState({
      showDrawer: state => state.showDrawer
    })
  },
  methods: {
    handleShowDrawer() {
      this.$store.dispatch("showDrawerAction", !this.showDrawer);
    }
  }
};
</script>