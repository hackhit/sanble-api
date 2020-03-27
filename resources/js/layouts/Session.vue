<template>
  <v-app dark>
    <div class="layout--container">
      <slot />
    </div>
  </v-app>
</template>

<script>
export default {
  name: "Session-Layout"
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