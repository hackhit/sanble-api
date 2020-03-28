import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

// Utils
import convertArrayToString from "../util/convertArrayToString";

export default new Vuex.Store({
    state: {
        showDrawer: false,
        lang: "",
        darkMode: false,
        user: null,
        roles: null,
        accessToken: null
    },
    mutations: {
        showDrawerMutation(state, showDrawer) {
            state.showDrawer = showDrawer;
        },
        setLangMutation(state, lang) {
            state.lang = lang;
            localStorage.setItem("lang", lang);
        },
        setDarkModeMutation(state, darkMode) {
            state.darkMode = darkMode;
            localStorage.setItem("darkMode", darkMode);
        },
        setUserMutation(state, user) {
            state.user = user;
        },
        setRolesMutation(state, roles) {
            state.roles = roles ? convertArrayToString(roles, "name") : null;
        },
        setTokenMutation(state, accessToken) {
            state.accessToken = accessToken;
        }
    },
    actions: {
        showDrawerAction({ commit }, payload) {
            commit("showDrawerMutation", payload);
        },
        setLangAction({ commit }, payload) {
            commit("setLangMutation", payload);
        },
        setDarkModeAction({ commit }, payload) {
            commit("setDarkModeMutation", payload);
        },
        setUserAction({ commit }, payload) {
            commit("setUserMutation", payload);
        },
        setRolesAction({ commit }, payload) {
            commit("setRolesMutation", payload);
        },
        setTokenAction({ commit }, payload) {
            commit("setTokenMutation", payload);
        }
    },
    modules: {}
});
