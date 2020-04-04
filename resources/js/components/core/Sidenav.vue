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

      <v-list-item :to="'/invitations'" router exact>
        <v-list-item-action>
          <v-icon>event</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.invitations')" />
        </v-list-item-content>
      </v-list-item>

      <v-list-item :to="'/favorites'" router exact>
        <v-list-item-action>
          <v-icon>favorite</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.favorites')" />
        </v-list-item-content>
      </v-list-item>

      <v-list-item :to="'/mysanble'" router exact v-if="roles.stand || roles.fair">
        <v-list-item-action>
          <v-icon>emoji_emotions</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.mysanble')" />
        </v-list-item-content>
      </v-list-item>

      <v-list-item :to="'/fairs'" router exact>
        <v-list-item-action>
          <v-icon>flag</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.fairs')" />
        </v-list-item-content>
      </v-list-item>

      <v-list-item :to="'/stands'" router exact>
        <v-list-item-action>
          <v-icon>shopping_cart</v-icon>
          <!-- <v-icon>store</v-icon> -->
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="$t('sidenav.stands')" />
        </v-list-item-content>
      </v-list-item>
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
      showDrawer: state => state.showDrawer,
      roles: state => state.roles
    })
  }
};
</script>