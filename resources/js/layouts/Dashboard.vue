<template>
  <v-app dark>
    <Navbar />
    <Sidenav />
    <slot />
    <Footer :dark="false" />
  </v-app>
</template>

<script>
// Components
import Navbar from "../components/core/Navbar";
import Sidenav from "../components/core/Sidenav";
import Footer from "../components/core/Footer";

export default {
  name: "Default-Layout",
  components: {
    Navbar,
    Sidenav,
    Footer
  },
  data() {
    return {
      right: true,
      rightDrawer: false
    };
  }
};
</script>
