import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// Layout Router
import Router from "../layouts/Router.vue";

/* ----- Component -----*/
// Auth
import Login from "../views/auth/Login.vue";
import Register from "../views/auth/Register.vue";
// Dashboard
import Index from "../views/Index.vue";

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
                    component: Index
                },
                // Auth
                {
                    path: "auth",
                    component: Router,
                    children: [
                        {
                            path: "login",
                            name: "app-auth-login",
                            meta: {
                                title: "Iniciar Sesión | Sanble"
                            },
                            component: Login
                        },
                        {
                            path: "register",
                            name: "app-auth-register",
                            meta: {
                                title: "Registrarse | Sanble"
                            },
                            component: Register
                        }
                    ]
                }
            ]
        }
    ]
});

export default router;
