<template>
  <v-app-bar :clipped-left="false" fixed app dense color="primary" dark>
    <v-app-bar-nav-icon @click.stop="handleShowDrawer" />

    <v-toolbar-title v-text="'Sanble'" />
    <!-- <v-toolbar-title>
      <img src="/storage/media/logo_horizontal_light.png" alt="Sanble" />
    </v-toolbar-title>-->
    <v-spacer />
    <ToggleDarkMode :toggle="darkMode" />

    <v-menu offset-y transition="slide-y-transition">
      <template v-slot:activator="{ on }">
        <v-btn icon v-on="on">
          <v-icon>account_circle</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-item @click="showCloseSession = true">
          <v-icon>exit_to_app</v-icon>
          <v-list-item-title>{{ $t('text.logOut') }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>

    <v-dialog v-model="showCloseSession" max-width="290">
      <v-card>
        <v-card-title>{{ $t('text.logOutModal') }}</v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="red darken-1" text @click="showCloseSession = false">{{ $t('btn.close') }}</v-btn>

          <v-btn color="primary" @click="handleExit">{{ $t('text.logOut') }}</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
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
      showCloseSession: false,
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
  computed: {
    ...mapState({
      showDrawer: state => state.showDrawer
    })
  },
  methods: {
    handleShowDrawer() {
      this.$store.dispatch("showDrawerAction", !this.showDrawer);
    },
    handleExit() {
      this.$cookies.remove("access-token");
      this.$store.dispatch("setUserAction", null);
      this.$store.dispatch("setRolesAction", null);
      this.$store.dispatch("setTokenAction", null);
      this.$router.replace("/app/auth/login");
    }
  },
  mounted() {
    this.darkMode.toggle = this.$store.state.darkMode;
  }
};
</script>