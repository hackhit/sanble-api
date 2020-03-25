<template>
  <v-app dark>
    <Navbar />
    <Sidenav />
    <slot />
    <v-footer fixed app>
      <span>Sanble &copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
// Components
import Navbar from "../components/core/Navbar";
import Sidenav from "../components/core/Sidenav";

export default {
  name: "Default-Layout",
  components: {
    Navbar,
    Sidenav
  },
  data() {
    return {
      right: true,
      rightDrawer: false
    };
  }
};
</script>
