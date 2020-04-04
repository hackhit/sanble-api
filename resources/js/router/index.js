import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// Guard
import authGuard from "./guards/authGuard";
import routesSessionGuard from "./guards/routesSessionGuard";

// Layout Router
import Router from "../layouts/Router.vue";

/* ----- Component -----*/
// Auth
import Login from "../views/auth/Login.vue";
import Register from "../views/auth/Register.vue";
import Congratulations from "../views/auth/Congratulations.vue";
// Dashboard
import Home from "../views/Home.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        // App
        {
            path: "/app",
            component: Router,
            children: [
                // Index
                {
                    path: "",
                    name: "app-index",
                    meta: {
                        title: "Dashboard | Sanble"
                    },
                    beforeEnter: authGuard,
                    component: Home
                },
                // Auth
                {
                    path: "login",
                    redirect: () => {
                        return "/app/auth/login";
                    }
                },
                {
                    path: "auth",
                    component: Router,
                    redirect: () => {
                        return "/app/auth/login";
                    },
                    children: [
                        {
                            path: "login",
                            name: "app-auth-login",
                            beforeEnter: routesSessionGuard,
                            meta: {
                                title: "Iniciar Sesión | Sanble"
                            },
                            component: Login
                        },
                        {
                            path: "register",
                            component: Router,
                            children: [
                                {
                                    path: "",
                                    name: "app-auth-register",
                                    beforeEnter: routesSessionGuard,
                                    meta: {
                                        title: "Registrarse | Sanble"
                                    },
                                    component: Register
                                },
                                {
                                    path: "congratulations",
                                    name: "app-auth-congratulations",
                                    beforeEnter: routesSessionGuard,
                                    meta: {
                                        title: "Felicitaciones | Sanble"
                                    },
                                    component: Congratulations
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        {
            path: "/login",
            redirect: () => {
                return "/app/auth/login";
            }
        },
        {
            path: "/auth",
            redirect: () => {
                return "/app/auth/login";
            }
        }
    ]
});

export default router;
