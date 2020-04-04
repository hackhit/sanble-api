// Cookies
import cookies from "vue-cookies";

//  Store
import store from "../../store";

// Services API
import API from "../../utils/services/API";

const cleanDataUser = next => {
    cookies.remove("access-token");
    store.dispatch("setUserAction", null);
    store.dispatch("setRolesAction", null);
    store.dispatch("setTokenAction", null);
    next();
};

const routesSessionGuard = async (to, from, next) => {
    document.title = to.meta.title;

    if (!store.state.accessToken) {
        const accessToken = cookies.get("access-token");

        if (accessToken) {
            const services = new API();

            await services
                .checkToken(accessToken)
                .then(({ data }) => {
                    cookies.set("access-token", data.meta.access_token);
                    store.dispatch("setUserAction", data.data);
                    store.dispatch("setRolesAction", data.data.roles);
                    store.dispatch("setTokenAction", data.meta.access_token);
                    next({
                        path: "/app",
                        replace: true
                    });
                })
                .catch(() => {
                    cleanDataUser(next);
                });
        } else {
            cleanDataUser(next);
        }
    } else {
        next({
            path: "/app",
            replace: true
        });
    }
};

export default routesSessionGuard;
