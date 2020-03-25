<template>
  <v-navigation-drawer v-model="toggleDrawer" fixed app>
    <v-list>
      <v-list-item v-for="(item, i) in items" :key="i" :to="item.to" router exact>
        <v-list-item-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="item.title" />
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
// Vuex
import { mapState } from 'vuex'

export default {
  name: 'Sidenav',
  data() {
    return {
      items: [
        {
          icon: 'mdi-apps',
          title: 'Welcome',
          to: '/'
        },
        {
          icon: 'mdi-chart-bubble',
          title: 'Inspire',
          to: '/inspire'
        }
      ],
      toggleDrawer: false
    }
  },
  watch: {
    toggleDrawer(val, oldVal) {
      this.$store.dispatch('showDrawerAction', val)
    },
    showDrawer(val, oldVal) {
      this.toggleDrawer = val
    }
  },
  computed: {
    ...mapState({
      showDrawer: state => state.showDrawer
    })
  }
}
</script>