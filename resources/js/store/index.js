import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        showDrawer: false
    },
    mutations: {
        showDrawerMutation(state, showDrawer) {
            state.showDrawer = showDrawer;
        }
    },
    actions: {
        showDrawerAction({ commit }, payload) {
            commit("showDrawerMutation", payload);
        }
    },
    modules: {}
});
