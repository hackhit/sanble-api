<template>
  <v-navigation-drawer v-model="toggleDrawer" fixed app color="primary" dark>
    <v-list>
      <v-list-item :to="'/app'" router exact>
        <v-list-item-action>
          <v-icon>home</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.home')" />
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
// Vuex
import { mapState } from "vuex";

export default {
  name: "Sidenav",
  data() {
    return {
      toggleDrawer: false
    };
  },
  watch: {
    toggleDrawer(val, oldVal) {
      this.$store.dispatch("showDrawerAction", val);
    },
    showDrawer(val, oldVal) {
      this.toggleDrawer = val;
    }
  },
  computed: {
    ...mapState({
      showDrawer: state => state.showDrawer
    })
  }
};
</script>