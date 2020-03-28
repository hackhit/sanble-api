<template>
  <v-app-bar :clipped-left="false" fixed app dense color="primary" dark>
    <v-app-bar-nav-icon @click.stop="handleShowDrawer" />

    <v-toolbar-title v-text="title" />
    <v-spacer />
    <v-btn icon @click="showCloseSession = true">
      <v-icon>exit_to_app</v-icon>
    </v-btn>

    <v-dialog v-model="showCloseSession" max-width="290">
      <v-card>
        <v-card-title>¿Desea cerrar sesión?</v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="red darken-1" text @click="showCloseSession = false">Cancelar</v-btn>

          <v-btn color="primary" @click="handleExit">Salir</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app-bar>
</template>

<script>
// Vuex
import { mapState } from "vuex";

export default {
  name: "Navbar",
  data() {
    return {
      title: "Sanble",
      showCloseSession: false
    };
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
  }
};
</script>