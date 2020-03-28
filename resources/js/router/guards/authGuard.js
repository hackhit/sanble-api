// Cookies
import cookies from "vue-cookies";

//  Store
import store from "../../store";

// Services API
import API from "../../util/services/API";

const redirectToLogin = next => {
    cookies.remove("access-token");
    store.dispatch("setUserAction", null);
    store.dispatch("setRolesAction", null);
    store.dispatch("setTokenAction", null);
    next({
        path: "/app/auth/login",
        replace: true
    });
};

const authGuard = (to, from, next) => {
    document.title = to.meta.title;

    if (!store.state.accessToken) {
        const accessToken = cookies.get("access-token");

        if (accessToken) {
            next();
        } else {
            redirectToLogin(next);
        }
    } else {
        next();
    }
};

export default authGuard;
