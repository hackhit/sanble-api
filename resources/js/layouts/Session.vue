<template>
  <v-app>
    <div class="layout--container">
      <slot />
    </div>
    <Footer :dark="true" :toggleDarkMode="true" />
  </v-app>
</template>

<script>
// Component
import Footer from "../components/core/Footer";

export default {
  name: "Session-Layout",
  components: {
    Footer
  }
};
</script>

<style scoped lang="scss">
.layout--container {
  background: var(--sanble-orange);
  background: -webkit-linear-gradient(
    to right,
    var(--sanble-orange-dark),
    var(--sanble-orange)
  );
  background: linear-gradient(
    to right,
    var(--sanble-orange-dark),
    var(--sanble-orange)
  );
  height: 100vh;

  display: flex;
  justify-content: center;
  align-items: center;
}
</style>